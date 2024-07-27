<?php
namespace App\DataTables;

use App\Models\ClassList;
use App\Models\ResultByCategory;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ResultByCategoryDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))

            ->addColumn('action', function($query){

                $view = '<a href="'.route('user.viewPdf.index',['subject' => $query->by_subject,'faculty_id' => $query->faculty_id, 'semester_id' => $query->semester_id]).'" class="view-item icon-link icon-link-hover"><i class="fas fa-download fa-lg "></i> Review</a>';
                return $view;
            })
            ->editColumn('faculty_id' , function($query){
                if($query->faculty){
                    return $query->faculty->first_name .' '. $query->faculty->last_name;

                }else{
                    return 'no schedule available';
                }
            })
            ->editColumn('semester_id' , function($query){
                if($query->faculty){
                    return $query->evaluation_schedule->semester . ' - ' . $query->evaluation_schedule->academic_year;

                }else{
                    return 'no schedule available';
                }
            })

        ->editColumn('total_score', function ($data) {
            $color = '';
            $color2 = '';
            if($data->total_score < 60){
                $color = 'red';
                $color2 = 'cancel';
            }else if($data->total_score < 80){
                $color = '#ffc107';
                $color2 = 'active';
            }else{
                $color = '#025043';
                $color2 = 'complete';
            }
            return '<span class="'.$color2.'" style="color:' .$color. ';">' . $data->total_score . ' / 100</span>';
        })
        ->rawColumns(['total_score', 'action'])

            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(ResultByCategory $model): QueryBuilder
    {
        $users = Auth::user();


        $subjects = ResultByCategory::where('user_id', $users->id)
            ->distinct()
            ->pluck('by_subject');


        if ($subjects->isEmpty()) {

            return $model->newQuery()->whereRaw('0 = 1');
        }

        return $model->newQuery()
            ->with('faculty','evaluation_schedule')
            ->select('by_subject', 'user_id', 'faculty_id', 'semester_id', \DB::raw('SUM(results_by_category) as total_score'))
            ->where('user_id', $users->id)
            ->whereIn('by_subject', $subjects)
            ->groupBy('by_subject', 'user_id', 'faculty_id', 'semester_id');
    }


    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('resultbycategory-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->responsive()
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [

            Column::make('semester_id')->title('Academic Year'),
            Column::make('faculty_id')->title('Faculty'),
            Column::make('by_subject')->title('Subjects'),
            Column::computed('total_score')
                  ->title('Total Score Given'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)

                  ->addClass('text-center')
                  ->title('View'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'ResultByCategory_' . date('YmdHis');
    }
}

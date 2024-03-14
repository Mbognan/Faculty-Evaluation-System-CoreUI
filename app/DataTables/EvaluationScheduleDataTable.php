<?php

namespace App\DataTables;

use App\Models\EvaluationSchedule;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class EvaluationScheduleDataTable extends DataTable
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

            $delete = '<a href="'.route('admin.category.destroy',$query->id).'" class="delete-item btn btn-sm btn-danger ml-2 text-white"><i class="fas fa-trash"></i></a>';
            return $delete;
        })
        ->addColumn('evaluation_status', function($query){
            if($query->evaluation_status == 1){
                return '<span class="badge rounded-pill bg-danger  m-b-5">Closed</span>';
            }else if ($query->evaluation_status == 2){
                return '<span class="badge rounded-pill bg-warning  m-b-5">Ongoing</span>';
            }else{
                return '<span class="badge rounded-pill bg-success  m-b-5">Finish</span>';
            }
        })
        ->addColumn('created_at',function($query){
            return $query->created_at->format('F d, Y');
        })
            ->rawColumns(['action','evaluation_status'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(EvaluationSchedule $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('evaluationschedule-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
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

            Column::make('id'),
            Column::make('academic_year'),
            Column::make('semester'),
            Column::make('evaluation_status'),
            Column::make('created_at'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'EvaluationSchedule_' . date('YmdHis');
    }
}

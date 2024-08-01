<?php
namespace App\DataTables;

use App\Models\ClassList;
use App\Models\Tokenform;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ClassListDataTable extends DataTable
{
    protected $valid;

    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($query) {

                $isEvaluated = in_array($query->student_id,$this->valid->toArray());

                return $isEvaluated
                    ? '<span class="complete">Complete</span>'
                    : '<span class="cancel">Ongoing</span>';
            })
            ->editColumn('evaluation_schedule_id', function ($query) {
                if ($query->evaluationSchedule) {
                    return $query->evaluationSchedule->semester . ' - ' . $query->evaluationSchedule->academic_year;
                } else {
                    return 'no schedule available';
                }
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(ClassList $model): QueryBuilder
    {
        $classlist =  ClassList::get();



        if ($classlist->isEmpty()) {

            $this->valid = collect([]);
        } else {
            $userIds = User::where('user_type', 'user')
                ->where('status', 1)
                ->whereIn('student_id', $classlist->pluck('student_id'))
                ->pluck('id');

            $tokens = Tokenform::where('faculty_id', auth()->id())
                ->whereIn('user_id', $userIds)
                ->get();

            $this->valid = User::whereIn('id', $tokens->pluck('user_id'))->pluck('student_id');
        }





        return $model->newQuery()
            ->with('evaluationSchedule')
            ->where('user_id', auth()->id());
    }

    /**
     * Optional method if you want to use the HTML builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('classlist-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
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
            Column::make('user_id'),
            Column::make('student_id'),
            Column::make('subject'),
            Column::make('evaluation_schedule_id')->title('Academic Year'),
            Column::make('action')->title('Evaluation Status'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'ClassList_' . date('YmdHis');
    }
}

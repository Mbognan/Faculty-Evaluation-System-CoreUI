<?php

namespace App\DataTables;

use App\Models\ClassList;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ClassListDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'classlist.action')
            ->editColumn('evaluation_schedule_id',function($query){
                if($query->evaluationSchedule){
                    return $query->evaluationSchedule->semester . ' - ' . $query->evaluationSchedule->academic_year;

                }else{
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
        return $model->newQuery()
        ->with('evaluationSchedule')
        ->where('user_id', auth()->id());
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('classlist-table')
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

            // Column::make('first_name'),
            // Column::make('last_name'),
            // Column::make('middle_initials')->width(20),
            Column::make('student_id'),
            Column::make('subject'),
            Column::make('evaluation_schedule_id')->title('Academic Year'),

            // Column::make('year'),
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

<?php

namespace App\DataTables;

use App\Models\Hero;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class HeroDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'hero.action')
            ->addColumn('action', function($query){
                $edit = '<a href="'.route('admin.hero.edit',$query->id).'" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>';
                $delete = '<a href="'.route('admin.hero.destroy',$query->id).'" class="delete-item btn btn-sm btn-danger ml-2 text-white"><i class="fas fa-trash"></i></a>';
                return $edit.$delete;
            })
            ->addColumn('background', function($query){
                return '<img width="60px" src=" '.asset($query->background).' "> ';
            })
            ->addColumn('status', function($query){
                if($query->status === 1){
                    return '<span class=""badge rounded-pill bg-success  m-b-5">Active</span>';
                }else{
                    return '<span class="badge rounded-pill bg-danger  m-b-5">Inactive</span>';
                }
            })

            ->addColumn('created_at',function($query){
                return $query->created_at->format('F d, Y');
            })

            ->rawColumns(['status','background','created_at','action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Hero $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('hero-table')
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
            Column::make('background'),
            Column::make('title'),
            Column::make('status'),
            Column::make('created_at')->width(80),
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
        return 'Hero_' . date('YmdHis');
    }
}

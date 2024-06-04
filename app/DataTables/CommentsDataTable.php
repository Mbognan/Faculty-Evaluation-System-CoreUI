<?php

namespace App\DataTables;

use App\Models\Comment;
use App\Models\Comments;
use App\Models\Sentiment;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CommentsDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'comments.action')
            ->addColumn('comment',function($query){
                return $query->comments->post_comment;
            })
            ->addColumn('sentiment', function($query) {
                $sentiment = $query->sentiment;

                // Apply color based on sentiment
                if ($sentiment == 'positive') {
                    return '<span class="btn btn-primary"><i class="far fa-smile"></i> ' . $sentiment . '</span>';
                } elseif ($sentiment == 'negative') {
                    return '<span class="btn btn-danger"><i class="far fa-frown"></i> ' . $sentiment . '</span>';
                } else {
                    return '<span class="btn btn-warning"><i class="far fa-meh-blank"></i> ' . $sentiment . '</span>';
                }
            })
            ->rawColumns(['sentiment'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Sentiment $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('comments-table')
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

            Column::make('id')->width(30),
            Column::make('comment')->width(600),
            Column::make('sentiment')->width(70),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Comments_' . date('YmdHis');
    }
}

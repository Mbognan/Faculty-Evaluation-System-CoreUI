<?php

namespace App\DataTables;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UserDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))

        ->addColumn('action', function($query) {
            $accept = '<a href="' . route('admin.accepted.store', $query->id) . '" class="check-item btn btn-sm btn-success"><i class="fas fa-check text-white"></i></a>';
            $reject = '<a href="' . route('admin.rejected.store', $query->id) . '" class="rejected-item btn btn-sm btn-danger ml-2"><i class="fas fa-times text-white"></i></a>';
            return $accept . $reject;
        })

            ->addColumn('status', function($query){
                if($query->status === 1){
                    return '<span class="badge rounded-pill bg-warning">Active</span>';
                }else{
                    return '<span class="badge text-bg-warning text-white ">pending</span>';
                }
            })
            ->rawColumns(['status','action'])

            ->setRowId('id')
            ->filterColumn('full_name', function ($query, $keyword) {
                $query->whereRaw("CONCAT(first_name, ' ', last_name) like ?", ["%{$keyword}%"]);
            })
            ->filterColumn('student_id', function ($query, $keyword) {
                $query->where('student_id', 'like', "%{$keyword}%");
            });
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(User $model): QueryBuilder
    {
        $admin = Auth::user();
        $query = $model->newQuery()
            ->select(['id', 'first_name', 'last_name', 'email', 'student_id', \DB::raw("CONCAT(first_name, ' ', last_name) AS full_name")])
            ->where('status', 0)
            ->where('user_type', 'user')
            ->where('department_id', $admin->department_id);

        if ($keyword = $this->request()->get('search')['value']) {
            $query->where(function ($query) use ($keyword) {
                $query->where(\DB::raw('CONCAT(first_name, " ", last_name)'), 'like', '%' . $keyword . '%');
                $query->orWhere('student_id', 'like', '%' . $keyword . '%');
            });
        }

        return $query;
    }


    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('user-table')
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


            Column::make('full_name')
            ->title('Name')
            ->data('full_name')
            ->orderable(false),
            Column::make('email'),
            Column::make('student_id'),
            Column::make('status'),
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
        return 'User_' . date('YmdHis');
    }
}

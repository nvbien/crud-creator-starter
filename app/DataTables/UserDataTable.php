<?php

namespace App\DataTables;

use App\Models\User;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class UserDataTable extends DataTable
{
    protected  $orderCallback = 'order';
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'users.datatables_actions')
            ->editColumn( 'name', function ( User $user ) {
                return '<a href="'.route('users.show', $user['id']).'">'.$user['name'].'</a>';
            } )->rawColumns(['name', 'action']);
    }
    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Post $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
//        return $model->newQuery();
        return $model->leftJoin('roles','users.role_id','roles.id')->select('users.name','users.id','users.email','roles.name as role_name');
    }
    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '150px'])
            ->parameters( [
                'dom'   => 'lfrtip',
                'order' => [ [ 0, 'desc' ] ],
                "lengthChange" => true,
                "scrollX" => true,
                "stateSave" => true,
            ] );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id' => ['title' => '#'],
            'name',
            'email',
            'role_name'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'usersdatatable_' . time();
    }
}
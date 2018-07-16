<?php

namespace App\DataTables;

use App\Models\Employee;
use Form;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;

class EmployeeDataTable extends DataTable
{

    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'attraction_commissions.datatables_actions');
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $employees = Employee::query();

        return $this->applyScopes($employees);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->addAction(['width' => '150px'])
            ->ajax('')
            ->parameters([
                'dom' => 'Bfrtip',
                'scrollX' => false,
                'buttons' => [
                    'print',
                    'reset',
                    'reload',
                    [
                         'extend'  => 'collection',
                         'text'    => '<i class="fa fa-download"></i> Export',
                         'buttons' => [
                             'csv',
                             'excel',
                             'pdf',
                         ],
                    ],
                    'colvis'
                ]
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    private function getColumns()
    {
        return [
            'name' => ['name' => 'name', 'data' => 'name'],
            'code' => ['name' => 'code', 'data' => 'code'],
            'password' => ['name' => 'password', 'data' => 'password'],
            'address' => ['name' => 'address', 'data' => 'address'],
            'phone' => ['name' => 'phone', 'data' => 'phone'],
            'expired_date' => ['name' => 'expired_date', 'data' => 'expired_date'],
            'status' => ['name' => 'status', 'data' => 'status'],
            'user_id' => ['name' => 'user_id', 'data' => 'user_id'],
            'groups' => ['name' => 'groups', 'data' => 'groups'],
            'avatar' => ['name' => 'avatar', 'data' => 'avatar'],
            'email' => ['name' => 'email', 'data' => 'email'],
            'is_super' => ['name' => 'is_super', 'data' => 'is_super']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'employees';
    }
}

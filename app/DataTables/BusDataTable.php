<?php

namespace App\DataTables;

use App\Models\Bus;
use Form;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;

class BusDataTable extends DataTable
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
        $buses = Bus::query();

        return $this->applyScopes($buses);
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
            'license_plate' => ['name' => 'license_plate', 'data' => 'license_plate'],
            'model' => ['name' => 'model', 'data' => 'model'],
            'capacity' => ['name' => 'capacity', 'data' => 'capacity'],
            'bus_type_id' => ['name' => 'bus_type_id', 'data' => 'bus_type_id'],
            'status' => ['name' => 'status', 'data' => 'status'],
            'avatar' => ['name' => 'avatar', 'data' => 'avatar'],
            'company_id' => ['name' => 'company_id', 'data' => 'company_id']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'buses';
    }
}

<?php

namespace App\DataTables;

use App\Models\User;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class HotelUserDataTable extends DataTable
{
    private $_hotel_id;
    public function __construct($id){
        $this->_hotel_id = $id;
    }
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

        return $dataTable->addColumn('action', 'widget.checkbox')
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
        $query = $model->newQuery()->select('users.name','users.id','users.email')->where('is_hotel_admin', 1);
        if($this->_hotel_id && $this->_hotel_id > 0){
            $hotel_id = $this->_hotel_id;
            $query->leftJoin('user_hotels', function($join) use($hotel_id)
            {
                $join->on('users.id', '=', 'user_hotels.user_id');
                $join->on('user_hotels.hotel_id',\DB::raw($hotel_id));
            })->select('users.name','users.id','users.email','user_hotels.hotel_id as ref_id');
        }
        return $query;
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
            ->addAction(['width' => '150px','title' =>'Is Admin'])
            ->minifiedAjax()
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
            'email'
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
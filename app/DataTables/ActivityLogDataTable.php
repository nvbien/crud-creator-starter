<?php

namespace App\DataTables;

use App\Models\ActivityLog;
use Form;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;

class ActivityLogDataTable extends DataTable
{

    private $_search;

    public function __construct( $search = [] ) {
        $this->_search = $search;
    }

    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     *
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable( $query ) {
        $dataTable = new EloquentDataTable( $query );

        return $dataTable->editColumn( 'route_name', function ( ActivityLog $activityLog ) {
            $text = explode('.',$activityLog['route_name']);
            $str = $activityLog['route_name'];
            if(count($text)== 2){
                $str = $text[0].' -> '.$text[1];
            }
            return '<a href="'. $activityLog['url'].'">'.$str.'</a>';
        } )->rawColumns(['route_name']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param ActivityLog $activityLog
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query( ActivityLog $activityLog ) {
        $query = $activityLog->newQuery();
        $query->join('users','activity_logs.user_id' ,'users.id')
        ->select(['activity_logs.*','users.name']);
        return $query;
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html() {
        return $this->builder()
            ->columns( $this->getColumns() )
            ->minifiedAjax()
            ->parameters( [
                'dom'          => 'lfrtip',
                'order'        => [ [ 3, 'desc' ] ],
                "lengthChange" => true,
                "scrollX"      => true,
                "stateSave"    => false,
                'searching'    => false,
            ] )
            ->addColumnBefore( [
                'defaultContent' => '',
                'data'           => 'DT_Row_Index',
                'name'           => 'DT_Row_Index',
                'title'          => '#',
                'render'         => null,
                'orderable'      => false,
                'searchable'     => false,
                'exportable'     => true,
                'printable'      => true,
                'footer'         => '',
            ] );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns() {
        $query = null;
        if ( key_exists( 'type', $this->_search ) ) {
            $type = $this->_search['type'];
            if ( $type === 'driver' ) {
                return [

                ];
            } else if ( $type === 'tour_guide' ) {
                return [

                ];
            }
        }

        // admin
        return [
            'name',
            'created_at'=>['name'=>'created_at','title' =>'Activity Time'],
            'route_name'=>['name'=>'route_name','title' =>'Route'],
        ];
    }

    public function snappyPdf() {
        $snappy = resolve( 'snappy.pdf.wrapper' );
        $pdf    = $snappy->loadView( 'reports.activity_report.pdf', [ 'data' => $this->getDataForPrint() ] );

        return $pdf
            ->setPaper( 'a4' )
            ->setOption( 'margin-left', 24 )
            ->setOption( 'margin-right', 24 )
            ->setOption( 'margin-top', 24 )
            ->setOption( 'margin-bottom', 24 )
            ->setOrientation( 'landscape' )
            ->setOption( 'header-html', view( 'reports.pdf_header' ) )
            ->setOption( 'footer-html', view( 'reports.pdf_footer', [ 'link' => route( 'activity_report.index' ) ] ) )
            ->inline( 'BKK Activity Report - ' . Carbon::now()->timestamp . '.pdf' );
//                ->download( 'BKK Activity Report - ' . Carbon::now()->timestamp . '.pdf' );
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename() {
        return 'Activity Report - ' . Carbon::now()->timestamp;
    }
}

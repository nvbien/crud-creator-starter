<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateCRUDModules extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:crud';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        $modules = [
//            ['model'=>'ActivityLog','table_name' =>'activity_logs'],
            ['model'=>'Bus','table_name' =>'bus'],
            ['model'=>'BusDriver','table_name' =>'bus_drivers'],
            ['model'=>'BusOperator','table_name' =>'bus_operators'],
            ['model'=>'BusType','table_name' =>'bus_types'],
            ['model'=>'Company','table_name' =>'companies'],
            ['model'=>'Driver','table_name' =>'drivers'],
//            ['model'=>'Employee','table_name' =>'employees'],
//            ['model'=>'Hotel','table_name' =>'hotels'],
            ['model'=>'Setting','table_name' =>'settings'],
            ['model'=>'TicketRoute','table_name' =>'ticket_routes'],
            ['model'=>'Ticket','table_name' =>'tickets'],
            ['model'=>'UserCompany','table_name' =>'user_companies'],
//            ['model'=>'UserHotel','table_name' =>'user_hotels'],
        ];
        foreach($modules as $module){
            $this->call('infyom:scaffold', ['model' =>$module['model'] ,'--fromTable'=>true, '--tableName' => $module['table_name'],'--save'=>true]);
        }
    }
}

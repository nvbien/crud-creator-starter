<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->truncate();

        DB::table('roles')->insert([
            'name'=>'admin',
            'code'=>'ADM',
            'permissions' => '{"index":"on","create":"on","update":"on","destroy":"on","all":"on","drivers.index":"on","drivers.create":"on","drivers.update":"on","drivers.destroy":"on","drivers.all":"on","tour_guides.index":"on","tour_guides.create":"on","tour_guides.update":"on","tour_guides.destroy":"on","tour_guides.all":"on","passengers.index":"on","passengers.create":"on","passengers.update":"on","passengers.destroy":"on","passengers.all":"on","attractions.index":"on","attractions.create":"on","attractions.update":"on","attractions.destroy":"on","attractions.all":"on","hotels.index":"on","hotels.create":"on","hotels.update":"on","hotels.destroy":"on","hotels.all":"on","restaurants.index":"on","restaurants.create":"on","restaurants.update":"on","restaurants.destroy":"on","restaurants.all":"on","tours.index":"on","tours.create":"on","tours.update":"on","tours.destroy":"on","tours.all":"on","payments.index":"on","payments.create":"on","payments.update":"on","payments.destroy":"on","payments.all":"on","visas.index":"on","visas.create":"on","visas.update":"on","visas.destroy":"on","visas.all":"on","users.index":"on","users.create":"on","users.update":"on","users.destroy":"on","users.all":"on","roles.index":"on","roles.create":"on","roles.update":"on","roles.destroy":"on","roles.all":"on","permissions.index":"on","permissions.create":"on","permissions.update":"on","permissions.destroy":"on","permissions.all":"on"}'
        ]);
        DB::table('users')->truncate();
        $user = new \App\Models\User();
        $user->setRawAttributes([
            'name'=>"admin",
            'email'=>'admin@stb.com',
            'password'=>bcrypt('123123'),
            'role_id'=>1,
            'is_super_admin'=>1,
            'permissions' => '{"index":"on","create":"on","update":"on","destroy":"on","all":"on","drivers.index":"on","drivers.create":"on","drivers.update":"on","drivers.destroy":"on","drivers.all":"on","tour_guides.index":"on","tour_guides.create":"on","tour_guides.update":"on","tour_guides.destroy":"on","tour_guides.all":"on","passengers.index":"on","passengers.create":"on","passengers.update":"on","passengers.destroy":"on","passengers.all":"on","attractions.index":"on","attractions.create":"on","attractions.update":"on","attractions.destroy":"on","attractions.all":"on","hotels.index":"on","hotels.create":"on","hotels.update":"on","hotels.destroy":"on","hotels.all":"on","restaurants.index":"on","restaurants.create":"on","restaurants.update":"on","restaurants.destroy":"on","restaurants.all":"on","tours.index":"on","tours.create":"on","tours.update":"on","tours.destroy":"on","tours.all":"on","payments.index":"on","payments.create":"on","payments.update":"on","payments.destroy":"on","payments.all":"on","visas.index":"on","visas.create":"on","visas.update":"on","visas.destroy":"on","visas.all":"on","users.index":"on","users.create":"on","users.update":"on","users.destroy":"on","users.all":"on","roles.index":"on","roles.create":"on","roles.update":"on","roles.destroy":"on","roles.all":"on","permissions.index":"on","permissions.create":"on","permissions.update":"on","permissions.destroy":"on","permissions.all":"on"}'
        ]);
        $user->save();
        $arr = [];
        for($i = 1  ; $i < 10 ; $i++){
            $arr[]=['name'=>"hotel_admin_$i",
                'email'=>"hotel_admin_$i@stb.com",
                'password'=>bcrypt('123123'),
                'role_id'=>1,
                'is_hotel_admin'=>1,
                'is_bus_operator'=>1,
                'permissions' => '{"index":"on","create":"on","update":"on","destroy":"on","all":"on","drivers.index":"on","drivers.create":"on","drivers.update":"on","drivers.destroy":"on","drivers.all":"on","tour_guides.index":"on","tour_guides.create":"on","tour_guides.update":"on","tour_guides.destroy":"on","tour_guides.all":"on","passengers.index":"on","passengers.create":"on","passengers.update":"on","passengers.destroy":"on","passengers.all":"on","attractions.index":"on","attractions.create":"on","attractions.update":"on","attractions.destroy":"on","attractions.all":"on","hotels.index":"on","hotels.create":"on","hotels.update":"on","hotels.destroy":"on","hotels.all":"on","restaurants.index":"on","restaurants.create":"on","restaurants.update":"on","restaurants.destroy":"on","restaurants.all":"on","tours.index":"on","tours.create":"on","tours.update":"on","tours.destroy":"on","tours.all":"on","payments.index":"on","payments.create":"on","payments.update":"on","payments.destroy":"on","payments.all":"on","visas.index":"on","visas.create":"on","visas.update":"on","visas.destroy":"on","visas.all":"on","users.index":"on","users.create":"on","users.update":"on","users.destroy":"on","users.all":"on","roles.index":"on","roles.create":"on","roles.update":"on","roles.destroy":"on","roles.all":"on","permissions.index":"on","permissions.create":"on","permissions.update":"on","permissions.destroy":"on","permissions.all":"on"}'
            ];
            $arr[]=['name'=>"bus_operator_$i",
                'email'=>"bus_operator_$i@stb.com",
                'password'=>bcrypt('123123'),
                'role_id'=>1,
                'is_hotel_admin'=>1,
                'is_bus_operator'=>1,
                'permissions' => '{"index":"on","create":"on","update":"on","destroy":"on","all":"on","drivers.index":"on","drivers.create":"on","drivers.update":"on","drivers.destroy":"on","drivers.all":"on","tour_guides.index":"on","tour_guides.create":"on","tour_guides.update":"on","tour_guides.destroy":"on","tour_guides.all":"on","passengers.index":"on","passengers.create":"on","passengers.update":"on","passengers.destroy":"on","passengers.all":"on","attractions.index":"on","attractions.create":"on","attractions.update":"on","attractions.destroy":"on","attractions.all":"on","hotels.index":"on","hotels.create":"on","hotels.update":"on","hotels.destroy":"on","hotels.all":"on","restaurants.index":"on","restaurants.create":"on","restaurants.update":"on","restaurants.destroy":"on","restaurants.all":"on","tours.index":"on","tours.create":"on","tours.update":"on","tours.destroy":"on","tours.all":"on","payments.index":"on","payments.create":"on","payments.update":"on","payments.destroy":"on","payments.all":"on","visas.index":"on","visas.create":"on","visas.update":"on","visas.destroy":"on","visas.all":"on","users.index":"on","users.create":"on","users.update":"on","users.destroy":"on","users.all":"on","roles.index":"on","roles.create":"on","roles.update":"on","roles.destroy":"on","roles.all":"on","permissions.index":"on","permissions.create":"on","permissions.update":"on","permissions.destroy":"on","permissions.all":"on"}',
            ];
            $arr[]=['name'=>"both_$i",
                'email'=>"both_$i@stb.com",
                'password'=>bcrypt('123123'),
                'role_id'=>1,
                'is_hotel_admin'=>1,
                'is_bus_operator'=>1,
                'permissions' => '{"index":"on","create":"on","update":"on","destroy":"on","all":"on","drivers.index":"on","drivers.create":"on","drivers.update":"on","drivers.destroy":"on","drivers.all":"on","tour_guides.index":"on","tour_guides.create":"on","tour_guides.update":"on","tour_guides.destroy":"on","tour_guides.all":"on","passengers.index":"on","passengers.create":"on","passengers.update":"on","passengers.destroy":"on","passengers.all":"on","attractions.index":"on","attractions.create":"on","attractions.update":"on","attractions.destroy":"on","attractions.all":"on","hotels.index":"on","hotels.create":"on","hotels.update":"on","hotels.destroy":"on","hotels.all":"on","restaurants.index":"on","restaurants.create":"on","restaurants.update":"on","restaurants.destroy":"on","restaurants.all":"on","tours.index":"on","tours.create":"on","tours.update":"on","tours.destroy":"on","tours.all":"on","payments.index":"on","payments.create":"on","payments.update":"on","payments.destroy":"on","payments.all":"on","visas.index":"on","visas.create":"on","visas.update":"on","visas.destroy":"on","visas.all":"on","users.index":"on","users.create":"on","users.update":"on","users.destroy":"on","users.all":"on","roles.index":"on","roles.create":"on","roles.update":"on","roles.destroy":"on","roles.all":"on","permissions.index":"on","permissions.create":"on","permissions.update":"on","permissions.destroy":"on","permissions.all":"on"}',
            ];
        }
        DB::table('users')->insert($arr);
    }
}

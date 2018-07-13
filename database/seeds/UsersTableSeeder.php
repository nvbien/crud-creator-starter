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
            'permissions' => '{"index":"on","create":"on","edit":"on","delete":"on","all":"on","drivers.index":"on","drivers.create":"on","drivers.edit":"on","drivers.delete":"on","drivers.all":"on","tour_guides.index":"on","tour_guides.create":"on","tour_guides.edit":"on","tour_guides.delete":"on","tour_guides.all":"on","passengers.index":"on","passengers.create":"on","passengers.edit":"on","passengers.delete":"on","passengers.all":"on","attractions.index":"on","attractions.create":"on","attractions.edit":"on","attractions.delete":"on","attractions.all":"on","hotels.index":"on","hotels.create":"on","hotels.edit":"on","hotels.delete":"on","hotels.all":"on","restaurants.index":"on","restaurants.create":"on","restaurants.edit":"on","restaurants.delete":"on","restaurants.all":"on","tours.index":"on","tours.create":"on","tours.edit":"on","tours.delete":"on","tours.all":"on","payments.index":"on","payments.create":"on","payments.edit":"on","payments.delete":"on","payments.all":"on","visas.index":"on","visas.create":"on","visas.edit":"on","visas.delete":"on","visas.all":"on","users.index":"on","users.create":"on","users.edit":"on","users.delete":"on","users.all":"on","roles.index":"on","roles.create":"on","roles.edit":"on","roles.delete":"on","roles.all":"on","permissions.index":"on","permissions.create":"on","permissions.edit":"on","permissions.delete":"on","permissions.all":"on"}'
        ]);
        DB::table('users')->truncate();
        $user = new \App\Models\User();
        $user->setRawAttributes([
            'name'=>"admin",
            'email'=>'admin@stb.com',
            'password'=>bcrypt('123123'),
            'role_id'=>1,
            'permissions' => '{"index":"on","create":"on","edit":"on","delete":"on","all":"on","drivers.index":"on","drivers.create":"on","drivers.edit":"on","drivers.delete":"on","drivers.all":"on","tour_guides.index":"on","tour_guides.create":"on","tour_guides.edit":"on","tour_guides.delete":"on","tour_guides.all":"on","passengers.index":"on","passengers.create":"on","passengers.edit":"on","passengers.delete":"on","passengers.all":"on","attractions.index":"on","attractions.create":"on","attractions.edit":"on","attractions.delete":"on","attractions.all":"on","hotels.index":"on","hotels.create":"on","hotels.edit":"on","hotels.delete":"on","hotels.all":"on","restaurants.index":"on","restaurants.create":"on","restaurants.edit":"on","restaurants.delete":"on","restaurants.all":"on","tours.index":"on","tours.create":"on","tours.edit":"on","tours.delete":"on","tours.all":"on","payments.index":"on","payments.create":"on","payments.edit":"on","payments.delete":"on","payments.all":"on","visas.index":"on","visas.create":"on","visas.edit":"on","visas.delete":"on","visas.all":"on","users.index":"on","users.create":"on","users.edit":"on","users.delete":"on","users.all":"on","roles.index":"on","roles.create":"on","roles.edit":"on","roles.delete":"on","roles.all":"on","permissions.index":"on","permissions.create":"on","permissions.edit":"on","permissions.delete":"on","permissions.all":"on"}'
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
            ];
            $arr[]=['name'=>"bus_operator_$i",
                'email'=>"bus_operator_$i@stb.com",
                'password'=>bcrypt('123123'),
                'role_id'=>1,
                'is_hotel_admin'=>1,
                'is_bus_operator'=>1,
            ];
            $arr[]=['name'=>"both_$i",
                'email'=>"both_$i@stb.com",
                'password'=>bcrypt('123123'),
                'role_id'=>1,
                'is_hotel_admin'=>1,
                'is_bus_operator'=>1,
            ];
        }
        DB::table('users')->insert($arr);
    }
}

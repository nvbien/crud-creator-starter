<?php

use Illuminate\Database\Seeder;

class CreateHotelsDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Hotel::class, 50)->create()->each(function (\App\Models\Hotel $u) {
            $num = random_int(0,10);
            for($i = 0; $i<$num; $i++){
                $u->employees()->save(factory(App\Models\Employee::class)->make());
            }

            $admins = \App\Models\User::inRandomOrder()->limit(random_int(0,10))->get();
            foreach ($admins as $admin) {
                $user_hotel = new \App\Models\UserHotel();
                $user_hotel->user_id= $admin->id;
                $user_hotel->hotel_id = $u->id;
                $user_hotel->save();
            }
        });
    }
}

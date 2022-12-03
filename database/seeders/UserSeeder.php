<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($i=1;$i<=10;$i++)
        {
            DB::table('users')->insert([
                'first_name'=>Str::random(5),
                'last_name'=>Str::random(5),
                'username'=>Str::random(8),
                'email'=>Str::random(9)."@gmail.com",
                'dob'=>Carbon::create('2000', '01', '01'),
                'gender'=>'Male',
                'phone_number'=>Str::random(15),
                'address'=>Str::random(15),
                'nid_number'=>Str::random(15),
                'dl_number'=>Str::random(15),
                'password'=>bcrypt('1234'),
                'type'=>"Customer"
            ]);

            DB::table('users')->insert([
                'first_name'=>Str::random(5),
                'last_name'=>Str::random(5),
                'username'=>Str::random(8),
                'email'=>Str::random(8)."@gmail.com",
                'dob'=>Carbon::create('1998', '17', '03'),
                'gender'=>'Female',
                'phone_number'=>Str::random(15),
                'address'=>Str::random(15),
                'nid_number'=>Str::random(15),
                'dl_number'=>Str::random(15),
                'password'=>bcrypt('1234'),
                'type'=>"Renter"
            ]);
        }

    }
}

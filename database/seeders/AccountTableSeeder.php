<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Account_Model;

class AccountTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [   
                'name'     => 'Tâm',
                'gender'        =>  1 , 
                'phone'         => '0843944888',
                'email'         => 'tmtam06011997@gmail.com',
                'address'       => 'Cần Thơ' , 
                'avatar'        => Null,
                'username'      => 'admin',
                'password'      => Hash::make('0312') , 
                'is_author'     => 1,
                'is_role'       => null,
                'is_active'     => 1, 
                'is_delete'     => 1,
            ],
        ];
        Account_Model::insert($data);
    }
}

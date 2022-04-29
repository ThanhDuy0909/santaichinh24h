<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Area_regionModel;

class AreaRegionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [ 'region'      => 'Miền Bắc',],
            [ 'region'      => 'Miền Trung',],
            [ 'region'      => 'Miền Nam',],
            [ 'region'      => 'Miền Đông',],
        ];
        Area_regionModel::insert($data);
    }
}

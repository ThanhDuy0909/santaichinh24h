<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Area_provinceModel;

class AreaProvinceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [ 'province'  => 'Hà Nội','region_id' => 1],
            [ 'province'  => 'Hòa Bình','region_id' => 1],
            [ 'province'  => 'Sơn La','region_id' => 1],
            [ 'province'  => 'Điện Biên','region_id' => 1],
            [ 'province'  => 'Lai Châu','region_id' => 1],
            [ 'province'  => 'Lào cai','region_id' => 1],
            [ 'province'  => 'Yên Bái','region_id' => 1],
            [ 'province'  => 'Phú Thọ','region_id' => 1],
            [ 'province'  => 'Hà Giang','region_id' => 1],
            [ 'province'  => 'Tuyên Quang','region_id' => 1],
            [ 'province'  => 'Cao Bằng','region_id' => 1],
            [ 'province'  => 'Bắc Kạn','region_id' => 1],
            [ 'province'  => 'Thái Nguyên','region_id' => 1],
            [ 'province'  => 'Lạng Sơn','region_id' => 1],
            [ 'province'  => 'Bắc Giang','region_id' => 1],
            [ 'province'  => 'Quảng Ninh','region_id' => 1],
            [ 'province'  => 'Bắc Ninh','region_id' => 1],
            [ 'province'  => 'Hà Nam','region_id' => 1],
            [ 'province'  => 'Hải Dương','region_id' => 1],
            [ 'province'  => 'Hải Phòng','region_id' => 1],
            [ 'province'  => 'Hưng Yên','region_id' => 1],
            [ 'province'  => 'Nam Định','region_id' => 1],
            [ 'province'  => 'Ninh Bình','region_id' => 1],
            [ 'province'  => 'Thái Bình','region_id' => 1],
            [ 'province'  => 'Vĩnh Phúc','region_id' => 1],

            [ 'province'  => 'Thanh Hóa','region_id' => 2],
            [ 'province'  => 'Nghệ An','region_id' => 2],
            [ 'province'  => 'Hà Tĩnh','region_id' => 2],
            [ 'province'  => 'Quảng Bình','region_id' => 2],
            [ 'province'  => 'Quảng Trị','region_id' => 2],
            [ 'province'  => 'Thừa Thiên Huế','region_id' => 2],
            [ 'province'  => 'Đà Nẵng','region_id' => 2],
            [ 'province'  => 'Quảng Nam','region_id' => 2],
            [ 'province'  => 'Quảng Ngãi','region_id' => 2],
            [ 'province'  => 'Bình Định','region_id' => 2],
            [ 'province'  => 'Phú Yên','region_id' => 2],
            [ 'province'  => 'Khánh Hóa','region_id' => 2],
            [ 'province'  => 'Ninh Thuận','region_id' => 2],
            [ 'province'  => 'Bình Thuận','region_id' => 2],
            [ 'province'  => 'Kon Tum','region_id' => 2],
            [ 'province'  => 'Gia Lai','region_id' => 2],
            [ 'province'  => 'Đắk Lắk','region_id' => 2],
            [ 'province'  => 'Đắk Nông','region_id' => 2],
            [ 'province'  => 'Lâm Đồng','region_id' => 2],

            [ 'province'  => 'Cần Thơ','region_id' => 3],
            [ 'province'  => 'Thành phố Hồ Chí Minh','region_id' => 3],
            [ 'province'  => 'Tây Ninh','region_id' => 3],
            [ 'province'  => 'Long An','region_id' => 3],
            [ 'province'  => 'Tiền Giang','region_id' => 3],
            [ 'province'  => 'Bến Tre','region_id' => 3],
            [ 'province'  => 'Đồng Tháp','region_id' => 3],
            [ 'province'  => 'Vĩnh Long','region_id' => 3],
            [ 'province'  => 'Trà Vinh','region_id' => 3],
            [ 'province'  => 'An Giang','region_id' => 3],
            [ 'province'  => 'Bạc Liêu','region_id' => 3],
            [ 'province'  => 'Kiên Giang','region_id' => 3],
            [ 'province'  => 'Sóc Trăng','region_id' => 3],
            [ 'province'  => 'Cà Mau','region_id' => 3],
            [ 'province'  => 'Hậu Giang','region_id' => 3],

            [ 'province'  => 'Bình Dương','region_id' => 4],
            [ 'province'  => 'Bình Phước','region_id' => 4],
            [ 'province'  => 'Đồng Nai','region_id' => 4],
            [ 'province'  => 'Vũng Tàu','region_id' => 4],
        ];
        Area_provinceModel::insert($data);
    }
}

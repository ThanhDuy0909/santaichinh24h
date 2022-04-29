<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Catelog_Model;

class CatelogTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [ 'name'      => 'Tin đăng tài chính','parent_id' => null,'child_id' => null],
            [ 'name'      => 'Tin giao dịch CIC','parent_id' => 1,'child_id' => null],
            [ 'name'      => 'Tin mua - bán Data','parent_id' => 1,'child_id' => null],
            [ 'name'      => 'Tin cho vay','parent_id' => 1,'child_id' => null],
            [ 'name'      => 'Tin tuyển dụng','parent_id' => null,'child_id' => null],
            [ 'name'      => 'Lĩnh vực ngành nghề','parent_id' => 5,'child_id' => null],
            [ 'name'      => 'Nội dung','parent_id' => null,'child_id' => null],
            [ 'name'      => 'Tin tức','parent_id' => 7,'child_id' => null],
            [ 'name'      => 'Hỏi - đáp','parent_id' => null,'child_id' => null],
            [ 'name'      => 'Chủ đề','parent_id' => 9,'child_id' => null],
            [ 'name'      => 'Kĩ năng','parent_id' => 5,'child_id' => null],
            [ 'name'      => 'Chuyên viên IT','parent_id' => 5,'child_id' => 6],
            [ 'name'      => 'Lãnh đạo','parent_id' => 5,'child_id' => 11],
            [ 'name'      => 'Giải quyết vấn đề','parent_id' => 5,'child_id' => 11],
            [ 'name'      => 'Giao tiếp và tạo lập quan hệ','parent_id' => 5,'child_id' => 11],
            [ 'name'      => 'Giao tiếp và tạo lập quan hệ','parent_id' => 5,'child_id' => 11],
            [ 'name'      => 'Tư duy sáng tạo','parent_id' => 5,'child_id' => 11],
            [ 'name'      => 'Đàm phán thuyết phục','parent_id' => 5,'child_id' => 11],
            [ 'name'      => 'Quản lý bản thân','parent_id' => 5,'child_id' => 11],
            [ 'name'      => 'Phát triển cá nhân sự nghiệp','parent_id' => 5,'child_id' => 11],
            [ 'name'      => 'Học và tự học','parent_id' => 5,'child_id' => 11],
            [ 'name'      => 'Làm việc nhóm','parent_id' => 5,'child_id' => 11],
            [ 'name'      => 'Lắng nghe','parent_id' => 5,'child_id' => 11],
            [ 'name'      => 'Tổ chức công việc hiệu quả','parent_id' => 5,'child_id' => 11],
            [ 'name'      => 'Thuyết trình','parent_id' => 5,'child_id' => 11],
            [ 'name'      => 'Khác','parent_id' => 5,'child_id' => 11],
        ];
        Catelog_Model::insert($data);
    }
}

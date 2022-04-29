<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Cpanel\AccountController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Cpanel\UserController;
use App\Http\Controllers\Cpanel\DashboardControlelr;
use App\Http\Controllers\Cpanel\SettingController;
use App\Http\Controllers\Cpanel\FinanceController;
use App\Http\Controllers\Cpanel\NewsController;
use App\Http\Controllers\Cpanel\RecruitController;
use App\Http\Controllers\Cpanel\CandidatesController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\Auth\LoginFacebook;
use App\Http\Controllers\Api\Recruit;
use App\Http\Controllers\User\Finance;
use App\Http\Controllers\Api\Account;
use App\Http\Controllers\Auth\ForgotPassword;
use App\Http\Controllers\User\ProfileUser;
use App\Http\Controllers\User\ResertPassword;
use App\Http\Controllers\User\UngvienController;

// use App\Http\Controllers\User\LoginUser;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [HomeController::class, 'index']);  

Route::group(['prefix' => '/recruit'], function () {
    Route::get('/', [Recruit::class, 'index']);  
});

Route::group(['prefix' => '/finance'], function () {
    Route::get('/', [Finance::class, 'index']);  
});

Route::get('/login_user',[LoginController::class,'loginUser']);
Route::get('/logout',[LoginController::class,'logout']);
Route::post('/login_user',[Account::class,'login']);

Route::get('/forgotpass',[ForgotPassword::class,'forgot']);
Route::post('/forgotpass',[ForgotPassword::class,'forgot_pass']);
Route::get('/new_pass',[ForgotPassword::class,'new_pass']);
Route::post('/new_pass',[ForgotPass::class,'update_pass']);

Route::get('/register_user',[RegisterController::class,'registerUser']);
Route::post('/register_user',[RegisterController::class,'register']);

Route::get('/profile_user',[ProfileUser::class,'profileUser']);
Route::get('/update_profile',[ProfileUser::class,'update']);
Route::post('/update_profile',[ProfileUser::class,'update_profile']);

Route::get('/resert_pass',[ResertPassword::class,'resertpass']);
Route::post('/resert_pass',[ResertPassword::class,'resert_pass']);

Route::get('/giaodich_cic',[Finance::class,'giaodich_cic']);
Route::get('/post_cic',[Finance::class,'post_cic']);
Route::get('/detail_post_cic',[Finance::class,'detail_post_cic']);

Route::get('/muaban_data',[Finance::class,'data']);
Route::get('/post_data',[Finance::class,'post_data']);
Route::get('/detail_post_data',[Finance::class,'detail_post_data']);

Route::get('/tinchovay',[Finance::class,'tinchovay']);
Route::get('/post_tinchovay',[Finance::class,'post_tinchovay']);
Route::get('/detail_tin_chovay',[Finance::class,'detail_tin_chovay']);


Route::get('/gop_y',[Finance::class,'gop_y']);
Route::get('/post_create',[Finance::class,'post_create']);

Route::get('/ho_so_ung_vien',[UngvienController::class,'ho_so_ung_vien']);
Route::get('/create_cv',[UngvienController::class,'create_cv']);

Route::get('/post_recruitment',[Recruit::class,'post_recruitment']);
Route::get('/detail_recruitment',[Recruit::class,'detail_recruitment']);







Route::get('/calculate', [HomeController::class, 'calculate']);  
Route::post('/calculate/loadlichsuvay', [HomeController::class, 'loadlichsuvay']);  
Route::get('/loginCic', [HomeController::class, 'loginCic']);  
Route::get('/cic', [HomeController::class, 'cic']); 
// Route::group(['middleware' => ['cicAuth']], function () {
//     Route::get('/cic', [HomeController::class, 'cic']);  
// });

Route::group(['prefix' => '/cpanel'], function () {
    Route::get('/login', [AccountController::class, 'login']);  
    Route::group(['middleware' => ['auth:sanctum']], function () {
        Route::get('/', [DashboardControlelr::class, 'index']);  
        Route::group(['prefix' => '/user'], function () {
            Route::get('/', [UserController::class, 'index']);
            Route::get('/add', [UserController::class, 'add']);  
        });
        Route::group(['prefix' => '/province'], function () {
            Route::get('/', [SettingController::class, 'province']);
            Route::get('/add', [SettingController::class, 'provinceAdd']);  
        });
        Route::group(['prefix' => '/catelog'], function () {
            Route::get('/', [SettingController::class, 'catelog']);
            Route::get('/add', [SettingController::class, 'catelogAdd']);  
        });
        Route::group(['prefix' => '/finance'], function () {
            Route::get('/', [FinanceController::class, 'index']);
            Route::get('/add', [FinanceController::class, 'add']);  
        });
        Route::group(['prefix' => '/news'], function () {
            Route::get('/', [NewsController::class, 'index']);
            Route::get('/add', [NewsController::class, 'add']);  
        });

        Route::group(['prefix' => '/recruit'], function () {
            Route::get('/', [RecruitController::class, 'index']);
            Route::get('/add', [RecruitController::class, 'add']);
        });

        Route::group(['prefix' => '/candidates'], function () {
            Route::get('/', [CandidatesController::class, 'index']);
            Route::get('/add', [CandidatesController::class, 'add']);
        });
    });
});
Route::get('checkcic', [HomeController::class, 'checkcic']);
Route::get('data', [HomeController::class, 'data']);
Route::get('loan', [HomeController::class, 'loan']);

Route::get('user/check_cic/login_face',[LoginFacebook::class,'login_face'])->name('login_face');
Route::get('user/check_cic/logout_face',[LoginFacebook::class,'logout_face'])->name('logout_face');

Route::get('user/check_cic/login_facebook/{provider}',[LoginFacebook::class,'login_facebook'])->name('login_facebook');
Route::get('user/check_cic/callback_facebook/{provider}',[LoginFacebook::class,'callback_facebook'])->name('callback_facebook');

Route::get('user/check_cic/infor_user',[LoginFacebook::class,'infor_user'])->name('infor_user');
Route::post('user/check_cic/infor_user',[LoginFacebook::class,'create_infor'])->name('create_infor');
Route::get('user/check_cic/success',[LoginFacebook::class,'success'])->name('success');
Route::get('user/check_cic/check_cic',[LoginFacebook::class,'check'])->name('check');






// Route::group(['middleware'=> ['auth']], function(){
//     Route::group(['prefix' => '/cpanel'], function () {
//         Route::get('/', [AdminController::class, 'index']);  
//     });
// });

Auth::routes();
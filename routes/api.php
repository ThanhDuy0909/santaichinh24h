<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\Account;
use App\Http\Controllers\Api\User;
use App\Http\Controllers\Api\Area;
use App\Http\Controllers\Api\Catelog;
use App\Http\Controllers\Api\Finance;
use App\Http\Controllers\Api\News;
use App\Http\Controllers\Api\Recruit;
use App\Http\Controllers\Api\Candidates;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware('auth:api')->group(function () {
    Route::get('k', [Home::class, 'index']);
});
Route::group(['prefix' => '/cpanel'], function () {
    Route::post('/login', [Account::class, 'login']); 
    Route::group(['middleware' => ['auth:sanctum']], function () {
        Route::get('/profile', [Account::class, 'profile']);  
        Route::get('/logout', [Account::class, 'logout']);

        Route::group(['prefix' => '/user'], function () {
            Route::get('/', [User::class, 'index']);  
            Route::post('/addUser', [User::class, 'addUser']);  
            Route::post('/findUser', [User::class, 'findUser']); 
            Route::post('/updateUser', [User::class, 'updateUser']);  
            Route::post('/deleteUser', [User::class, 'deleteUser']);  
            Route::post('/checknameUser', [User::class, 'checknameUser']);  
            Route::post('/checkemailUser', [User::class, 'checkemailUser']);  
            Route::post('/checkphoneUser', [User::class, 'checkphoneUser']); 
            Route::post('/changeStatusUser', [User::class, 'changeStatusUser']);   
        });

        Route::group(['prefix' => '/area'], function () {
            Route::get('/', [Area::class, 'getArea']);  
            Route::post('/findArea', [Area::class, 'findArea']);  
            Route::post('/changeStatusProvince', [Area::class, 'changeStatusProvince']);  
            Route::post('/changeStatusRegion', [Area::class, 'changeStatusRegion']);  
            Route::post('/areaAdd', [Area::class, 'areaAdd']);  
            Route::post('/areaUpdate', [Area::class, 'areaUpdate']);  
            Route::post('/deleteProvince', [Area::class, 'deleteProvince']);  
            Route::post('/deleteRegion', [Area::class, 'deleteRegion']);  
        });

        Route::group(['prefix' => '/catelog'], function () {
            Route::get('/', [Catelog::class, 'getCatelog']); 
            Route::post('/catelogAdd', [Catelog::class, 'catelogAdd']);  
            Route::post('/findcatelog', [Catelog::class, 'findcatelog']);  
            Route::post('/catelogUpdate', [Catelog::class, 'catelogUpdate']);  
            Route::post('/deleteCatelog', [Catelog::class, 'deleteCatelog']);   
            Route::post('/changeStatusCatelog', [Catelog::class, 'changeStatusCatelog']);  
        });

        Route::group(['prefix' => '/finance'], function () {
            Route::post('/addfinance', [Finance::class, 'addfinance']);  
            Route::post('/changeStatusFinance', [Finance::class, 'changeStatusFinance']);  
            Route::post('/deleteFinance', [Finance::class, 'deleteFinance']);   
            Route::post('/findfinance', [Finance::class, 'findfinance']);  
            Route::post('/financeUpdate', [Finance::class, 'financeUpdate']);  
        });

        Route::group(['prefix' => '/news'], function () {
            Route::post('/addNews', [News::class, 'addNews']);   
            Route::post('/changeStatusNews', [News::class, 'changeStatusNews']);  
            Route::post('/deleteNews', [News::class, 'deleteNews']);
            Route::post('/findnews', [News::class, 'findnews']);  
            Route::post('/newsUpdate', [News::class, 'newsUpdate']);  
        });

        Route::group(['prefix' => '/recruit'], function () { 
            Route::get('/job', [Recruit::class, 'job']);  
            Route::post('/addRecruit', [Recruit::class, 'addRecruit']);  
            Route::post('/findRecruit', [Recruit::class, 'findRecruit']);  
            Route::post('/updateRecruit', [Recruit::class, 'updateRecruit']);  
            Route::post('/changeStatusRecruit', [Recruit::class, 'changeStatusRecruit']);  
            Route::post('/deleteRecruit', [Recruit::class, 'deleteRecruit']);
        });

        Route::group(['prefix' => '/candidates'], function () { 
            Route::get('/', [Candidates::class, 'getCandidates']);  
            Route::post('/findCandidates', [Candidates::class, 'findCandidates']);  
            Route::post('/updateCandidates', [Candidates::class, 'updateCandidates']);  
            Route::post('/addCandidates', [Candidates::class, 'addCandidates']); 
            Route::post('/changeStatusCandidates', [Candidates::class, 'changeStatusCandidates']);  
            Route::post('/deleteCandidates', [Candidates::class, 'deleteCandidates']); 
           
        });
    }); 
});




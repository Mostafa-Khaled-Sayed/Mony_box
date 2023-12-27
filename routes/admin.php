<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dashboard\CategoryController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Dashboard\ImageController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\Dashboard\TaxController;
use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\Advertise;
use App\Http\Controllers\Dashboard\AdvertiseController;
use App\Http\Controllers\Recharge\RechargeController;
use App\Http\Controllers\Recharge\ReachargepakageController;
use App\Events\MyEvent;

use Illuminate\Support\Facades\Storage;


use App\Http\Controllers\Recharge\ReachargePriceController;
use App\Http\Controllers\Users\RoleController;
use App\Http\Controllers\Users\UserController as UsersUserController;
use App\Http\Controllers\Dashboard\{
    DataController,
    ReportsController,
    NotificationController,
    UserController,
    AnnouncementController,
    DatanormaleController,
    DatamoneyController,
    ImageannouncementsController
};
use App\Http\Controllers\Mony\AutoController;
use App\Http\Controllers\Mony\MoneyTransferController;
use App\Http\Controllers\ReportsController as ControllersReportsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:admin']
    ],
    function () {
        Route::get('/dashboard', function () {

            return view('admin.home');
        });


        //user
        Route::get('/users', [UserController::class, 'index']);
        Route::post('dashboard/user/store', [UserController::class, 'store']);
        Route::post('/dashboard/user/update', [UserController::class, 'update']);
        Route::post('/dashboard/user/delete', [UserController::class, 'delete']);
        Route::post('dashboard/user/deposit', [UserController::class, 'deposit'])->name('dashboard.user.deposit');
        Route::post('/dashboard/user/withdrawal', [UserController::class, 'withdrawal']);
        Route::get('/users/search', [UserController::class, 'search']);



        // //start data
        Route::get('/data', [DataController::class, 'index']);
        Route::get('/data-admin', [AutoController::class, 'create']);

        Route::post('/dashboard/data/store', [DataController::class, 'store']);
        Route::post('/dashboard/data/delete', [DataController::class, 'delete']);
        Route::post('/dashboard/data/edit', [DataController::class, 'update']);

        //notification
        Route::resource('packageprice', ReachargePriceController::class);

        Route::resource('recharge', RechargeController::class);
        Route::get('recharge/destroy/{id}', [RechargeController::class, 'destroy'])->name('recharge.destroy');
        Route::post('updatecompany', [RechargeController::class, 'updatecompany'])->name('updatecompany');
        Route::get('destroycompany/{id}', [RechargeController::class, 'destroycompany'])->name('recharge.destroycompany');
        Route::resource('package', ReachargepakageController::class);
        Route::get('createPrice/{id}', [RechargeController::class, 'createPrice'])->name('createPrice');
        Route::get('createPackage/{id}', [RechargeController::class, 'createPackage'])->name('createPackage');
        //تغيير الصوره و الباك جروند
        Route::post('changebackground/{id}', [RechargeController::class, 'createPrice'])->name('changebackground');
        Route::post('changeImage/{id}', [RechargeController::class, 'createPackage'])->name('changeImage');
        ///////////////
        // //start dataNormal
        Route::get('/dataNormal', [DatanormaleController::class, 'index']);
        Route::post('/dashboard/dataNormal/store', [DatanormaleController::class, 'store']);
        Route::post('/dashboard/dataNormal/delete', [DatanormaleController::class, 'delete']);
        Route::post('/dashboard/dataNormal/edit', [DatanormaleController::class, 'update']);
        //    start announcements

        Route::resource('announcements', AnnouncementController::class);

        Route::post('insert', [AnnouncementController::class, 'store'])->name('insert_file');
        Route::post('insert_img', [AnnouncementController::class, 'store'])->name('insert_img');
        Route::post('/update', [AnnouncementController::class, 'update'])->name('update_data');
        Route::post('/delete', [AnnouncementController::class, 'destroy'])->name('delete_data');

        //Attachmet announcement
        Route::post('Attachmet/store', [ImageannouncementsController::class, 'store']);
        Route::post('Attachmet/delete', [ImageannouncementsController::class, 'delete']);
        //mony
        //MoneyTransferController
        Route::get('/today_profits/{$id}', [MoneyTransferController::class, 'todayProfit']);
        // end transfer Mony

        Route::get('/imagesSlider', [ImageController::class, 'index']);
        Route::post('dashboard/photo/store', [ImageController::class, 'store']);

        Route::post('dashboard/photo/delete', [ImageController::class, 'delete']);

        Route::get('/tax', [TaxController::class, 'index']);
        Route::post('dashboard/tax/update', [TaxController::class, 'update']);
        //setting
        Route::get('/setting', [SettingController::class, 'index']);
        Route::post('dashboard/setting/update', [SettingController::class, 'update']);
        //users permission

        Route::resource('roles', RoleController::class);
        Route::resource('userspromission', UsersUserController::class);
        //reports
        Route::resource('reports', ControllersReportsController::class);
        Route::get('recive', [ControllersReportsController::class, 'recive'])->name('recive');


        //notification
        Route::get('notivication', [NotificationController::class, 'index']);
        Route::get('notivication/delete/{id}', [NotificationController::class, 'delete']);
        Route::get('wait/{id}', [NotificationController::class, 'wait']);
        Route::get('/ready/{id}', [NotificationController::class, 'ready']);

        Route::post('dashboard/cancel', [NotificationController::class, 'cancel'])->name('dashboard.cancel');
        ///البيانات

        Route::get('/allDataMony', [DatamoneyController::class, 'index']);

        Route::resource('country', CountryController::class);

        Route::resource('games', GameController::class);
    }


    //end Dashboard

    //start Dashboard


);
Storage::disk('imageCountry');
Storage::disk('backgroundcountry');

<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Mony\AutoController;
use App\Http\Controllers\Mony\DepsoiteController;
use App\Http\Controllers\Mony\FatoraController;
use App\Http\Controllers\Mony\MoneyTransferController;
use App\Http\Controllers\QRCodeController;
use App\Http\Controllers\web\HomeController;

use App\Http\Controllers\MonyMoneyTransferController;
use App\Http\Controllers\Mony\WalletController;
use App\Models\TransferMony;
use App\Http\Controllers\web\ChangePasswordController;
use App\Http\Controllers\Mony\WithdrawController;
use App\Http\Controllers\Dashboard\ReportsController;
use App\Events\MyEvent;
use App\Http\Controllers\ReportController;

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

Route::get('/', function () {
    return redirect(url('/login'));
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index']);
    Route::get('/invite', [HomeController::class, 'invite']);
    Route::get('/generate-qrcode', [QRCodeController::class, 'index']);
    Route::get('/step1/{id}', [HomeController::class, 'step1']);
    Route::get('show_game/{id}', [HomeController::class, 'show_game'])->name('web.show_game');

    Route::post('viewAnoun/store', [HomeController::class, 'viewAnoun']);
    Route::get('/profile', [HomeController::class, 'profile']);
    Route::get('/history', [HomeController::class, 'history']);
    Route::get('/history2', [HomeController::class, 'create']);
    Route::get('/about', [HomeController::class, 'about']);
    Route::get('/promation', [HomeController::class, 'promation']);
    Route::get('/rule', [HomeController::class, 'rule']);
    Route::get('/mony-Box', [HomeController::class, 'SRA']);
    Route::get('/sendMony', [HomeController::class, 'sendMony']);
    Route::get('/vodafonMony', [HomeController::class, 'vodafonMony']);
    Route::get('/vodafonSend', [HomeController::class, 'vodafonSend']);
    Route::get('/tabra', [HomeController::class, 'tabra']);
    Route::get('/shnRaside', [HomeController::class, 'shnRaside']);
    Route::get('/game', [HomeController::class, 'game']);
    Route::get('companycharge/{id}', [HomeController::class, 'companycharge'])->name('companycharge');
    Route::get('contycharge/{id}', [HomeController::class, 'contycharge'])->name('contycharge');
    Route::get('/companycharge/{id}', [HomeController::class, 'companycharge'])->name('companycharge');

    Route::resource('autodata', AutoController::class);
    Route::get('autodataindex/{id}', [AutoController::class, 'index'])->name('autodataindex');
    Route::resource('deposite', DepsoiteController::class);
    Route::controller(MoneyTransferController::class)->group(function () {
        Route::post('/transfer-mony', 'MoneyTransfer')->name('TransferMony');
        Route::get('/transfer-mony', 'show')->name('transfer-mony');
        //changepassword
        Route::get('/change-password', [ChangePasswordController::class, 'index']);
        Route::post('/change-password', [ChangePasswordController::class, 'changePassword']);
        //end changepassword

        //start WithDraw
        Route::get('/WithDraw', [WithdrawController::class, 'getWithDraw']);
        //end  WithDraw
        // start Wallet
        Route::get('/Wallet', [WalletController::class, 'create']);
        Route::post('Walletstore', [WalletController::class, 'store'])->name("Walletstore");
        // end Wallet
        // start reborts
        Route::resource('reborts', ReportsController::class);
        Route::get('/my_repo/{id}', [ReportsController::class, 'show_report'])->name('show_report');
        Route::get('/get_V_status/{id}', [ReportsController::class, 'V_status'])->name('V_status');
        Route::get('/announ/{id}', [ReportsController::class, 'announ'])->name('announ');
        Route::post('/pay', [FatoraController::class, 'payorder'])->name('pay');
        Route::post('/withdrow', [FatoraController::class, 'withdrow'])->name('withdrow');
        Route::post('/checkout', [FatoraController::class, 'store']);

        Route::get('sendMony/get_wallet', [HomeController::class, 'get_wallet']);
        Route::post('sendMony/posts', [ReportController::class, 'store']);
        Route::get("game/get_data", [HomeController::class, "get_data"]);
        Route::post('game/post_data', [HomeController::class, 'post_data']);
        Route::get('/test', [MonyMoneyTransferController::class, 'index'])->name('test');
    });
});
// Route::resource('autodata', AutoController::class);

// Route::post('pay', [FatoraController::class, 'payorder'])->name('pay');

// Route::get('callback', function () {
//     return 'succes';
// })->name('callback');
// Route::get('error', function () {
//     return 'payment faild';
// })->name('error');
//frontend







require __DIR__ . '/auth.php';

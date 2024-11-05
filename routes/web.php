<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\DestinasiController;
use App\Http\Controllers\RekeningController;
use App\http\Controllers\AdminController;
use App\http\Controllers\PenyewaController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\KantorCabangController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\StaffTransactionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\LaporanController;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Models\Admin;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Database\Events\TransactionBeginning;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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

// AUTH
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'doLogin']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/penyewaregister', [AuthController::class, "penyewaregister"])->name('penyewaregister');
Route::get('/staffregister', [AuthController::class, "staffregister"])->name('staffregister');
Route::post('/penyewaregister', [AuthController::class, "dopenyewaregister"])->name('do.penyewaregister');
Route::post('/staffregister', [AuthController::class, "dostaffregister"])->name('do.staffregister');

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $user = User::where('email', $request->email)->first();
    $admin = Admin::where('email', $request->email)->first();
    $staff = staff::where('email', $request->email)->first();

    if ($user) {
        $status = Password::sendResetLink(
            $request->only('email')
        );
    } elseif ($staff) {
        $status = Password::broker('staff')->sendResetLink(
            $request->only('email')
        );
    } else {
        $status = Password::INVALID_USER;
    }

    return $status === Password::RESET_LINK_SENT
        ? back()->with(['status' => __($status)])
        : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');

Route::get('/reset-password/{token}', function (string $token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);

    $user = User::where('email', $request->email)->first();
    $admin = Admin::where('email', $request->email)->first();
    $staff = staff::where('email', $request->email)->first();

    if ($user) {
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );
    } elseif ($staff) {
        $status = Password::broker('staff')->reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (staff $staff, string $password) {
                $staff->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $staff->save();

                event(new PasswordReset($staff));
            }
        );
    } else {
        $status = Password::INVALID_USER;
    }

    return $status === Password::PASSWORD_RESET
        ? redirect()->route('login')->with('status', __($status))
        : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');

// Admin
Route::prefix('/admin')->middleware('auth:admin')->group(function () {
        Route::get('/dashboard', [PageController::class, 'admin']);
        // Staff
        Route::get('/staff', [AdminController::class, 'staff']);
        Route::get('/staff/{id}', [AdminController::class, 'showStaff']);
        // Penyewa
        Route::get('/penyewa', [AdminController::class, 'penyewa']);
        Route::get('/penyewa/{id}', [AdminController::class, 'showPenyewa']);
        // Kantor Cabang
        Route::get('/kantorcabang', [AdminController::class, 'kantorcabang']);
        Route::get('/kantorcabang/{id}', [AdminController::class, 'showKantorCabang']);
        Route::get('/kantorcabang/bus/{id}', [AdminController::class, 'showBus']);
        Route::get('/kantorcabang/destination/{id}', [AdminController::class, 'showDestination']);
        Route::get('/kantorcabang/{id}/edit', [AdminController::class, 'editKantorCabang']);
        Route::put('/kantorcabang/{id}', [AdminController::class, 'updateKantorCabang']);
        // Transaksi
        Route::get('/transaction', [TransactionController::class, 'transaction']);
        Route::get('/transaction/{id}', [TransactionController::class, 'show']);
        // Route::get('/transaction/{id}/delete', [TransactionController::class, 'destroy']);

        // LAPORAN
        Route::get('/laporan', [AdminController::class, 'laporanAdmin']);
    }
);

// Staff
Route::prefix('/staff')->middleware('auth:staff')->group(
    function () {
        Route::get('/dashboard', [PageController::class, 'staff']);
        // Kantor_cabang
        Route::get('/kantorcabang', [KantorCabangController::class, 'index']);
        Route::get('/kantorcabang/add', [KantorCabangController::class, 'create']);
        Route::post('/kantorcabang', [KantorCabangController::class, 'store']);
        Route::get('/kantorcabang/{id}', [KantorCabangController::class, 'show']);
        Route::get('/kantorcabang/{id}/edit', [KantorCabangController::class, 'edit']);
        Route::put('/kantorcabang/{id}', [KantorCabangController::class, 'update']);
        Route::get('/kantorcabang/{id}/delete', [KantorCabangController::class, 'destroy']);
        // Bus
        Route::get('/bus', [BusController::class, 'index']);
        Route::get('/bus/add', [BusController::class, 'create']);
        Route::post('/bus', [BusController::class, 'store']);
        Route::get('/bus/{id}', [BusController::class, 'show']);
        Route::get('/bus/{id}/edit', [BusController::class, 'edit']);
        Route::put('/bus/{id}', [BusController::class, 'update']);
        Route::get('/bus/{id}/delete', [BusController::class, 'destroy']);
        // Destination
        Route::get('/destination', [DestinasiController::class, 'index']);
        Route::get('/destination/add', [DestinasiController::class, 'create']);
        Route::post('/destination', [DestinasiController::class, 'store'])->name('destination.store');
        Route::get('/destination/{id}', [DestinasiController::class, 'show']);
        Route::get('/destination/{id}/edit', [DestinasiController::class, 'edit']);
        Route::put('/destination/{id}', [DestinasiController::class, 'update']);
        Route::get('/destination/{id}/delete', [DestinasiController::class, 'destroy']);
        // Rekening
        Route::get('/rekening', [RekeningController::class, 'index']);
        Route::get('/rekening/add', [RekeningController::class, 'create']);
        Route::post('/rekening', [RekeningController::class, 'store']);
        Route::get('/rekening/{id}', [RekeningController::class, 'show']);
        Route::get('/rekening/{id}/edit', [RekeningController::class, 'edit']);
        Route::put('/rekening/{id}', [RekeningController::class, 'update']);
        Route::get('/rekening/{id}/delete', [RekeningController::class, 'destroy']);
        // Transaction
        Route::get('/transaction', [StaffTransactionController::class, 'index']);
        Route::get('/transaction/{id}', [StaffTransactionController::class, 'show']);

        // PROFILE
        Route::get("/profile/{id}",[StaffController::class, "staffProfile"]);
        Route::put("/profile/{id}", [StaffController::class, "staffUpdate"]);
        
        // LAPORAN
        Route::get('/laporan', [LaporanController::class, 'index']);
        
    }
);

// Penyewa
Route::get('/', [PenyewaController::class, 'landingpage']);
Route::get('/about', [PenyewaController::class, 'about']);
Route::get('/kantorcabang/{id}', [PenyewaController::class, 'detailkantorcabang']);
Route::get('/bookingpage', [BookingController::class, 'bookingpage']);
// Route::get('/bookingpage', [PenyewaController::class, 'bookingpage'])->middleware('auth');
Route::post('/booking', [BookingController::class, 'booking'])->name('booking');
// Route::get('/success', [BookingController::class], 'success');

Route::middleware('auth:web')->group(function () {
    // Profile
    Route::get('/profile/{id}', [ProfileController::class, 'profile']);
    Route::get('/profile/{id}/edit', [ProfileController::class, 'editProfile']);
    Route::put('/profile/{id}', [ProfileController::class, 'updateProfile']);
});

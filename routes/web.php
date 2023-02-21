<?php

use App\Http\Controllers\AccountCloseController;
use App\Http\Controllers\AccountOpenController;
use App\Http\Controllers\BreakFastController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChangeProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DeliveryboyController;
use App\Http\Controllers\DeterminationController;
use App\Http\Controllers\DinnerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ExpenceController;
use App\Http\Controllers\InviteController;
use App\Http\Controllers\LunchController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SalesController;

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

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/', function () {return view('pages.frontend.index');})->name('index');
Route::get('/about-us', function () {return view('pages.frontend.about');})->name('about');
Route::get('/menu', function () {return view('pages.frontend.menuitems');})->name('menu');
Route::get('/contact', function () {return view('pages.frontend.contact');})->name('contact');

Auth::routes();

// BACK END
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    // CHANGE PASSWORD - INDEX
    Route::middleware(['auth:sanctum', 'verified'])->get('/zwork-admin/password_change', [ChangeProfileController::class, 'index_password'])->name('settings');

    // CHANGE PASSWORD - STORE
    Route::middleware(['auth:sanctum', 'verified'])->post('/zwork-admin/password_update', [ChangeProfileController::class, 'update_password'])->name('change.password');

    // PROFILE - INDEX
    Route::middleware(['auth:sanctum', 'verified'])->get('/zwork-admin/profile_change', [ChangeProfileController::class, 'index_profile'])->name('profile');

    // PROFILE - STORE
    Route::middleware(['auth:sanctum', 'verified'])->post('/zwork-admin/profile_update', [ChangeProfileController::class, 'update_profile'])->name('change.profile');

    // DASHBOARD
    Route::middleware(['auth:sanctum', 'verified'])->get('/home', [DashboardController::class, 'index'])->name('home');

    // INVITE CONTROLLER
    Route::middleware(['auth:sanctum', 'verified'])->group(function () {
        // INDEX
        Route::middleware(['auth:sanctum', 'verified'])->get('/zwork-admin/invite', [InviteController::class, 'index'])->name('invite.index');
        // CREATE
        Route::middleware(['auth:sanctum', 'verified'])->get('/zwork-admin/invite/create', [InviteController::class, 'create'])->name('invite.create');
        // STORE
        Route::middleware(['auth:sanctum', 'verified'])->post('/zwork-admin/invite/store', [InviteController::class, 'store'])->name('invite.store');
    });

    // CUSTOMER CONTROLLER
    Route::middleware(['auth:sanctum', 'verified'])->group(function () {
        // INDEX
        Route::middleware(['auth:sanctum', 'verified'])->get('/zwork-admin/customer', [CustomerController::class, 'index'])->name('customer.index');
        // CREATE
        Route::middleware(['auth:sanctum', 'verified'])->get('/zwork-admin/customer/create', [CustomerController::class, 'create'])->name('customer.create');
        // STORE
        Route::middleware(['auth:sanctum', 'verified'])->post('/zwork-admin/customer/store', [CustomerController::class, 'store'])->name('customer.store');
        // EDIT
        Route::middleware(['auth:sanctum', 'verified'])->get('/zwork-admin/customer/edit/{id}', [CustomerController::class, 'edit'])->name('customer.edit');
        // VIEW
        Route::middleware(['auth:sanctum', 'verified'])->get('/zwork-admin/customer/view/{id}', [CustomerController::class, 'view'])->name('customer.view');
        // UPDATE
        Route::middleware(['auth:sanctum', 'verified'])->put('/zwork-admin/customer/update/{id}', [CustomerController::class, 'update'])->name('customer.update');
        // DELETE
        Route::middleware(['auth:sanctum', 'verified'])->put('/zwork-admin/customer/delete/{id}', [CustomerController::class, 'delete'])->name('customer.delete');
        // DESTROY
        Route::middleware(['auth:sanctum', 'verified'])->delete('/zwork-admin/customer/destroy/{id}', [CustomerController::class, 'destroy'])->name('customer.destroy');
    });

    // DELIVERY BOY CONTROLLER
    Route::middleware(['auth:sanctum', 'verified'])->group(function () {
        // INDEX
        Route::middleware(['auth:sanctum', 'verified'])->get('/zwork-admin/deliveryboy', [DeliveryboyController::class, 'index'])->name('deliveryboy.index');
        // CREATE
        Route::middleware(['auth:sanctum', 'verified'])->get('/zwork-admin/deliveryboy/create', [DeliveryboyController::class, 'create'])->name('deliveryboy.create');
        // STORE
        Route::middleware(['auth:sanctum', 'verified'])->post('/zwork-admin/deliveryboy/store', [DeliveryboyController::class, 'store'])->name('deliveryboy.store');
        // EDIT
        Route::middleware(['auth:sanctum', 'verified'])->get('/zwork-admin/deliveryboy/edit/{id}', [DeliveryboyController::class, 'edit'])->name('deliveryboy.edit');
        // UPDATE
        Route::middleware(['auth:sanctum', 'verified'])->put('/zwork-admin/deliveryboy/update/{id}', [DeliveryboyController::class, 'update'])->name('deliveryboy.update');
        // DELETE
        Route::middleware(['auth:sanctum', 'verified'])->put('/zwork-admin/deliveryboy/delete/{id}', [DeliveryboyController::class, 'delete'])->name('deliveryboy.delete');
        // DESTROY
        Route::middleware(['auth:sanctum', 'verified'])->delete('/zwork-admin/deliveryboy/destroy/{id}', [DeliveryboyController::class, 'destroy'])->name('deliveryboy.destroy');
    });


    // BREAK FAST CONTROLLER
    Route::middleware(['auth:sanctum', 'verified'])->group(function () {
        // EDIT
        Route::middleware(['auth:sanctum', 'verified'])->get('/zwork-admin/sales/breakfast/edit/{id}', [BreakFastController::class, 'edit'])->name('breakfast.edit');
        // UPDATE
        Route::middleware(['auth:sanctum', 'verified'])->put('/zwork-admin/sales/breakfast/update/{id}', [BreakFastController::class, 'update'])->name('breakfast.update');
        // DELETE
        Route::middleware(['auth:sanctum', 'verified'])->put('/zwork-admin/sales/breakfast/delete/{id}', [BreakFastController::class, 'delete'])->name('breakfast.delete');
        // DESTROY
        Route::middleware(['auth:sanctum', 'verified'])->delete('/zwork-admin/sales/breakfast/destroy/{id}', [BreakFastController::class, 'destroy'])->name('breakfast.destroy');
    });

    // LUNCH CONTROLLER
    Route::middleware(['auth:sanctum', 'verified'])->group(function () {
        // EDIT
        Route::middleware(['auth:sanctum', 'verified'])->get('/zwork-admin/sales/lunch/edit/{id}', [LunchController::class, 'edit'])->name('lunch.edit');
        // UPDATE
        Route::middleware(['auth:sanctum', 'verified'])->put('/zwork-admin/sales/lunch/update/{id}', [LunchController::class, 'update'])->name('lunch.update');
        // DELETE
        Route::middleware(['auth:sanctum', 'verified'])->put('/zwork-admin/sales/lunch/delete/{id}', [LunchController::class, 'delete'])->name('lunch.delete');
        // DESTROY
        Route::middleware(['auth:sanctum', 'verified'])->delete('/zwork-admin/sales/lunch/destroy/{id}', [LunchController::class, 'destroy'])->name('lunch.destroy');
    });

    // DINNER CONTROLLER
    Route::middleware(['auth:sanctum', 'verified'])->group(function () {
        // EDIT
        Route::middleware(['auth:sanctum', 'verified'])->get('/zwork-admin/sales/dinner/edit/{id}', [DinnerController::class, 'edit'])->name('dinner.edit');
        // UPDATE
        Route::middleware(['auth:sanctum', 'verified'])->put('/zwork-admin/sales/dinner/update/{id}', [DinnerController::class, 'update'])->name('dinner.update');
        // DELETE
        Route::middleware(['auth:sanctum', 'verified'])->put('/zwork-admin/sales/dinner/delete/{id}', [DinnerController::class, 'delete'])->name('dinner.delete');
        // DESTROY
        Route::middleware(['auth:sanctum', 'verified'])->delete('/zwork-admin/sales/dinner/destroy/{id}', [DinnerController::class, 'destroy'])->name('dinner.destroy');
    });

    // PAYMENT CONTROLLER
    Route::middleware(['auth:sanctum', 'verified'])->group(function () {
        // INDEX
        Route::middleware(['auth:sanctum', 'verified'])->get('/zwork-admin/payment', [PaymentController::class, 'index'])->name('payment.index');
        // CREATE
        Route::middleware(['auth:sanctum', 'verified'])->get('/zwork-admin/payment/create', [PaymentController::class, 'create'])->name('payment.create');
        // STORE
        Route::middleware(['auth:sanctum', 'verified'])->post('/zwork-admin/payment/store', [PaymentController::class, 'store'])->name('payment.store');
        // EDIT
        Route::middleware(['auth:sanctum', 'verified'])->get('/zwork-admin/payment/edit/{id}', [PaymentController::class, 'edit'])->name('payment.edit');
        // UPDATE
        Route::middleware(['auth:sanctum', 'verified'])->put('/zwork-admin/payment/update/{id}', [PaymentController::class, 'update'])->name('payment.update');
        // DELETE
        Route::middleware(['auth:sanctum', 'verified'])->put('/zwork-admin/payment/delete/{id}', [PaymentController::class, 'delete'])->name('payment.delete');
        // DESTROY
        Route::middleware(['auth:sanctum', 'verified'])->delete('/zwork-admin/payment/destroy/{id}', [PaymentController::class, 'destroy'])->name('payment.destroy');
    });

    // EMPLOYEE CONTROLLER
    Route::middleware(['auth:sanctum', 'verified'])->group(function () {
        // INDEX
        Route::middleware(['auth:sanctum', 'verified'])->get('/zwork-admin/employee', [EmployeeController::class, 'index'])->name('employee.index');
        // CREATE
        Route::middleware(['auth:sanctum', 'verified'])->get('/zwork-admin/employee/create', [EmployeeController::class, 'create'])->name('employee.create');
        // STORE
        Route::middleware(['auth:sanctum', 'verified'])->post('/zwork-admin/employee/store', [EmployeeController::class, 'store'])->name('employee.store');
        // VIEW
        Route::middleware(['auth:sanctum', 'verified'])->get('/zwork-admin/employee/view/{id}', [EmployeeController::class, 'view'])->name('employee.view');
        // EDIT
        Route::middleware(['auth:sanctum', 'verified'])->get('/zwork-admin/employee/edit/{id}', [EmployeeController::class, 'edit'])->name('employee.edit');
        // UPDATE
        Route::middleware(['auth:sanctum', 'verified'])->put('/zwork-admin/employee/update/{id}', [EmployeeController::class, 'update'])->name('employee.update');
        // DELETE
        Route::middleware(['auth:sanctum', 'verified'])->put('/zwork-admin/employee/delete/{id}', [EmployeeController::class, 'delete'])->name('employee.delete');
        // DESTROY
        Route::middleware(['auth:sanctum', 'verified'])->delete('/zwork-admin/employee/destroy/{id}', [EmployeeController::class, 'destroy'])->name('employee.destroy');
    });

    // EXPENCE CONTROLLER
    Route::middleware(['auth:sanctum', 'verified'])->group(function () {
        // INDEX
        Route::middleware(['auth:sanctum', 'verified'])->get('/zwork-admin/expence', [ExpenceController::class, 'index'])->name('expence.index');
        // CREATE
        Route::middleware(['auth:sanctum', 'verified'])->get('/zwork-admin/expence/create', [ExpenceController::class, 'create'])->name('expence.create');
        // STORE
        Route::middleware(['auth:sanctum', 'verified'])->post('/zwork-admin/expence/store', [ExpenceController::class, 'store'])->name('expence.store');
        // EDIT
        Route::middleware(['auth:sanctum', 'verified'])->get('/zwork-admin/expence/edit/{id}', [ExpenceController::class, 'edit'])->name('expence.edit');
        // UPDATE
        Route::middleware(['auth:sanctum', 'verified'])->put('/zwork-admin/expence/update/{id}', [ExpenceController::class, 'update'])->name('expence.update');
        // DELETE
        Route::middleware(['auth:sanctum', 'verified'])->put('/zwork-admin/expence/delete/{id}', [ExpenceController::class, 'delete'])->name('expence.delete');
        // DESTROY
        Route::middleware(['auth:sanctum', 'verified'])->delete('/zwork-admin/expence/destroy/{id}', [ExpenceController::class, 'destroy'])->name('expence.destroy');
    });

    // ACCOUNT OPEN CONTROLLER
    Route::middleware(['auth:sanctum', 'verified'])->group(function () {
        // INDEX
        Route::middleware(['auth:sanctum', 'verified'])->get('/zwork-admin/accountopen', [AccountOpenController::class, 'index'])->name('accountopen.index');
        // CREATE
        Route::middleware(['auth:sanctum', 'verified'])->get('/zwork-admin/accountopen/create', [AccountOpenController::class, 'create'])->name('accountopen.create');
        // STORE
        Route::middleware(['auth:sanctum', 'verified'])->post('/zwork-admin/accountopen/store', [AccountOpenController::class, 'store'])->name('accountopen.store');
        // EDIT
        Route::middleware(['auth:sanctum', 'verified'])->get('/zwork-admin/accountopen/edit/{id}', [AccountOpenController::class, 'edit'])->name('accountopen.edit');
        // UPDATE
        Route::middleware(['auth:sanctum', 'verified'])->put('/zwork-admin/accountopen/update/{id}', [AccountOpenController::class, 'update'])->name('accountopen.update');
        // DELETE
        Route::middleware(['auth:sanctum', 'verified'])->put('/zwork-admin/accountopen/delete/{id}', [AccountOpenController::class, 'delete'])->name('accountopen.delete');
        // DESTROY
        Route::middleware(['auth:sanctum', 'verified'])->delete('/zwork-admin/accountopen/destroy/{id}', [AccountOpenController::class, 'destroy'])->name('accountopen.destroy');
    });

    // ACCOUNT CLOSE CONTROLLER
    Route::middleware(['auth:sanctum', 'verified'])->group(function () {
        // INDEX
        Route::middleware(['auth:sanctum', 'verified'])->get('/zwork-admin/accountclose', [AccountCloseController::class, 'index'])->name('accountclose.index');
        // CREATE
        Route::middleware(['auth:sanctum', 'verified'])->get('/zwork-admin/accountclose/create', [AccountCloseController::class, 'create'])->name('accountclose.create');
        // STORE
        Route::middleware(['auth:sanctum', 'verified'])->post('/zwork-admin/accountclose/store', [AccountCloseController::class, 'store'])->name('accountclose.store');
        // EDIT
        Route::middleware(['auth:sanctum', 'verified'])->get('/zwork-admin/accountclose/edit/{id}', [AccountCloseController::class, 'edit'])->name('accountclose.edit');
        // UPDATE
        Route::middleware(['auth:sanctum', 'verified'])->put('/zwork-admin/accountclose/update/{id}', [AccountCloseController::class, 'update'])->name('accountclose.update');
        // DELETE
        Route::middleware(['auth:sanctum', 'verified'])->put('/zwork-admin/accountclose/delete/{id}', [AccountCloseController::class, 'delete'])->name('accountclose.delete');
        // DESTROY
        Route::middleware(['auth:sanctum', 'verified'])->delete('/zwork-admin/accountclose/destroy/{id}', [AccountCloseController::class, 'destroy'])->name('accountclose.destroy');
    });

    // DETERMINATION CONTROLLER
    Route::middleware(['auth:sanctum', 'verified'])->group(function () {
        // INDEX
        Route::middleware(['auth:sanctum', 'verified'])->get('/zwork-admin/determination', [DeterminationController::class, 'index'])->name('determination.index');
        // CREATE
        Route::middleware(['auth:sanctum', 'verified'])->get('/zwork-admin/determination/create', [DeterminationController::class, 'create'])->name('determination.create');
        // STORE
        Route::middleware(['auth:sanctum', 'verified'])->post('/zwork-admin/determination/store', [DeterminationController::class, 'store'])->name('determination.store');
        // EDIT
        Route::middleware(['auth:sanctum', 'verified'])->get('/zwork-admin/determination/edit/{id}', [DeterminationController::class, 'edit'])->name('determination.edit');
        // UPDATE
        Route::middleware(['auth:sanctum', 'verified'])->put('/zwork-admin/determination/update/{id}', [DeterminationController::class, 'update'])->name('determination.update');
        // DELETE
        Route::middleware(['auth:sanctum', 'verified'])->put('/zwork-admin/determination/delete/{id}', [DeterminationController::class, 'delete'])->name('determination.delete');
        // DESTROY
        Route::middleware(['auth:sanctum', 'verified'])->delete('/zwork-admin/determination/destroy/{id}', [DeterminationController::class, 'destroy'])->name('determination.destroy');
    });

     // SALES CONTROLLER
     Route::middleware(['auth:sanctum', 'verified'])->group(function () {
        // INDEX
        Route::middleware(['auth:sanctum', 'verified'])->get('/zwork-admin/sales', [SalesController::class, 'index'])->name('sales.index');
        // CREATE
        Route::middleware(['auth:sanctum', 'verified'])->get('/zwork-admin/sales/create', [SalesController::class, 'create'])->name('sales.create');
        // STORE
        Route::middleware(['auth:sanctum', 'verified'])->post('/zwork-admin/sales/store', [SalesController::class, 'store'])->name('sales.store');
    });
});

// INVITE ACCEPT
Route::get('/accept/{token}', [InviteController::class, 'accept']);

//CUSTOMER DATE ARRAY FILTER
Route::get('/getdatewiseCustomerOrders', [CustomerController::class, 'getdatewiseCustomerOrders']);
Route::get('/export_customerorder_pdf/{id}', [CustomerController::class, 'export_customerorder_pdf']);
Route::get('/filtercustomerorders', [CustomerController::class, 'filtercustomerorders']);



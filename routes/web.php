<?php

use App\Exceptions\CustomExeption;
use App\Notifications\InvoicePaid;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


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


Route::post('getMpesaPayment', 'MpesaPaymentController@getMpesaPayment');
Route::get('registerUrls', 'MpesaPaymentController@registerUrls');
Route::post('getMpesaValidation', 'MpesaPaymentController@getMpesaValidation');
Route::get('simulate', 'MpesaPaymentController@simulate');
Route::view('/','backend.homePage');


Auth::routes();
//Route::middleware('auth')->group(function () {
    Route::get('login', function () {
        return view('auth.login');
    });
Route::middleware('auth')->group(function () {

    Route::resource('Dashboard', 'DashboardController');
    Route::resource('PayRent', 'PayRentController');
    Route::resource('Messages', 'MessagesController');
    Route::resource('ReadMessage', 'ReadmessageController');
    Route::resource('ComposeMessage', 'tenantSendMessageController');
    Route::resource('paymentRecords', 'PaymentRecordsController');
    Route::resource('complaint', 'complaintController');

    Route::get('/home', 'HomeController@index');
});
Route::prefix('admin')->group(function(){

Route::get('/login', 'Auth\AdminloginController@showLoginForm')->name('admin.login');
Route::post('/login', 'Auth\AdminloginController@login')->name('admin.login.submit');

});


Route::middleware('auth:admin')->group(function () {

    Route::prefix('admin')->group(function(){

    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::resource('/Compose', 'ComposeController');
    Route::resource('/Message', 'BackmessageController');
    Route::resource('/ReadMessage', 'BackreadmessageController');
    Route::resource('/mpesapayments', 'MpesapaymentController');
    Route::resource('users', 'UserController');
    Route::resource('Register', 'RegisterController');
//    Route::resource('billPayment', 'billPaymentController');
//    Route::resource('tenantAccount', 'tenantAccountController');
//    Route::resource('property', 'propertyController');
    Route::resource('leases', 'LeaseController');
    Route::resource('properties', 'PropertyController');
//    Route::resource('tenantaccounts', 'TenantaccountController');
    Route::resource('bills', 'BillController');
    Route::resource('servicebills', 'ServicebillController');
    Route::resource('propertyunits', 'PropertyunitController');
//    Route::resource('propertyattributes', 'PropertyattributeController');
    Route::resource('propertyunitattributes', 'PropertyunitattributeController');
    Route::resource('propertyunitservicebills', 'PropertyunitservicebillController');
    Route::resource('propertyspects', 'PropertyspectController');
    Route::resource('reports', 'ReportController');
    Route::resource('tenantaccounts', 'TenantaccountController');
    Route::resource('paidtenants', 'PaidtenantController');
    Route::resource('replyMessage', 'ReplyMessageController');
    Route::resource('complaints', 'backComplaintController');
    Route::resource('generalReport', 'finalReportController');
    Route::resource('cashBank', 'cashPaymentsController');
    Route::resource('testing', 'billTenantTestingController');
    Route::get('cashBanks', 'cashPaymentsController@balance');
    Route::get('TenantReport/{id}', 'finalReportController@eachTenantReport');
    Route::get('leaseHelp', 'leaseHelpController@index');
    Route::get('complain', 'complaintController@notification');
    Route::get('serviceBillDetails/{id}','BillController@serviceBillDetails');
    Route::get('beal','BillController@billing');


        Route::any('getPaidFilter/{id}','PaidtenantController@getPaidTenants');
        Route::any('getReportFilter/{id}','finalReportController@getPropertyReportDetails');


        Route::view('registerSuccess', 'backend.registerSuccess');
        Route::get('vacant/{id}', 'PropertyunitController@vacantHouses');

        Route::get('tenants', function (){
            $user =Auth::user();

            $user->notify(new InvoicePaid(\App\Models\User::find(1)));
          return view('backend.tenants');
        });

        Route::view('payments&billing', 'backend.paymentsAndBilling');
        Route::get('readUserMessages/{id}','BackreadmessageController@userMessages');
        Route::get('pUnits/{id}','PropertyunitController@pUnits');
        Route::get('createPUnit/{id}','PropertyunitController@create');
        Route::get('pUnitServiceBill/{id}','PropertyunitservicebillController@pUnitServiceBill');
        Route::get('createUnitServiceBill/{id}','PropertyunitservicebillController@create');
        Route::get('create','RegisterController@validator');
        Route::get('tenantsMpesa','MpesaPaymentController@store');
        Route::get('paidTenants/{id}','PaidtenantController@paidTenants');
        Route::get('unpaidTenants/{id}','TenantaccountController@unpaidTenants');
        Route::get('propertReport/{id}','finalReportController@eachPropertyReport');
        Route::get('propertReportDetails/{id}','finalReportController@getPropertyReportDetails');
        Route::get('lDetails/{id}','cashPaymentsController@leaseDetails');
        Route::view('error','backend.error');
        Route::view('billError','backend.billingError');
        Route::view('pageError','backend.leaseError');
        Route::view('errorPage','backend.userError');
    });
});



//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');
//
//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');
//
//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');
//
//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');
//
//Route::get('send',function (){
//    $mess =\App\Jobs\SendSms::dispatch('this is a test message','0790268795');
//
//});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

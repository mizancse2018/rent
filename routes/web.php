<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PoliceFormController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\SslCommerzPaymentController;
use Illuminate\Support\Facades\Auth;


Auth::routes(['verify' => true]);

Route::get('/login',[LoginController::class,'showLoginForm'])->name('login');
Route::get('/owner',[LoginController::class,'showOwnerLoginForm'])->name('owner.login-view');
Route::post('/owner',[LoginController::class,'ownerLogin'])->name('owner.login');
Route::get('/admin',[LoginController::class,'showAdminLoginForm'])->name('admin.login-view');
Route::post('/admin',[LoginController::class,'adminLogin'])->name('admin.login');

Route::get('/register',[RegisterController::class,'showRegisterForm'])->name('register');
Route::get('/owner/register',[RegisterController::class,'showOwnerRegisterForm'])->name('owner.register-view');
Route::post('/owner/register',[RegisterController::class,'createOwner'])->name('owner.register');
Route::get('/admin/register',[RegisterController::class,'showAdminRegisterForm'])->name('admin.register-view');
Route::post('/admin/register',[RegisterController::class,'createAdmin'])->name('admin.register');

Route::get('/', [FrontendController::class, 'index'])->name('/');
Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/properties', [FrontendController::class, 'properties'])->name('properties');
Route::get('/property_details/{id}', [FrontendController::class, 'propertyDetails'])->name('property.details');
Route::get('/search',[FrontEndController::class,'search'])->name('search');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::post('contact_save', [FrontEndController::class, 'contact_save'])->name('contact_save');


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', [HomeController::class, 'tenantDashboard'])->name('home');
    Route::get('/tenant/profile',[HomeController::class,'tenantProfile'])->name('tenant.profile');
    Route::post('/tenant/profile',[HomeController::class,'editTenantProfile'])->name('edit.profile');
    Route::get('/tenant/take_rent/{id}',[HomeController::class,'takeRent'])->name('take.rent');
    Route::get('/tenant/rent_history', [HomeController::class, 'rentHistory'])->name('tenant.rent_history');
    Route::post('/tenant/leave_rent/{id}',[HomeController::class,'leaveRent'])->name('leave.rent');
    Route::get('/tenant/generate-invoice/{id}',[InvoiceController::class,'generateInvoice'])->name('generate.invoice');
    Route::get('/tenant/download-invoice/{id}',[InvoiceController::class,'downloadInvoice'])->name('download.invoice');
});

Route::middleware(['auth:owner'])->group(function () {
    Route::get('/owner/dashboard',[OwnerController::class,'ownerDashboard'])->name('owner');
    Route::get('/owner/profile',[OwnerController::class,'ownerProfile'])->name('owner.profile');
    Route::post('/owner/profile',[OwnerController::class,'editOwnerProfile'])->name('edit.owner_profile');
    Route::get('/owner/add_property',[OwnerController::class,'addProperty'])->name('add.property');
    Route::post('api/fetch-districts', [OwnerController::class, 'fetchDistrict']);
    Route::post('api/fetch-areas', [OwnerController::class, 'fetchArea']);
    Route::post('/owner/save_property',[OwnerController::class,'saveProperty'])->name('save.property');
    Route::get('/owner/edit_property/{id}',[OwnerController::class,'edit'])->name('edit.property');
    Route::delete('/delete_image/{id}',[OwnerController::class,'deleteImage'])->name('delete.image');
    Route::delete('/owner/delete_property/{id}',[OwnerController::class,'destroyProperty'])->name('delete.property');
    Route::put('/update_property/{id}',[OwnerController::class,'updateProperty'])->name('update.property');
    Route::get('/owner/manage_property',[OwnerController::class,'manageProperty'])->name('manage.property');
    Route::get('/owner/post_details/{id}',[OwnerController::class,'postDetails'])->name('post.details');
    Route::get('/owner/rent_history',[OwnerController::class,'rentHistory'])->name('owner.rent_history');
    Route::get('/generate_police_form/{id}',[PoliceFormController::class,'generatePoliceForm'])->name('generate.police_form');
    Route::get('/download_police_form/{id}',[PoliceFormController::class,'downloadPoliceForm'])->name('download.police_form');
});

Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/dashboard',[AdminController::class,'adminDashboard'])->name('admin');
    Route::get('/admin/profile',[AdminController::class,'adminProfile'])->name('admin.profile');
    Route::post('/admin/profile',[AdminController::class,'editAdminProfile'])->name('edit.admin_profile');
    Route::get('/admin/manage_admin',[AdminController::class,'manageAdmin'])->name('manage.admin');
    Route::get('/admin/admin_details/{id}',[AdminController::class,'adminDetails'])->name('admin.details');
    Route::get('/admin/role/{id}',[AdminController::class,'role'])->name('admin.role');
    Route::get('/admin/manage_owner',[AdminController::class,'manageOwner'])->name('manage.owner');
    Route::get('/admin/owner_details/{id}',[AdminController::class,'ownerDetails'])->name('owner.details');
    Route::get('/admin/owner_profile_status/{id}',[AdminController::class,'ownerProfileStatus'])->name('owner.profile_status');
    Route::get('/admin/manage_tenant',[AdminController::class,'manageTenant'])->name('manage.tenant');
    Route::get('/admin/tenant_details/{id}',[AdminController::class,'tenantDetails'])->name('tenant.details');
    Route::get('/admin/tenant_profile_status/{id}',[AdminController::class,'tenantProfileStatus'])->name('tenant.profile_status');
    Route::get('/admin/property_status/{id}',[AdminController::class,'propertyStatus'])->name('property_status');
    Route::get('/admin/manage_post',[AdminController::class,'managePost'])->name('manage.post');
    Route::get('/admin/rent_history',[AdminController::class,'rentHistory'])->name('admin.rent_history');
});


Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);
Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);
Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);

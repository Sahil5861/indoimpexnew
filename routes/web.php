<?php

use Illuminate\Http\Request;

use App\Http\Controllers\Auth\LoginUserController;
use App\Http\Controllers\Auth\RegisterUserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColourController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ProductGroupsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\RoleController2;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\DealersController;
use App\Http\Controllers\ViewsController;
use App\Http\Controllers\ContactPersonController;
use App\Http\Controllers\GalleryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdditionalImageController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\paymentController;
use App\Http\Controllers\DocumentTypeController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\BoppCategoryController;
use App\Http\Controllers\BoppItemController;

use App\Http\Controllers\PPWovenCategoryController;
use App\Http\Controllers\PPWovenItemController;



use App\Http\Controllers\NonWovenCategoryController;
use App\Http\Controllers\NonWovenItemController;
use App\Http\Controllers\MainUserController;
use App\Http\Controllers\RolePermissionController;

use App\Http\Controllers\JobTypeController;


// Dealersauth routes
use App\Http\Controllers\DealerAuthController;

// Public Routes
Route::get('/', function () {
    if (!Auth::check()) {        
        return view('auth.login');
    }
    return redirect()->route('dashboard');
})->name('home');


Route::get('/states/{id}', [LocationController::class, 'getStates'])->name('getStates');
Route::get('/cities/{id}', [LocationController::class, 'getCities'])->name('getCities');



// Authentication Routes
Route::middleware(['redirectIfAuthenticated'])->group(function () {
    Route::get('/login', function (){
        return view('auth.login');
    })->name('login');
    Route::get('/register', [RegisterUserController::class, 'showRegistrationForm'])->name('register');
    Route::post('/login', [LoginUserController::class, 'login']);
    Route::post('/register', [RegisterUserController::class, 'register']);
});

// Protected Routes of Admin
// Route::middleware(['auth', 'can:users'])->group(function () {

Route::middleware(['auth'])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('admin.dashboard');
    // })->name('dashboard');

    Route::post('/logout', [LoginUserController::class, 'logout'])->name('logout');
    Route::get('/logout', [LoginUserController::class, 'logout'])->name('logout.get');


    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


    Route::get('admin/user', [UserController::class, 'index'])->name('admin.user');
    Route::post('admin/user/update-status/{id}', [UserController::class, 'updateStatus'])->name('admin.user.status');
    Route::get('admin/user/create', [UserController::class, 'create'])->name('admin.user.create');
    Route::get('admin/user/edit/{id}', [UserController::class, 'edit'])->name('admin.user.edit');
    Route::get('admin/user/delete/{id}', [UserController::class, 'remove'])->name('admin.user.delete');
    Route::delete('admin/user/delete/{id}', [UserController::class, 'destroy'])->name('admin.user.destroy');
    Route::post('admin/user/create', [UserController::class, 'store'])->name('admin.user.create.post');
    Route::put('admin/user/{user}', [UserController::class, 'update'])->name('admin.user.edit.post');
    Route::delete('admin/user/delete-selected', [UserController::class, 'deleteSelected'])->name('admin.user.deleteSelected');
    Route::post('admin/user/import', [UserController::class, 'import'])->name('admin.user.import');
    Route::get('admin/user/export', [UserController::class, 'export'])->name('admin.user.export');
    Route::get('/sample-file-download-user', [UserController::class, 'sampleFileDownloadUser'])->name('sample-file-download-user');



    Route::get('admin/role', [RoleController::class, 'index'])->name('admin.role');
    Route::post('admin/role/update-status/{id}', [RoleController::class, 'updateStatus'])->name('admin.role.status');
    Route::get('admin/role/create', [RoleController::class, 'create'])->name('admin.role.create');
    Route::get('admin/role/edit/{id}', [RoleController::class, 'edit'])->name('admin.role.edit');
    Route::get('admin/role/delete/{id}', [RoleController::class, 'remove'])->name('admin.role.delete');
    Route::post('admin/role/create', [RoleController::class, 'store'])->name('admin.role.create.post');
    Route::put('admin/role/edit/{id}', [RoleController::class, 'store'])->name('admin.role.edit.post'); // Updated to PUT method
    Route::delete('admin-role-deletemulti', [RoleController::class, 'multidelete'])->name('admin.role.deletemulti');
    Route::get('admin/role/export', [RoleController::class, 'export'])->name('admin.role.export');
    Route::post('admin/role/import', [RoleController::class, 'import'])->name('admin.role.import');
    Route::get('/sample-file-download-role', [RoleController::class, 'sampleFileDownloadRole'])->name('sample-file-download-role');
    Route::get('admin/role/access/{roleId}', [RoleController::class, 'manageAccess'])->name('admin.role.access');
    Route::post('admin/role/access/{roleId}', [RoleController::class, 'updateAccess'])->name('admin.role.updateAccess');


    // role permissions

    Route::get('admin/role-permissions/{id}', [RolePermissionController::class, 'index'])->name('admin.rolepermission');
    Route::post('admin/role-permissions-update', [RoleController::class, 'rolepermissionsupdate'])->name('admin.role-permissions-update');

    Route::post('admin/role-permision-store', [RolePermissionController::class, 'store'])->name('admin.rolepermission.save');
    Route::get('admin/role/create', [RoleController::class, 'create'])->name('admin.role.create');
    Route::get('admin/role/edit/{id}', [RoleController::class, 'edit'])->name('admin.role.edit');
    Route::get('admin/role/delete/{id}', [RoleController::class, 'remove'])->name('admin.role.delete');
    Route::post('admin/role/create', [RoleController::class, 'store'])->name('admin.role.create.post');
    Route::put('admin/role/edit/{id}', [RoleController::class, 'store'])->name('admin.role.edit.post'); // Updated to PUT method
    


    // -----------------------------------Permission Routes--------------------------------------
    Route::get('admin/permissions', [PermissionController::class, 'index'])->name('admin.permissions');
    Route::post('admin-permision-save', [PermissionController::class, 'store'])->name('admin.permission.save');
    Route::delete('role-delete-selected', [PermissionController::class, 'multidelete'])->name('admin.permission.deleteSelected');

    Route::post('create/feature', [PermissionController::class, 'createFeature'])->name('admin.feature.save');
    Route::post('create/module', [PermissionController::class, 'createModule'])->name('admin.module.save');

    // main admin
    Route::get('admin/main_users', [MainUserController::class, 'index'])->name('admin.mainUsers');
    Route::post('admin/main_users-save', [MainUserController::class, 'store'])->name('admin.mainUsers.save');
    Route::post('admin/main_users-delete/{id}', [MainUserController::class, 'remove'])->name('admin.mainUsers.delete');



    // PP categories

    Route::get('admin/bopp-stock-pp-categories', [BoppCategoryController::class, 'index'])->name('bopp-stock.categories.view');    
    Route::post('add-category', [BoppCategoryController::class, 'save'])->name('admin.bopp-stock-pp-categories.save');
    Route::get('delete-category/{id}', [BoppCategoryController::class, 'remove'])->name('admin.bopp-stock-pp-categories.remove');
    Route::delete('boppstock-delete-selected-categories', [BoppCategoryController::class, 'multidelete'])->name('bopp-stock.categories.deletemulti');

    // PP Items
    Route::get('admin/bopp-stock-pp-item', [BoppItemController::class, 'index'])->name('boppstock.items.view');    
    Route::post('add-item', [BoppItemController::class, 'save'])->name('admin.bopp-stock-pp-item.save');
    Route::get('delete-item/{id}', [BoppItemController::class, 'remove'])->name('admin.bopp-stock-pp-item.remove');
    Route::delete('boppstock-delete-selected-items', [BoppCategoryController::class, 'multidelete'])->name('bopp-stock.items.deletemulti');

    // Non woven categorry
    Route::get('admin/non-woven-categories', [NonWovenCategoryController::class, 'index'])->name('non-wovenfabricstock.categories.view');    
    Route::post('add-non-woven-category', [NonWovenCategoryController::class, 'save'])->name('admin.NonWovenCategory.save');
    Route::get('delete-non-category/{id}', [NonWovenCategoryController::class, 'remove'])->name('admin.NonWovenCategory.remove');
    Route::delete('non-woven-delete-selected-categories', [NonWovenCategoryController::class, 'multidelete'])->name('non-wovenfabricstock.categories.deletemulti');

    // Non woven Items
    Route::get('admin/non-woven-item', [NonWovenItemController::class, 'index'])->name('non-wovenfabricstock.items.view');    
    Route::post('add-non-woven-item', [NonWovenItemController::class, 'save'])->name('admin.NonWovenItem.save');
    Route::get('delete-non-woven-item/{id}', [NonWovenItemController::class, 'remove'])->name('non-wovenfabricstock.items.delete');
    Route::delete('non-woven-delete-selected-items', [NonWovenItemController::class, 'multidelete'])->name('non-wovenfabricstock.items.deletemulti');

    // PP woven categorry
    Route::get('admin/pp-woven-categories', [PPWovenCategoryController::class, 'index'])->name('ppwovenfabricstock.categories.view');    
    Route::post('add-pp-woven-category', [PPWovenCategoryController::class, 'save'])->name('admin.PPWovenCategory.save');
    Route::get('delete-pp-category/{id}', [PPWovenCategoryController::class, 'remove'])->name('admin.PPWovenCategory.remove');
    Route::delete('pp-woven-delete-selected-categories', [PPWovenCategoryController::class, 'multidelete'])->name('pp-wovenfabricstock.categories.deletemulti');

    // PP woven Items
    Route::get('admin/pp-woven-item', [PPWovenItemController::class, 'index'])->name('ppwovenfabricstock.items.view');    
    Route::post('add-pp-woven-item', [PPWovenItemController::class, 'save'])->name('admin.PPWovenItem.save');
    Route::get('delete-pp-woven-item/{id}', [PPWovenItemController::class, 'remove'])->name('admin.PPWovenItem.remove');
    Route::delete('pp-woven-delete-selected-items', [PPWovenItemController::class, 'multidelete'])->name('pp-wovenfabricstock.items.deletemulti');

    // Job Type
    Route::get('admin/job-type', [JobTypeController::class, 'index'])->name('job-type.view');    
    Route::post('add-job-type', [JobTypeController::class, 'save'])->name('admin.job-type.save');
    Route::get('delete-job-type/{id}', [JobTypeController::class, 'remove'])->name('admin.job-type.remove');
    Route::delete('job-delete-selected-type', [JobTypeController::class, 'multidelete'])->name('job-type.deletemulti');

    Route::get('update-submodule', function (Request $request){
        $id = $request->id;
        $submodules = \App\Models\Module::where('parent_id', $id)->get();

        if ($submodules) {
            return response()->json([
                'success' => true,
                'data' => $submodules
            ]);
        }
    })->name('update-submodule');

});








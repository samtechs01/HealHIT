<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\Product\AddProductProposal;
use App\Livewire\Product\Admin\ShowProject;
use App\Livewire\Product\Admin\ShowProposal;
use App\Livewire\Product\CompleteProduct;
use App\Livewire\Product\InitiatedProject;
use App\Livewire\Product\InitiatedProjects;
use App\Livewire\Product\InitiateProject;
use App\Livewire\Product\ProductBlog;
use App\Livewire\Product\Publishing;
use App\Livewire\RolesAndPermission;
use App\Livewire\RolesAndPermission\CreateAdminUser;
use App\Livewire\RolesAndPermission\CreateAdminUsers;
use App\Livewire\RolesAndPermission\CreatePermission;
use App\Livewire\RolesAndPermission\CreateRole;
use App\Livewire\RolesAndPermission\DeleteRole;
use App\Livewire\RolesAndPermission\DeleteUser;
use App\Livewire\RolesAndPermission\RoleAssignment;
use App\Livewire\RolesAndPermission\ShowPermissions;
use App\Livewire\RolesAndPermission\ShowRoles;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/prescriptions', function () {
    return view('prescriptions');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/alumni-consultancy', function () {
    return view('alumni-consultancy');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('/dashboard/admin')->middleware('role:SuperAdmin')->group(function (){
    Route::get('/',RolesAndPermission::class);
    Route::get('permissions/{id?}',ShowPermissions::class);
    Route::match(['GET','POST'],'add-permission',CreatePermission::class);
    Route::match(['GET','POST'],'add-role',CreateRole::class);
    Route::get('roles/{id?}',ShowRoles::class);
    Route::match(['GET','POST'],'remove-role/{id?}',[DeleteRole::class,'removeRole']);
    Route::get('remove-user/{id}',[DeleteUser::class,'removeUser']);
    Route::match(['GET','POST'],'assign-role',RoleAssignment::class);
    Route::match(['GET','POST'],'add-admin',CreateAdminUser::class);
});

Route::prefix('/dashboard/product')->middleware('role:Student|SuperAdmin')->group(function(){
    Route::get('add-proposal', AddProductProposal::class);
    Route::get('initiate-project/{proposalID}', InitiateProject::class);
    Route::get('initiated-projects',InitiatedProject::class);
    Route::get('complete-project/{productId}',CompleteProduct::class);
    Route::get('publishing',Publishing::class);

});

Route::prefix('/dashboard/admin')->middleware('role:Admin|SuperAdmin')->group(function(){
    Route::get('show-proposals', ShowProposal::class);//
    Route::get('show-projects', ShowProject::class);//
});

Route::prefix('/dashboard/product')->middleware('role:Admin|Student|SuperAdmin')->group(function(){
    Route::get('project-blog/{productId}',ProductBlog::class);
});
Route::prefix('/product')->middleware('role:Student|Admin|SuperAdmin')->group(function(){
    Route::get('project-blog/{productId}',ProductBlog::class);
});

require __DIR__.'/auth.php';
  
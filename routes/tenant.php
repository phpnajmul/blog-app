<?php

declare(strict_types=1);

use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\SettingsController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Tenant\ProfileController;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {

//Frontend route Start
    Route::get('/', [FrontendController::class, 'index'])->name('/');
    Route::get('post/view/{id}',[FrontendController::class, 'catWisePostView'])->name('cat.wise.post.view');
    Route::get('post/view/details/{id}',[FrontendController::class, 'PostViewDetails'])->name('post.view.details');
//Frontend route END


//Backend Routes Start
    Route::get('/dashboard', function () {
        return view('backend.domain_dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::get('logout', [SettingsController::class,'logout'])->name('logout');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });


//Settings Routes Start
    Route::prefix('settings')->group(function (){
       Route::get('all', [SettingsController::class, 'allSettings'])->name('all.setting');
       Route::post('all/store', [SettingsController::class, 'storeAllSettings'])->name('all.setting.store');
       Route::get('all/edit', [SettingsController::class, 'editAllSettings'])->name('all.setting.edit');
       Route::post('all/update/{id}', [SettingsController::class, 'updateAllSettings'])->name('all.setting.update');
    });
//Settings Routes END

//Section Menu Routes Start
    Route::prefix('sections')->group(function (){
        Route::get('about/index', [AboutController::class, 'index'])->name('index.about');
        Route::get('about/create', [AboutController::class, 'create'])->name('create.about');
        Route::post('about/store', [AboutController::class, 'store'])->name('store.about');
        Route::get('about/edit', [AboutController::class, 'edit'])->name('edit.about');
        Route::post('about/update/{id}', [AboutController::class, 'update'])->name('update.about');
        //about active inactive routes start
        Route::get('about/inactive', [AboutController::class, 'inactive'])->name('inactive.about');
        Route::get('about/active', [AboutController::class, 'active'])->name('active.about');
        Route::get('about/map/details', [AboutController::class, 'mapDetails'])->name('map.details.about');
        //about active inactive routes end
    });
//Section Menu Routes END


//Category Section Routes Start
    Route::prefix('categories')->group(function (){
       Route::get('index', [CategoryController::class, 'index'])->name('index.category');
       Route::get('create', [CategoryController::class, 'create'])->name('create.category');
       Route::post('store', [CategoryController::class, 'store'])->name('store.category');
       Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('edit.category');
       Route::post('update/{id}', [CategoryController::class, 'update'])->name('update.category');
       Route::get('delete/{id}', [CategoryController::class, 'delete'])->name('delete.category');
    });

//Category Section Routes END

//Post Routes Start
    Route::prefix('post')->group(function (){
       Route::get('index', [PostController::class, 'index'])->name('index.post');
       Route::get('create', [PostController::class, 'create'])->name('create.post');
       Route::post('store', [PostController::class, 'store'])->name('store.post');
       Route::get('edit/{id}', [PostController::class, 'edit'])->name('edit.post');
       Route::post('update/{id}', [PostController::class, 'update'])->name('update.post');
       Route::get('delete/{id}', [PostController::class, 'delete'])->name('delete.post');
    });

//Post Routes END










//Backend Routes END
    require __DIR__.'/tenant_auth.php';
});

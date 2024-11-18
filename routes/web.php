<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\Home\PortfolioController;
use App\Http\Controllers\Home\BlogCategoryController;
use App\Http\Controllers\Home\AboutController;
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

Route::get('/', function () {
    return view('frontend.index');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'Profile'])->name('admin.profile');
    Route::get('/edit/profile', [AdminController::class, 'EditProfile'])->name('edit.profile');
    Route::post('/store/profile', [AdminController::class, 'StoreProfile'])->name('store.profile');
    
    Route::get('/change/password', [AdminController::class, 'ChangePassword'])->name('change.password');
    Route::post('/update/password', [AdminController::class, 'UpdatePassword'])->name('update.password');
});

// Home Slider All Route
Route::middleware('auth')->group(function () {
    Route::get('/home/slide', [HomeSliderController::class, 'HomeSlider'])->name('home.slide');
    Route::post('/update/slide', [HomeSliderController::class, 'UpdateSlider'])->name('update.slide');
});

// Home Slider All Route
Route::middleware('auth')->group(function () {
    Route::get('/all/portfolio', [PortfolioController::class, 'AllPortfolio'])->name('all.portfolio');
    Route::get('/add/portfolio', [PortfolioController::class, 'AddPortfolio'])->name('add.portfolio');
    Route::post('/store/portfolio', [PortfolioController::class, 'StorePortfolio'])->name('store.portfolio');
    Route::get('/edit/portfolio/{id}', [PortfolioController::class, 'EditPortfolio'])->name('edit.portfolio');
    Route::post('/update/portfolio', [PortfolioController::class, 'UpdatePortfolio'])->name('update.portfolio');
    Route::get('/delete/portfolio/{id}', [PortfolioController::class, 'DeletePortfolio'])->name('delete.portfolio');
    Route::get('/portfolio/details/{id}', [PortfolioController::class, 'PortfolioDetails'])->name('portfolio.details');
});

// About Page All Route
Route::middleware('auth')->group(function () {
    Route::get('/about/page', [AboutController::class, 'AboutPage'])->name('about.page');
    Route::post('/update/about', [AboutController::class, 'UpdateAbout'])->name('update.about');
    Route::get('/about', [AboutController::class, 'HomeAbout'])->name('home.about');

    Route::get('/about/multi/image', [AboutController::class, 'AboutMultiImage'])->name('about.multi.image');
    Route::post('/store/multi/image', [AboutController::class, 'StoreMultiImage'])->name('store.multi.image');
    Route::get('/all/multi/image', [AboutController::class, 'AllMultiImage'])->name('all.multi.image');
    Route::get('/edit/multi/image/{id}', [AboutController::class, 'EditMultiImage'])->name('edit.multi.image');
    Route::post('/update/multi/image', [AboutController::class, 'UpdateMultiImage'])->name('update.multi.image');
    Route::get('/delete/multi/image/{id}',[AboutController::class,  'DeleteMultiImage'])->name('delete.multi.image');
});

// Blog Category Route
Route::middleware('auth')->group(function () {
    Route::get('/all/blog/category', [BlogCategoryController::class, 'AllBlogCategory'])->name('all.blog.category');
    Route::get('/add/blog/category', [BlogCategoryController::class, 'AddBlogCategory'])->name('add.blog.category');
    Route::post('/store/blog/category', [BlogCategoryController::class, 'StoreBlogCategory'])->name('store.blog.category');
});

require __DIR__.'/auth.php';

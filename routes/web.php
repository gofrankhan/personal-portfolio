<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\Home\PortfolioController;
use App\Http\Controllers\Home\BlogCategoryController;
use App\Http\Controllers\Home\BlogController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\FooterController;
use App\Http\Controllers\Home\ContactController;
use App\Http\Controllers\Demo\DemoController;
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

// Route::get('/', function () {
//     return view('frontend.index');
// });

// Home Slider All Route
Route::middleware('auth')->group(function () {
    Route::get('/', [DemoController::class, 'HomeMain'])->name('home');
    // Route::get('/home/slide', [HomeSliderController::class, 'HomeSlider'])->name('home.slide');
    // Route::post('/update/slide', [HomeSliderController::class, 'UpdateSlider'])->name('update.slide');
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
    Route::get('/edit/blog/category/{id}', [BlogCategoryController::class, 'EditBlogCategory'])->name('edit.blog.category');
    Route::post('/update/blog/category/{id}', [BlogCategoryController::class, 'UpdateBlogCategory'])->name('update.blog.category');
    Route::get('/delete/blog/category/{id}', [BlogCategoryController::class, 'DeleteBlogCategory'])->name('delete.blog.category');
});

// Blog All Route
Route::middleware('auth')->group(function () {
    Route::get('/all/blogs', [BlogController::class, 'AllBlogs'])->name('all.blogs');
    Route::get('/add/blogs', [BlogController::class, 'AddBlogs'])->name('add.blogs');
    Route::get('/edit/blogs/{id}', [BlogController::class, 'EditBlogs'])->name('edit.blogs');
    Route::post('/store/blogs', [BlogController::class, 'StoreBlogs'])->name('store.blogs');
    Route::get('/delete/blogs/{id}', [BlogController::class, 'DeleteBlogs'])->name('delete.blogs');
    Route::post('/update/blogs', [BlogController::class, 'UpdateBlogs'])->name('update.blogs');
    Route::get('/blog/details/{id}', [BlogController::class, 'BlogDetails'])->name('blog.details');
    Route::get('/category/blog/{id}', [BlogController::class, 'CategoryBlog'])->name('category.blog');
});

// Footer All Route
Route::middleware('auth')->group(function () {
    Route::get('/footer/setup', [FooterController::class, 'FooterSetup'])->name('footer.setup');
    Route::get('/edit/footer', [FooterController::class, 'EditFooter'])->name('edit.footer');
    Route::post('/update/footer', [FooterController::class, 'UpdateFooter'])->name('update.footer');
});

// Contact All Route
Route::middleware('auth')->group(function () {
    Route::get('/contact', [ContactController::class, 'Contact'])->name('contact.me');
    Route::post('/store/message', [ContactController::class, 'StoreMessage'])->name('store.message');
    Route::get('/contact/message', [ContactController::class, 'ContactMessage'])->name('contact.message');   
    Route::get('/delete/message/{id}', [ContactController::class,'DeleteMessage'])->name('delete.message'); 
});

require __DIR__.'/auth.php';

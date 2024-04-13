<?php

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

use App\Http\Controllers\AdminFrontendController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CostController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

Route::middleware('guest')->group(function(){
    Route::get('login', [AuthController::class,'login'])->name('login');
    Route::post('/login',[AuthController::class,'loginPost'])->name('login.post');
    Route::get('register',[AuthController::class,'register'])->name('register');
    Route::post('register',[AuthController::class,'registerPost'])->name('register.post');
});

Route::get('/',[FrontendController::class,'index'])->name('home');
Route::get('/about',[FrontendController::class,'about'])->name('about');
Route::get('/contact',[FrontendController::class,'contact'])->name('contact');
Route::post('/contact',[AdminFrontendController::class,'contactPost'])->name('contact.post');

Route::prefix('admin')->middleware('auth')->name('admin.')->group(function(){
    Route::get('/', [DashboardController::class,'index'])->name('dashboard');
    Route::get('/logout',[AuthController::class,'logout'])->name('logout');

    Route::name('frontend.')->group(function(){
        Route::get('/settings',[AdminFrontendController::class,'settings'])->name('settings');
        Route::post('/settings',[AdminFrontendController::class,'settingsPost'])->name('settings.post');
        Route::get('/porto',[AdminFrontendController::class,'porto'])->name('porto');
        Route::post('/porto',[AdminFrontendController::class,'portoPost'])->name('porto.post');
        Route::put('/porto/{id}',[AdminFrontendController::class,'portoUpdate'])->name('porto.put');

        Route::get('/about',[AdminFrontendController::class,'about'])->name('about');
        Route::post('/benefit',[AdminFrontendController::class,'benefit'])->name('benefit');
        Route::post('/benefit-update',[AdminFrontendController::class,'updateBenefit'])->name('benefit.update');
        Route::get('/benefit/{id}',[AdminFrontendController::class,'deleteBenfit'])->name('benefit.delete');

        Route::post('/banner',[AdminFrontendController::class,'banner'])->name('banner.post');
        Route::post('/service-title',[AdminFrontendController::class,'serviceTitle'])->name('service.title');
        Route::post('/service',[AdminFrontendController::class,'serviceAdd'])->name('service.post');
        Route::put('/service/{id}',[AdminFrontendController::class,'serviceUpdate'])->name('service.update');
        Route::get('/service/{id}',[AdminFrontendController::class,'serviceDelete'])->name('service.delete');

        Route::post('quote',[AdminFrontendController::class,'quote'])->name('quote.post');

        Route::post('testi',[AdminFrontendController::class,'testiTitle'])->name('testi.title');
        Route::post('testi-add',[AdminFrontendController::class,'addTesti'])->name('testi.add');
        Route::put('testi-edit/{id}',[AdminFrontendController::class,'editTesti'])->name('testi.update');
        Route::get('message',[AdminFrontendController::class,'message'])->name('message');

    });

    Route::get('supplier', [SupplierController::class,'index'])->name('supplier');
    Route::post('supplier', [SupplierController::class,'store'])->name('supplier.post');
    Route::put('supplier/{id}', [SupplierController::class,'update'])->name('supplier.update');
    Route::delete('supplier/{id}', [SupplierController::class,'delete'])->name('supplier.delete');

    Route::get('delivery',[DeliveryController::class,'index'])->name('delivery');
    Route::post('delivery', [DeliveryController::class,'store'])->name('delivery.post');
    Route::put('delivery/{id}', [DeliveryController::class,'update'])->name('delivery.update');

    Route::get('/product',[ProductController::class,'index'])->name('product');
    Route::post('/product',[ProductController::class,'post'])->name('product.post');
    Route::put('/product/{id}',[ProductController::class,'edit'])->name('product.update');

    Route::get('cost',[CostController::class,'index'])->name('cost');
    Route::post('cost',[CostController::class,'post'])->name('cost.post');
    Route::put('cost/{id}',[CostController::class,'update'])->name('cost.update');

});

Route::group(['prefix' => 'email'], function(){
    Route::get('inbox', function () { return view('pages.email.inbox'); });
    Route::get('read', function () { return view('pages.email.read'); });
    Route::get('compose', function () { return view('pages.email.compose'); });
});

Route::group(['prefix' => 'apps'], function(){
    Route::get('chat', function () { return view('pages.apps.chat'); });
    Route::get('calendar', function () { return view('pages.apps.calendar'); });
});

Route::group(['prefix' => 'ui-components'], function(){
    Route::get('alerts', function () { return view('pages.ui-components.alerts'); });
    Route::get('badges', function () { return view('pages.ui-components.badges'); });
    Route::get('breadcrumbs', function () { return view('pages.ui-components.breadcrumbs'); });
    Route::get('buttons', function () { return view('pages.ui-components.buttons'); });
    Route::get('button-group', function () { return view('pages.ui-components.button-group'); });
    Route::get('cards', function () { return view('pages.ui-components.cards'); });
    Route::get('carousel', function () { return view('pages.ui-components.carousel'); });
    Route::get('collapse', function () { return view('pages.ui-components.collapse'); });
    Route::get('dropdowns', function () { return view('pages.ui-components.dropdowns'); });
    Route::get('list-group', function () { return view('pages.ui-components.list-group'); });
    Route::get('media-object', function () { return view('pages.ui-components.media-object'); });
    Route::get('modal', function () { return view('pages.ui-components.modal'); });
    Route::get('navs', function () { return view('pages.ui-components.navs'); });
    Route::get('navbar', function () { return view('pages.ui-components.navbar'); });
    Route::get('pagination', function () { return view('pages.ui-components.pagination'); });
    Route::get('popovers', function () { return view('pages.ui-components.popovers'); });
    Route::get('progress', function () { return view('pages.ui-components.progress'); });
    Route::get('scrollbar', function () { return view('pages.ui-components.scrollbar'); });
    Route::get('scrollspy', function () { return view('pages.ui-components.scrollspy'); });
    Route::get('spinners', function () { return view('pages.ui-components.spinners'); });
    Route::get('tabs', function () { return view('pages.ui-components.tabs'); });
    Route::get('tooltips', function () { return view('pages.ui-components.tooltips'); });
});

Route::group(['prefix' => 'advanced-ui'], function(){
    Route::get('cropper', function () { return view('pages.advanced-ui.cropper'); });
    Route::get('owl-carousel', function () { return view('pages.advanced-ui.owl-carousel'); });
    Route::get('sweet-alert', function () { return view('pages.advanced-ui.sweet-alert'); });
});

Route::group(['prefix' => 'forms'], function(){
    Route::get('basic-elements', function () { return view('pages.forms.basic-elements'); });
    Route::get('advanced-elements', function () { return view('pages.forms.advanced-elements'); });
    Route::get('editors', function () { return view('pages.forms.editors'); });
    Route::get('wizard', function () { return view('pages.forms.wizard'); });
});

Route::group(['prefix' => 'charts'], function(){
    Route::get('apex', function () { return view('pages.charts.apex'); });
    Route::get('chartjs', function () { return view('pages.charts.chartjs'); });
    Route::get('flot', function () { return view('pages.charts.flot'); });
    Route::get('morrisjs', function () { return view('pages.charts.morrisjs'); });
    Route::get('peity', function () { return view('pages.charts.peity'); });
    Route::get('sparkline', function () { return view('pages.charts.sparkline'); });
});

Route::group(['prefix' => 'tables'], function(){
    Route::get('basic-tables', function () { return view('pages.tables.basic-tables'); });
    Route::get('data-table', function () { return view('pages.tables.data-table'); });
});

Route::group(['prefix' => 'icons'], function(){
    Route::get('feather-icons', function () { return view('pages.icons.feather-icons'); });
    Route::get('flag-icons', function () { return view('pages.icons.flag-icons'); });
    Route::get('mdi-icons', function () { return view('pages.icons.mdi-icons'); });
});

Route::group(['prefix' => 'general'], function(){
    Route::get('blank-page', function () { return view('pages.general.blank-page'); });
    Route::get('faq', function () { return view('pages.general.faq'); });
    Route::get('invoice', function () { return view('pages.general.invoice'); });
    Route::get('profile', function () { return view('pages.general.profile'); });
    Route::get('pricing', function () { return view('pages.general.pricing'); });
    Route::get('timeline', function () { return view('pages.general.timeline'); });
});

Route::group(['prefix' => 'error'], function(){
    Route::get('404', function () { return view('pages.error.404'); });
    Route::get('500', function () { return view('pages.error.500'); });
});

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

// 404 for undefined routes
Route::any('/{page?}',function(){
    return View::make('pages.error.404');
})->where('page','.*');

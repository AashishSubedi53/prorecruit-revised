<?php

use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GenerateReportController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Professional\HomeController;
use App\Http\Controllers\Admin\ProfessionalController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\admin\ReportController;
use App\Http\Controllers\Admin\ServiceCategoryController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Customer\HomeController as CustomerHomeController;
use App\Http\Controllers\Customer\ProfessionalDetailsController;
use App\Http\Controllers\Customer\ProfessionalSearchController;
use App\Http\Controllers\Customer\ProfileController as CustomerProfileController;
use App\Http\Controllers\Customer\serviceController as CustomerServiceController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\KhaltiConfirmController;
use App\Http\Controllers\Professional\BookingController;
use App\Http\Controllers\Professional\GalleryController;
use App\Http\Controllers\Professional\Message;
use App\Http\Controllers\Professional\OrderController as ProfessionalOrderController;
use App\Http\Controllers\Professional\ProfessionalServiceController;
use App\Http\Controllers\Professional\ProfileController as ProfessionalProfileController;
use App\Livewire\Checkout;
use App\Livewire\Customer\MyBookings;
use App\Livewire\Customer\ProfessionalDetails;
use App\Livewire\Customer\SearchProfessionals;
use App\Livewire\KhaltiControllerCheck;
use App\Livewire\Professional\Services;
use App\Livewire\Professional\Services\CreateServices;
use App\Livewire\Professional\Services\EditServices;
use App\Livewire\Professional\Services\Index;
use App\Models\Service;
use App\Models\SiteSetting;
use App\Models\Testimonial;
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
    $homeServices = Service::where('service_category_id', '1')->get() ?? [];
    $healthServices = Service::where('service_category_id', '2')->get() ?? [];
    $webServices = Service::where('service_category_id', '3')->get() ?? [];

    // testimonials
    $testimonials = Testimonial::all();
    return view('welcome', compact(['homeServices', 'healthServices', 'webServices', 'testimonials']));
})->name('home')->middleware('redirectUser');


Route::get('auth/google', [GoogleAuthController::class, 'googleLogin'])->name('google-auth');
Route::get('auth/google/callback', [GoogleAuthController::class, 'callbackGoogle'])->name('google-callback');


Route::get('admin/dashboard', [DashboardController::class, 'showMap'])->middleware(['auth', 'verified', 'role:admin'])->name('dashboard'); 
Route::get('/contact', function(){
    return view('contact');
})->name('contact')->middleware('redirectUser');

Route::post('/contact', [ContactController::class, 'sendContactForm'])->name('contact-submit');

Route::get('/admin/dashboard/stats', [DashboardController::class, 'getStats']);


Route::get('register-user', function(){

//     // Get the homepage banner image path
    return view('registeruser');
})->name('registeruser');

Route::get('register-pro', function(){
//     // Get the homepage banner image path
    return view('registerpro');
})->name('registerpro');

Route::view('about', 'about')->name('about')->middleware('redirectUser');

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('admin/users', [UserController::class, 'index'])
    ->name('users.index');

    Route::get('admin/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('admin/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('admin/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware'=>'role:admin'], function(){

    Route::resource('customers', CustomerController::class);
    Route::resource('professionals', ProfessionalController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('serviceCategories', ServiceCategoryController::class);
    // Route::resource('settings', SiteSettingController::class);
    Route::resource('testimonials', TestimonialController::class);
    Route::resource('reports', GenerateReportController::class);
    Route::resource('bookings', OrderController::class);
});
Route::get('/generate-report', [ReportController::class, 'generateReport'])->name('generate.bookings.report');


// site Settings
Route::get('admin/site-settings', [SiteSettingController::class, 'edit'])->middleware(['auth', 'verified','role:admin'])->name('admin.settings.edit');
Route::patch('admin/site-settings', [SiteSettingController::class, 'update'])->middleware(['auth', 'verified','role:admin'])->name('admin.settings.update');

require __DIR__.'/auth.php';

Route::group(['prefix' => 'customer', 'as' => 'customer.', 'middleware'=>'role:customer'], function(){
    Route::resource('my-profile', CustomerProfileController::class);
    // Route::resource('search-professional', CustomerHomeController::class);
    Route::get('search-professionals', SearchProfessionals::class)->name('search-professionals.index');
    // Route::resource('professional-details', ProfessionalDetailsController::class);
    Route::get('/professional-details/{professional}', ProfessionalDetails::class)->name('professional-details.index');

    Route::get('/checkout', Checkout::class)->name('checkout');
    Route::get('/my-bookings', MyBookings::class)->name('my-bookings');
    Route::get('/services/{category}', [CustomerServiceController::class, 'index'])->name('services');

    

});




Route::group(['prefix' => 'professional', 'as' => 'professional.', 'middleware'=>'role:professional'], function(){
    Route::resource('/', HomeController::class);
    Route::resource('my-profile', ProfessionalProfileController::class);
    Route::resource('my-orders', ProfessionalOrderController::class);
    // Route::resource('my-services', ProfessionalServiceController::class);
    Route::resource('my-bookings', BookingController::class);
    Route::resource('gallery', GalleryController::class); 
    Route::get('my-messages', [Message::class, 'index'])->name('my-messages');
    
    //routes for my-services
    Route::get('/my-services', Index::class)->name('my-services.index');
    Route::get('my-services/create', CreateServices::class)->name('my-services.create');
    Route::get('my-services/edit/{proService}', EditServices::class)->name('my-services.edit');
});



// stripe
Route::get('/success', [Checkout::class, 'success'])->name('success')->middleware('role:customer');


// khalti
Route::post('/khalti/verification', [Checkout::class,'bookingConfirm'])->name('khalti.payment');
Route::get('/khalti/callback/{order_id}', [KhaltiControllerCheck::class,'KhaltiCallback'])->name('khalti.callback');


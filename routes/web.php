<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\App;

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

Route::get('/',[HomeController::class,'redirect']);
Route::post('/AddImg',[AdminController::class,'AddImgHomePage']);
Route::post('/AddVideo',[AdminController::class,'AddVideo']);
Route::get('/ViewAdmin', [AdminController::class, 'ViewAdmin'])->middleware('admin');
Route::get('/product',[AdminController::class,'product']);
Route::get('/ShowVideoAdmin',[AdminController::class,'ShowVideoAdmin']);
Route::get('/videos', [HomeController::class, 'showVideos'])->name('showVideos');
Route::get('/home', [HomeController::class, 'home'])->name('user.home');
Route::get('/cherche', [HomeController::class, 'cherchevideos'])->name('user.videos');
Route::get('/links', [HomeController::class, 'links'])->name('links');
Route::get('/video/{id}', [HomeController::class, 'showvideo'])->name('video.show');
Route::get('/products', [HomeController::class, 'showProducts'])->name('showProducts');
Route::post('/AddProductsHomePage',[AdminController::class,'AddProductsHomePage']);
Route::get('/ShowAddProductsAdmin',[AdminController::class,'ShowAddProductsAdmin'])->name('updateimagehomepage');
Route::get('/updateimagehomepage/{id}',[AdminController::class,'updateimagehomepage']);
Route::post('/updateviewimagehome/{id}',[AdminController::class,'updateviewimagehome']);
Route::get('/deleteproduct/{id}',[AdminController::class,'deleteproduct']);
Route::get('/showAllImages',[AdminController::class,'showAllImages']);

Route::get('/showAllVideo',[AdminController::class,'showAllVideo']);
Route::get('/updatevideohomepage/{id}',[AdminController::class,'updatevideohomepage']);
Route::Post('/updateviewvideohome/{id}',[AdminController::class,'updateviewvideohome']);

Route::get('/showAllProductes',[AdminController::class,'showAllProductes']);
Route::get('/deleteproductforsell/{id}',[AdminController::class,'deleteproductforsell']);
Route::post('/updateviewvideoproducts/{id}',[AdminController::class,'updateviewvideoproducts']);
Route::get('/updateproductshomepage/{id}',[AdminController::class,'updateproductshomepage']);

Route::get('/deletevideo/{id}',[AdminController::class,'deletevideos']);



Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);

Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);

Route::post('logout', [AuthController::class, 'logout'])->name('logout');
/*Route::post('/change-language', function (Illuminate\Http\Request $request) {
    $locale = $request->input('locale');
    if (in_array($locale, ['en', 'ar'])) { // Validate the locale
        session(['locale' => $locale]);
        App::setLocale($locale);

        // Dynamically load all translations for the selected locale
        $translations = collect(File::allFiles(resource_path("lang/$locale")))
            ->flatMap(function ($file) {
                $key = basename($file->getRealPath(), '.php'); // Get the filename
                return [$key => trans($key)];
            });

        return response()->json([
            'success' => true,
            'translations' => $translations
        ]);
    }
    return response()->json(['success' => false], 400);
})->name('change-language');*/
use Illuminate\Support\Facades\Log;

Route::post('/change-language', function (Illuminate\Http\Request $request) {
    $locale = $request->input('locale');

    if (in_array($locale, ['en', 'ar'])) {
        session(['locale' => $locale]); // Save locale in session
        Log::info('Locale set in session: ' . session('locale')); // Debug log
        return response()->json(['success' => true]);
    }

    Log::info('Invalid locale requested: ' . $locale); // Debug invalid locale
    return response()->json(['success' => false], 400);
})->name('change-language');











<?php

use App\bread_images;
use App\Http\Controllers\AddImageController;
use App\Http\Controllers\AddpedigreeController;
use App\Http\Controllers\AddVideoController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\BlogCatController;
use App\Http\Controllers\BreadImagesController;
use App\Http\Controllers\image;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pagecontroller;
use App\Http\Controllers\PdEnteryController;
use App\Http\Controllers\Webpanelcontroller;
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

//Route::get('/', [Pagecontroller::class,'home']);
Route::get('/', [BreadImagesController::class,'show']);
Route::get('/login', [LoginController::class,'index']);
Route::get('/signup', [LoginController::class,'register']);
Route::get('/userdetail', [LoginController::class,'userdetail']);
Route::get('/manage-pedigree', [PdEnteryController::class,'manage_pedigree']);
Route::get('/manage-images', [AddImageController::class,'manage_images']);
Route::get('/edit-image/{indexer}', [AddImageController::class,'edit_image']);
Route::get('/edit-video/{indexer}', [AddVideoController::class,'edit_video']);
Route::post('/store_images/{indexer}', [AddImageController::class,'update']);
Route::post('/store-video/{id}', [AddVideoController::class,'update']);
Route::get('/manage-blogs', [LoginController::class,'manage_blogs']);
Route::get('/manage-videos', [AddVideoController::class,'manage_videos']);
Route::get('/uploadimg', [AlbumController::class,'uploadimg']);
Route::get('/addvideo', [LoginController::class,'addvideo']);
Route::get('/addpedigree', [PdEnteryController::class,'addpedigree']);
Route::post('/create_album', [AlbumController::class,'create'])->name('create_album');
Route::post('/add_images', [AddImageController::class,'add_images'])->name('add_images');
Route::post('/add_video', [AddVideoController::class,'add_video'])->name('add_video');
Route::post('/create_pedigree', [PdEnteryController::class,'create_pedigree'])->name('create_pedigree');
Route::Post('login/auth', [LoginController::class,'auth'])->name('login.auth');
Route::Post('signup/create', [LoginController::class,'create'])->name('signup.create');
Route::get('/about', [Pagecontroller::class,'about']);
Route::get('/advertise', [Pagecontroller::class,'advertise']);
Route::get('/blog', [BlogCatController::class,'show']);
Route::get('/contact', [Pagecontroller::class,'contact']);
Route::get('/faq', [Pagecontroller::class,'faq']);
Route::get('/privacy-policy', [Pagecontroller::class,'privacy_policy']);
Route::get('/site-news', [Pagecontroller::class,'site_news']);
Route::get('/terms-of-use', [Pagecontroller::class,'terms_of_use']);
Route::get('/copyright-info', [Pagecontroller::class,'copyright_info']);
Route::get('logout',function(){
    session()->forget('LOGIN_SUC',true);
    session()->forget('name');
    //session()->flash('msg','Logined successfully');
    return redirect('');
});
Route::get('/gallery', [Pagecontroller::class,'gallery']);
Route::get('/galdetail/{id}/{imgid?}',[Pagecontroller::class,'galdetail']);
Route::get('/pedigree', [Pagecontroller::class,'pedigree']);
Route::get('/breeders', [Pagecontroller::class,'breeders']);
Route::get('/people', [Pagecontroller::class,'people']);
Route::get('/video-gallery', [Pagecontroller::class,'video_gallery']);
Route::get('/video-subgallery/{id}', [Pagecontroller::class,'video_subgallery']);
Route::get('/videopage/{channel_id}/{sub_channel_id}', [Pagecontroller::class,'videopage']);
Route::get('/memberdetail/{id}', [Pagecontroller::class, 'memberdetail']);
Route::get('/membervideo/{id}', [Pagecontroller::class, 'membervideo']);
Route::get('/pdgdetail/{pdgid}/{pdgcat}', [Pagecontroller::class, 'pdgdetail']);

Route::get('/webadmin', [Webpanelcontroller::class, 'show']);
Route::Post('webadmin/auth', [Webpanelcontroller::class,'auth'])->name('webadmin.auth');
Route::get('/webadmin/home', [Webpanelcontroller::class, 'home']);
Route::get('/webadmin/manage-logo', [Webpanelcontroller::class, 'logo']);
Route::get('/webadmin/update-logo/{id}', [Webpanelcontroller::class, 'update_logo']);
Route::get('/webadmin/manage-social-profiles', [Webpanelcontroller::class, 'social_profiles']);
Route::get('/webadmin/manage-subscriber', [Webpanelcontroller::class, 'manage_subscriber']);
Route::get('/webadmin/change-password', [Webpanelcontroller::class, 'change_password']);
Route::get('/webadmin/manage-pages', [Webpanelcontroller::class, 'manage_pages']);

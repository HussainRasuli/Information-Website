<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\SocialShareController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\GalaryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CoverImageController;
use App\Http\Controllers\SloganController;
use App\Http\Controllers\UsersController;


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
//     return view('welcome');
// });

Route::get('/',[WebsiteController::class,'showOnWebsite'])->name('/');

Route::get('social_share',[SocialShareController::class.'index'])->name('social_share');

//---------------- Website Routes -------------------//
Route::get('/about_page',[AboutController::class,'showOnWebsite'])->name('about_page');

//---------------- Website Activity Routes ----------//
Route::get('/our_activity',[ActivityController::class,'showOnWebsite'])->name('our_activity');
Route::get('/activity_details/{activity_id?}',[ActivityController::class,'activity_details'])->name('activity_details');
Route::get('/see_other_video/{act_detial_id?}',[ActivityController::class,'see_other_video'])->name('see_other_video');
Route::post('/search_video',[ActivityController::class,'search_video'])->name('search_video');

//--------------- Website Teachers Routes -----------//
Route::get('/our_teachers',[TeacherController::class,'showOnWebsite'])->name('our_teachers');
Route::get('/teachers/{teacher_id?}',[TeacherController::class,'teachers'])->name('teachers');
Route::get('/see_other_teacher/{teacher_id?}',[TeacherController::class,'see_other_teacher'])->name('see_other_teacher');

//--------------- Website Contact Routes ------------//
Route::get('/contact_us', [ContactController::class,'showOnWebsite'])->name('contact_us');

Route::post('/sendEmail',[ContactController::class,'sendEmail'])->name('sendEmail');






Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('/admin_panel/layout.master_page');
})->name('dashboard');

//================ Slider Route ================//
Route::get('/view_slider',[SliderController::class,'index'])->name('view_slider');
Route::get('/slider_form',[SliderController::class,'slider_form'])->name('slider_form');
Route::post('/add_slider',[SliderController::class,'add_slider'])->name('add_slider');
Route::post('/delete_slider_image',[SliderController::class,'delete_slider_image'])->name('delete_slider_image');
Route::get('/edit_image/{slider_img_id?}',[SliderController::class,'edit_image'])->name('edit_image');
Route::post('/update_slider_image',[SliderController::class,'update_slider_image'])->name('update_slider_image');


//-------------- About Route ---------------------//
Route::get('/about', [AboutController::class,'index'])->name('about');
Route::get('/about_form', [AboutController::class,'about_form'])->name('about_form');
Route::post('/add_about', [AboutController::class,'add_about'])->name('add_about');
Route::get('/edit_info/{info_id?}',[AboutController::class,'edit_info'])->name('edit_info');
Route::post('/update_info', [AboutController::class,'update_info'])->name('update_info');
Route::post('/delete_info', [AboutController::class,'delete_info'])->name('delete_info');
Route::get('/edit_item/{info_item_id?}',[AboutController::class,'edit_item'])->name('edit_item');
Route::post('/update_item', [AboutController::class,'update_item'])->name('update_item');
Route::post('/delete_item', [AboutController::class,'delete_item'])->name('delete_item');
Route::get('/item_form',[AboutController::class,'item_form'])->name('item_form');
Route::post('/add_item', [AboutController::class,'add_item'])->name('add_item');

//--------------- More Information Routes ------------//
Route::get('/more_info', [AboutController::class,'more_info'])->name('more_info');
Route::get('/more_info_form', [AboutController::class,'more_info_form'])->name('more_info_form');
Route::post('/add_more_info', [AboutController::class,'add_more_info'])->name('add_more_info');
Route::get('/edit_more_info/{about_id?}',[AboutController::class,'edit_more_info'])->name('edit_more_info');
Route::post('/update_more_info', [AboutController::class,'update_more_info'])->name('update_more_info');
Route::post('/delete_more_info', [AboutController::class,'delete_more_info'])->name('delete_more_info');

//--------------- Donation Description Route ---------------------//
Route::get('/donation', [DonationController::class,'index'])->name('donation');
Route::get('/donation_form', [DonationController::class,'donation_form'])->name('donation_form');
Route::post('/add_donation_des', [DonationController::class,'add_donation_des'])->name('add_donation_des');
Route::get('/edit_donation_des/{donation_des_id?}', [DonationController::class,'edit_donation_des'])->name('edit_donation_des');
Route::post('/update_donation_des', [DonationController::class,'update_donation_des'])->name('update_donation_des');
Route::post('/delete_donation_des', [DonationController::class,'delete_donation_des'])->name('delete_donation_des');

//--------------- Contact Route ----------------------------------//
Route::get('/contact', [ContactController::class,'index'])->name('contact');
Route::get('/view_email_modal', [ContactController::class,'view_email_modal'])->name('view_email_modal');
Route::post('/add_email', [ContactController::class,'add_email'])->name('add_email');
Route::get('/view_phone_modal', [ContactController::class,'view_phone_modal'])->name('view_phone_modal');
Route::post('/add_phone', [ContactController::class,'add_phone'])->name('add_phone');
Route::get('/view_address_modal', [ContactController::class,'view_address_modal'])->name('view_address_modal');
Route::post('/add_address', [ContactController::class,'add_address'])->name('add_address');
Route::post('/delete_all', [ContactController::class,'delete_all'])->name('delete_all');

Route::get('/edit_email_modal/{email_id?}', [ContactController::class ,'edit_email_modal'])->name('edit_email_modal');
Route::post('/update_edit_email', [ContactController::class ,'update_edit_email'])->name('update_edit_email');
Route::post('/delete_edit_email', [ContactController::class ,'delete_edit_email'])->name('delete_edit_email');

Route::get('/edit_phone_modal/{phone_id?}', [ContactController::class ,'edit_phone_modal'])->name('edit_phone_modal');
Route::post('/update_edit_phone', [ContactController::class ,'update_edit_phone'])->name('update_edit_phone');
Route::post('/delete_edit_phone', [ContactController::class ,'delete_edit_phone'])->name('delete_edit_phone');

Route::get('/edit_address_modal/{address_id?}', [ContactController::class ,'edit_address_modal'])->name('edit_address_modal');
Route::post('/update_edit_address', [ContactController::class ,'update_edit_address'])->name('update_edit_address');
Route::post('/delete_edit_address', [ContactController::class ,'delete_edit_address'])->name('delete_edit_address');


//----------------- Contact Form ----------------------------------//
Route::get('/contact_form', [ContactFormController::class,'index'])->name('contact_form');
Route::get('/view_contact_form', [ContactFormController::class,'view_contact_form'])->name('view_contact_form');
Route::post('/add_contact_form', [ContactFormController::class,'add_contact_form'])->name('add_contact_form');
Route::get('/edit_contact_form/{text_id?}', [ContactFormController::class,'edit_contact_form'])->name('edit_contact_form');
Route::post('/update_contact_form', [ContactFormController::class,'update_contact_form'])->name('update_contact_form');
Route::post('/delete_contact_form', [ContactFormController::class,'delete_contact_form'])->name('delete_contact_form');


//---------------- Activity Routes ----------------------// 
Route::get('/activity', [ActivityController::class,'index'])->name('activity');
Route::get('/activity_form', [ActivityController::class,'activity_form'])->name('activity_form');
Route::get('/add_dropify', [ActivityController::class,'add_dropify'])->name('add_dropify');
Route::get('/add_link', [ActivityController::class,'add_link'])->name('add_link');
Route::post('/store_activity', [ActivityController::class,'store_activity'])->name('store_activity');
Route::get('/activity_cover/{activity_id?}', [ActivityController::class,'activity_cover'])->name('activity_cover');
Route::get('/edit_activity/{act_detial_id?}', [ActivityController::class,'edit_activity'])->name('edit_activity');
Route::post('/update_video', [ActivityController::class,'update_video'])->name('update_video');
Route::post('/edit_link', [ActivityController::class,'edit_link'])->name('edit_link');
Route::get('/edit_activity_cover/{activity_id?}', [ActivityController::class,'edit_activity_cover'])->name('edit_activity_cover');
Route::post('/update_cover', [ActivityController::class,'update_cover'])->name('update_cover');
Route::post('/delete_activity', [ActivityController::class,'delete_activity'])->name('delete_activity');

//---------------- Teachers Routes ----------------------//
Route::get('/teacher', [TeacherController::class,'index'])->name('teacher');
Route::get('/teacher_form', [TeacherController::class,'teacher_form'])->name('teacher_form');
Route::post('/add_teacher', [TeacherController::class,'add_teacher'])->name('add_teacher');
Route::get('/edit_teacher/{teacher_id?}', [TeacherController::class,'edit_teacher'])->name('edit_teacher');
Route::post('/update_teacher', [TeacherController::class,'update_teacher'])->name('update_teacher');
Route::get('/view_teacher/{teacher_id?}', [TeacherController::class,'view_teacher'])->name('view_teacher');
Route::post('/delete_teacher', [TeacherController::class,'delete_teacher'])->name('delete_teacher');

//---------------- Galary Routes -----------------------//
Route::get('/galary', [GalaryController::class,'index'])->name('galary');
Route::get('/galary_form', [GalaryController::class,'galary_form'])->name('galary_form');
Route::post('/add_galary', [GalaryController::class,'add_galary'])->name('add_galary');
Route::get('/edit_galary/{galary_id?}', [GalaryController::class,'edit_galary'])->name('edit_galary');
Route::post('/update_galary', [GalaryController::class,'update_galary'])->name('update_galary');
Route::post('/delete_galary', [GalaryController::class,'delete_galary'])->name('delete_galary');

//----------------- Profile Routes ----------------------------//
Route::get('/personal_profile', [ProfileController::class,'index'])->name('personal_profile');
Route::get('/profile_form/{id?}', [ProfileController::class,'profile_form'])->name('profile_form');
Route::post('/update_personal_profile', [ProfileController::class,'update_profile'])->name('update_personal_profile');

//----------------- Cover Image Routes ------------------------//
Route::get('/cover_image', [CoverImageController::class,'index'])->name('cover_image');
Route::get('/cover_image_form', [CoverImageController::class,'cover_image_form'])->name('cover_image_form');
Route::post('/add_cover_image', [CoverImageController::class,'add_cover_image'])->name('add_cover_image');
Route::get('/edit_cover_image/{cover_id?}', [CoverImageController::class,'edit_cover_image'])->name('edit_cover_image');
Route::post('/update_cover_image', [CoverImageController::class,'update_cover_image'])->name('update_cover_image');
Route::post('/delete_cover_image', [CoverImageController::class,'delete_cover_image'])->name('delete_cover_image');

//----------------- Slogan Routes -----------------------------//
Route::get('/slogan', [SloganController::class,'index'])->name('slogan');
Route::get('/slogan_form', [SloganController::class,'slogan_form'])->name('slogan_form');
Route::post('/add_slogan', [SloganController::class,'add_slogan'])->name('add_slogan');
Route::get('/edit_slogan/{slogan_id?}', [SloganController::class,'edit_slogan'])->name('edit_slogan');
Route::post('/update_slogan', [SloganController::class,'update_slogan'])->name('update_slogan');
Route::post('/delete_slogan', [SloganController::class,'delete_slogan'])->name('delete_slogan');



Route::middleware(['admin'])->group(function () {
    //----------------- Users Routes ------------------------//
    Route::get('/users', [UsersController::class,'index'])->name('users');
    Route::get('/account_form', [UsersController::class,'account_form'])->name('account_form');
    Route::post('/make_account', [UsersController::class,'make_account'])->name('make_account');
    Route::get('/edit_account/{id?}', [UsersController::class,'edit_account'])->name('edit_account');
    Route::post('/update_user', [UsersController::class,'update_user'])->name('update_user');
    Route::post('/delete_account', [UsersController::class,'delete_account'])->name('delete_account');
    
});





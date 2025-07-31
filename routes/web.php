<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\IntegrationController;
use App\Http\Controllers\SelectTemplateController;
use App\Http\Controllers\QuestionListController;
use App\Http\Controllers\TemplateFormController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ShareFormController;
use App\Http\Controllers\ContactController;

use App\Mail\OrderShipped;
use App\Mail\orders;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('layout/login');
// });

Route::get('/', [AdminController::class, 'index'])->name('login');
Route::get('login', [AdminController::class, 'registration'])->name('register');

Route::post('login', [AdminController::class, 'login'])->name('login-post');

Route::middleware('auth')->group(function () {
    Route::get('view', [AdminController::class, 'view'])->name('view');
    Route::post('custom-registration', [AdminController::class, 'customRegistration'])->name('register.custom'); 
    Route::get('signout', [AdminController::class, 'signOut'])->name('signout');

    //surve
    Route::get('My_Survey', [SurveyController::class, 'index'])->name('my_survey');
    
    // Route::get('Shared', [ShareFormController::class, 'share'])->name('shared');
    Route::get('Draft', [TemplateFormController::class, 'draft'])->name('draft');

    Route::get('share', [ShareFormController::class, 'share'])->name('share');
    
    
    

   

    //templated-email
    Route::get('create-new', [TemplateController::class, 'temp_new'])->name('email_create_new');
    Route::get('temp_email_show_all', [TemplateController::class, 'temp_all'])->name('temp-email-show-all');
    Route::get('temp_email-draft', [TemplateController::class, 'temp_draft'])->name('temp-email-draft');

    //templated-sms
    Route::get('create_new', [TemplateController::class, 'temp_sms_new'])->name('sms_create_new');
    Route::get('show-all', [TemplateController::class, 'temp_sms_all'])->name('sms_show_all');
    Route::get('email-draft', [TemplateController::class, 'temp_sms_draft'])->name('sms_draft');

    Route::get('form_one', [TemplateController::class, 'FormOne'])->name('form_one');
    Route::get('form_two', [TemplateController::class, 'FormTwo'])->name('form_two');
    Route::get('form_five', [TemplateController::class, 'FormFive'])->name('form_five');
    Route::get('form_three', [TemplateController::class, 'FormThree'])->name('form_three');
    Route::get('form_four', [TemplateController::class, 'FormFour'])->name('form_four');
    Route::get('form_six', [TemplateController::class, 'FormSix'])->name('form_six');

    //create question list
    Route::get('quest-list', [TemplateController::class, 'create_ques_list'])->name('quest_list');

    //Integration
    Route::get('inter_email', [IntegrationController::class, 'index'])->name('integration-email');
    Route::get('google_sheet', [IntegrationController::class, 'google_sheet'])->name('google-sheet');
    Route::get('inter_sms', [IntegrationController::class, 'sms'])->name('inter-sms');



    Route::get('/email', function () {
            // return new OrderShipped();
            return new orders();
        });
        Route::get('/email-send', function () {
            Mail::to('webdevelopersbc@gmail.com')->send(new OrderShipped());
    
            return "Email send...";
        });

    Route::get('show_temp', [SelectTemplateController::class, 'index'])->name('show-temp');

    Route::get('/getQuestion', [QuestionListController::class, 'getQuestion'])->name('getQuestion');

    //save form Template
    Route::get('feedback-form', [TemplateFormController::class, 'index']);
    Route::post('/form/save', [TemplateFormController::class, 'save'])->name('form.save');
    Route::post('/form/update/{id}', [TemplateFormController::class, 'update'])->name('form.update');
    Route::get('/draft_form/{id}', [TemplateFormController::class, 'draft_form'])->name('draft_form');

    Route::delete('/delete_form/{id}', [TemplateFormController::class, 'deleteForm'])->name('delete_form');

    //Department
    Route::resource('Department', DepartmentController::class); 

    //email
    

    Route::get('create-new/{form_id}', [FeedbackController::class, 'showForm'])->name('feedback_form');
    
    //contact
    Route::resource('contact', ContactController::class);
    Route::get('importpage', [ContactController::class,'importpage'])->name('importpage');
    Route::post('importfile', [ContactController::class,'importfile'])->name('importfile');


    
    

});
Route::get('/viewform/{id}', [ShareFormController::class, 'ViewForm'])->name('view_form');
Route::get('/share_form/{id}', [ShareFormController::class, 'share_form'])->name('share_form');
Route::post('/store-response', [ShareFormController::class, 'storeResponse'])->name('store_response');
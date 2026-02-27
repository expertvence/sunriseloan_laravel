<?php

use App\Http\Controllers\AdmiProfileController;
use App\Http\Controllers\Employee\EmployeeController;
use App\Http\Controllers\Employee\LoanCommitController as EmployeeLoanCommitController;
use App\Http\Controllers\EmployeeSalaryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoancategoryController;
use App\Http\Controllers\LoanCommitController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\LoanRequestController;
use App\Http\Controllers\Manager\ManagerController;
use App\Http\Controllers\ManagerAddController;
use App\Http\Controllers\MemberRegistrationController;
use App\Http\Controllers\TotalAssetController;
use App\Http\Controllers\UserLoanController;
use Illuminate\Support\Facades\Auth;
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


Auth::routes();
// Route::get('/', function () {
//     // return view('welcome');
//     return Template::loadView('welcome');
// })->name('home_2');

//Interview test



/* loan request form */
// Route::get('/', 'HomeController@landingPage')->name('home_2');
Route::get('/', [HomeController::class, 'landingPage'])->name('home_2');
/* loan Section start */
// Route::get('/loan-request', 'LoanRequestController@loanRequest')->name('loan-request');
Route::get('/loan-request', [LoanController::class, 'loanRequest'])->name('loan-request');
Route::post('/submit-request', [LoanController::class,'loan_store'])->name('submit-request');

Route::POST('/loan/insert',[LoanController::class,'loan_store'])->name('loan');

Route::get('/show-list',[LoanController::class, 'showLoan_list'])->name('showLoan');
Route::get('/show-edit/{loan_ide?}',[LoanController::class, 'loanEdit'])->name('edit-loan');
Route::post('/update-status', [LoanController::class, 'updateStatus'])->name('update-status');


/* Loan section end */

// Route for searching users based on username
// Route::get('/search-user', 'LoanCommitController@searchUser');
Route::get('/search-user', [LoanCommitController::class,'searchUser']);

//Userloan Interface
Route::get('/user-loan-list', [UserloanController::class,'index' ])->name('user-loan-list');
//Route::get('/show',[UserloanController::class,'showProfile']);
Route::get('/getLoanCommitments', [UserloanController::class, 'getLoanCommitments'])->name('getLoanCommitments');



// Route for fetching loan details based on user id
Route::get('/get-loans-for-user/{userId}', [LoanCommitController::class, 'getLoansForUser'])->name('get-loans-for-user');
Route::get('/get-loan-details/{loanIde}', [LoanCommitController::class, 'getLoanDetails']);
Route::get('/get-total-paid/{loanIde}', [LoanCommitController::class, 'getTotalPaid']);
//Loan commit section
// Route::get('/loan-commite','LoanCommitController@index')->name('loan-commite');
Route::get('/loan-commite', [LoanCommitController::class, 'index'])->name('loan-commite');
Route::post('/loan-commit-submit', [LoanCommitController::class, 'insertLoanCommit'])->name('loan-commit-submit');
Route::get('/employee-loan-commite', [EmployeeLoanCommitController::class, 'index']);
// Route::get('/employee-get-loans-for-user/{userId}', [EmployeeLoanCommitController::class, 'getLoansForUser']);
Route::get('/employee-get-loan-details/{loanIde}', [EmployeeLoanCommitController::class, 'getLoanDetails']);
Route::get('/employee-get-total-paid/{loanIde}', [EmployeeLoanCommitController::class, 'getTotalPaid']);
Route::post('/employee-loan-commit', [EmployeeLoanCommitController::class, 'insertLoanCommit']);
Route::get('/employee-loan-commite',[EmployeeLoanCommitController::class, 'index'])->name('employee-loan-commite');
//insert LoanCommit
Route::post('/loanCommit', [LoanCommitController::class, 'createLoanCommit'])->name('loanCommit');
// Route::get('/employee-get-loans-for-user/{userId}', [EmployeeLoanCommitController::class, 'getLoansForUser']);
Route::middleware(['auth', 'user.type:admin'])->group(function () {




// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
// Route::get('/test', 'HomeController@test')->name('test');
Route::get('/test', [HomeController::class, 'test'])->name('test');
// Route::get('/admin-panel', 'HomeController@adminPanel')->name('admin-panel');
// Route::get('/member-register', 'HomeController@memRegistration')->name('member-register');
Route::get('/member-register',[HomeController::class, 'memRegistration'])->name('member-register');
Route::get('/show/{id}',[MemberRegistrationController::class, 'show'])->name('show');

Route::get('/member-register-form/{id?}', [HomeController::class, 'memRegistrationForm'])->name('member-register-form');
//payment system
// Route::get('/installment_payment', 'HomeController@installmentPayment')->name('installment_payment');
Route::get('/installment_payment', [HomeController::class, 'installmentPayment'])->name('installment_payment');
// Route::get('/installment_payment_list', 'HomeController@paymentLIst')->name('installment_payment_list');
Route::get('/installment_payment_list', [HomeController::class, 'paymentLIst'])->name('installment_payment_list');
Route::post('/installment_payment_store', [HomeController::class, 'paymentStore'])->name('installment_payment_store');

Route::get('/installment_payment_pdf', [HomeController::class, 'paymentPdf'])->name('installment_payment_pdf');

//investment system
Route::get('/investment_system', [HomeController::class, 'investment_system'])->name('investment_system');
Route::post('/investment_store', [HomeController::class, 'investment_store'])->name('investment_store');
Route::get('/investment-edit/{id?}', [HomeController::class, 'investment_edit'])->name('investment-edit');
Route::get('/investment_system_list', [HomeController::class, 'investment_system_list'])->name('investment_system_list');

// income-expence 
// Route::get('/income-expence', 'HomeController@incomeExpence')->name('income-expence');
Route::get('/income-expence', [HomeController::class, 'incomeExpence'])->name('income-expence');
Route::get('/income-expence-edit/{id?}', [HomeController::class, 'incomeExpenceEdit'])->name('income-expence-edit');
Route::post('/income-expence-store', [HomeController::class, 'incomeExpence_store'])->name('income-expence-store');
Route::get('/income-expence-list', [HomeController::class, 'incomeExpenceList'])->name('income-expence-list');


// Route::post('/merber-save', 'MemberRegistrationController@store')->name('merber-save');
Route::post('/merber-save', [MemberRegistrationController::class, 'store'])->name('merber-save');
// Route::get('/member-list', 'HomeController@memberList')->name('member-list');
Route::get('/member-list', [HomeController::class, 'memberList'])->name('member-list');
// Route::get('/member-register-form/{id?}', 'HomeController@memRegistrationForm')->name('member-register-form');
Route::get('/member-register-form/{id?}', [HomeController::class, 'memRegistrationForm'])->name('member-register-form');
Route::get('/realtime-comunication', [ComunicationController::class, 'realComunication'])->name('realtime-comunication');


// Route::get('/', 'ChatsController@index');
Route::get('messages', 'ChatsController@fetchMessages');
Route::post('messages', 'ChatsController@sendMessage');

/* Create Categories */
Route::get('/show-categories-insert',[LoanCategoryController::class,'index']);
Route::post('/insert-category', [LoancategoryController::class, 'categori_store']);
Route::get('/show_categories', [LoancategoryController::class, 'show_categories'])->name('show-categories-insert');
Route::post('/delete/{id}',[LoancategoryController::class, 'delete'])->name('delete');
Route::get('/edit-category/{id}', [LoancategoryController::class, 'categoriId'])->name('edit-category');
Route::get('/loancategories',[LoancategoryController::class, 'categoriId']);
//Route::get('/for-get',[LoancategoryController::class, 'categoriwithid'])->name('for-get');
//assets route
Route::get('/index',[TotalAssetController::class,'index'])->name('index');

Route::post('/store-assets',[TotalAssetController::class,'store'])->name('store-assets');
Route::get('/show-assets',[TotalAssetController::class,'show_list'])->name('show-assets');
Route::get('/edit-assets/{id}',[TotalAssetController::class,'edit_assets'])->name('edit-assets');
Route::post('/destroy-assets/{id}',[TotalAssetController::class,'destroyAsset'])->name('destroy-assets');
// Route::get('/admin-panel', 'HomeController@adminPanel')->name('admin-panel');
Route::get('/admin-panel', [HomeController::class, 'adminPanel'])->name('admin-panel');
 //Employee Salary
 Route::get('/employee-salary',[EmployeeSalaryController::class, 'index'])->name('employee-salary');

});

Route::post('member-autocomplete-search', [HomeController::class, 'memberAutocompleteSearch'])->name('member-autocomplete-search');
// Route::get('/member_profile/{id}', 'HomeController@memberProfile')->name('member_profile');
Route::get('/member_profile/{id}', [HomeController::class, 'memberProfile'])->name('member_profile');
//Route::get('/admin-panel', 'HomeController@adminPanel')->name('admin-panel');

Route::get('/userDashboard',[UserLoanController::class,'userDashboard'])->name('userDashboard');
Route::get('/for-get',[LoancategoryController::class, 'categoriwithid'])->name('for-get');
/* Route::middleware(['auth', 'user.type:user'])->group(function () {   
   
  
}); */

Route::get('/admin-profile', [AdmiProfileController::class, 'index'])->name('admin-profile');
Route::post('/reset-password', [AdmiProfileController::class, 'resetPassword'])->name('reset-password');


Route::get('/employee-member-register', [EmployeeController::class, 'memRegistration'])->name('employee-member-register');
Route::post('/employee-member-save', [EmployeeController::class, 'store'])->name('employee-member-save');
Route::get('/employee-member-list', [EmployeeController::class, 'show'])->name('employee-member-list');
Route::get('/show-employee/{id}', [EmployeeController::class, 'show'])->name('show-employee');
Route::get('/employee-mem-register-form/{id?}', [EmployeeController::class, 'memRegistrationForm'])->name('employee-mem-register-form');

Route::post('/member-status-update', 
    [MemberRegistrationController::class, 'updateStatus']
)->name('member-status-update');



// manager section

Route::get('/managerDashboard',[ManagerController::class,'managerDashboard'])->name('managerDashboard');
Route::post('/submit-request', [LoanRequestController::class, 'store'])->name('submit-request');
Route::get('/loan-request-list', [LoanRequestController::class, 'loanRequestList'])->name('loan-request-list');

Route::get('/manager-create-form/{id?}', [ManagerAddController::class, 'managerCreate'])->name('manager-create-form');
Route::post('/manager-create', [ManagerAddController::class, 'store'])->name('manager-create');
Route::get('/manager-list', [ManagerAddController::class, 'managerList'])->name('manager-list');
<?php

use App\Http\Controllers\AttendenceController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\PosController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//employee route
Route::get('/add-employee',[EmployeeController::class,'addEmployee'])->name('add.employee');

Route::post('/insert-employee',[EmployeeController::class,'insert_employee']);

Route::get('/all-employee',[EmployeeController::class,'allEmployee'])->name('all.employee');

Route::get('/view-employee/{id}',[EmployeeController::class,'viewEmployee']);

Route::get('/delete-employee/{id}',[EmployeeController::class,'deleteEmployee']);

Route::get('/edit-employee/{id}',[EmployeeController::class,'editEmployee']);

Route::put('/update-employee/{id}',[EmployeeController::class,'updateEmployee']);

//customer route
Route::get('/add-customer',[CustomerController::class,'addCustomer'])->name('add.customer');

Route::post('/insert-customer',[CustomerController::class,'insert_customer']);

Route::get('/all-customer',[CustomerController::class,'allCustomer'])->name('all.customer');

Route::get('/delete-customer/{id}',[CustomerController::class,'deleteCustomer']);

Route::get('/view-customer/{id}',[CustomerController::class,'viewCustomer']);

Route::get('/edit-customer/{id}',[CustomerController::class,'editCustomer']);

Route::put('/update-customer/{id}',[CustomerController::class,'updateCustomer']);

//supplier route
Route::get('/add-supplier',[SupplierController::class,'addSupplier'])->name('add.supplier');

Route::post('/insert-supplier',[SupplierController::class,'insert_supplier']);

Route::get('/all-supplier',[SupplierController::class,'allSupplier'])->name('all.supplier');

Route::get('/delete-supplier/{id}',[SupplierController::class,'deleteSupplier']);

Route::get('/view-supplier/{id}',[SupplierController::class,'viewSupplier']);

Route::get('/edit-supplier/{id}',[SupplierController::class,'editSupplier']);

Route::put('/update-supplier/{id}',[SupplierController::class,'updateSupplier']);

//salary route
//advance salary
Route::get('/add-advance-salary',[SalaryController::class,'add_advance_Salary'])->name('add.advance.salary');

Route::post('/insert-advance-salary',[SalaryController::class,'insert_advanceSalary']);

Route::get('/all-advance-salary',[SalaryController::class,'allAvanceSalary'])->name('all.advance.salary');

Route::get('/delete-advanced-salary/{id}',[SalaryController::class,'deleteAdvanced']);

// salary pay

Route::get('/pay-salary',[SalaryController::class,'pay_Salary'])->name('pay.salary');

Route::post('/insert-pay-salary',[SalaryController::class,'insert_paySalary']);

Route::get('/all-pay-salary',[SalaryController::class,'allPaySalary'])->name('all.pay.salary');


//category route

Route::get('/add-category',[CategoryController::class,'addCategory'])->name('add.category');

Route::post('/insert-category',[CategoryController::class,'insert_category']);

Route::get('/all-category',[CategoryController::class,'allCategory'])->name('all.category');

Route::get('/delete-category/{id}',[CategoryController::class,'deleteCategory']);

Route::get('/edit-category/{id}',[CategoryController::class,'editCategory']);

Route::put('/update-category/{id}',[CategoryController::class,'updateCategory']);

//product route
Route::get('/add-product',[ProductController::class,'addProduct'])->name('add.product');

Route::post('/insert-product',[ProductController::class,'insert_Product']);

Route::get('/all-product',[ProductController::class,'allProduct'])->name('all.product');

Route::get('/view-product/{id}',[ProductController::class,'viewProduct']);

Route::get('/delete-product/{id}',[ProductController::class,'deleteProduct']);

Route::get('/edit-product/{id}',[ProductController::class,'editProduct']);

Route::put('/update-product/{id}',[ProductController::class,'updateProduct']);

//import and export products
Route::get('/import-product',[ProductController::class,'importProduct'])->name('import.product');
Route::get('/export-product',[ProductController::class,'export'])->name('export');
Route::post('/import-product',[ProductController::class,'import'])->name('import');

//expense route
Route::get('/add-expense',[ExpenseController::class,'addExpense'])->name('add.expense');

Route::post('/insert-expense',[ExpenseController::class,'insert_Expense']);

Route::get('/today-expense',[ExpenseController::class,'todayExpense'])->name('today.expense');

Route::get('/month-expense',[ExpenseController::class,'thisMonthExpense'])->name('month.expense');

Route::get('/year-expense',[ExpenseController::class,'yearlyExpense'])->name('year.expense');

Route::get('/edit-today-expense/{id}',[ExpenseController::class,'edittodayExpense']);

Route::put('/update-today-expense/{id}',[ExpenseController::class,'updatetodaysExpense']);

//monthly details expense

Route::get('/january-expense',[ExpenseController::class,'januaryExpense'])->name('january.expense');
Route::get('/february-expense',[ExpenseController::class,'februaryExpense'])->name('february.expense');
Route::get('/march-expense',[ExpenseController::class,'marchExpense'])->name('march.expense');
Route::get('/april-expense',[ExpenseController::class,'aprilExpense'])->name('april.expense');
Route::get('/may-expense',[ExpenseController::class,'mayExpense'])->name('may.expense');
Route::get('/june-expense',[ExpenseController::class,'juneExpense'])->name('june.expense');
Route::get('/july-expense',[ExpenseController::class,'julyExpense'])->name('july.expense');
Route::get('/auguest-expense',[ExpenseController::class,'auguestExpense'])->name('auguest.expense');
Route::get('/september-expense',[ExpenseController::class,'septemberExpense'])->name('september.expense');
Route::get('/october-expense',[ExpenseController::class,'octoberExpense'])->name('october.expense');
Route::get('/november-expense',[ExpenseController::class,'novemberExpense'])->name('november.expense');
Route::get('/december-expense',[ExpenseController::class,'decemberExpense'])->name('december.expense');

//attendence route
Route::get('/take-attendence',[AttendenceController::class,'takeAttendence'])->name('take.attendence');

Route::post('/insert-attendence',[AttendenceController::class,'insert_Attendence']);

Route::get('/all-attendence',[AttendenceController::class,'allAttendence'])->name('all.attendence');

Route::get('/view-attendence/{edit_date}',[AttendenceController::class,'viewAttendence']);

Route::get('/edit-attendence/{edit_date}',[AttendenceController::class,'editAttendence']);

Route::put('/update-attendence',[AttendenceController::class,'updateAttendence']);

//settings route
Route::get('/web-settings',[SettingController::class,'settings'])->name('settings');

Route::put('/update-website-setting/{id}',[SettingController::class,'updateSetings']);



//pos route
Route::get('/pos',[PosController::class,'Pos'])->name('pos');
//pending order
Route::get('/pending-order',[PosController::class,'pendingOrder'])->name('pending.order');

Route::get('/view-order-status/{id}',[PosController::class,'viewOrder']);

Route::get('/approve-pending/{id}',[PosController::class,'approvePending']);

Route::get('/success-order',[PosController::class,'successOrder'])->name('success.order');


//cart route
Route::post('/add-cart',[CartController::class,'AddCart']);

Route::put('/update-cart/{rowId}',[CartController::class,'cardUpdate']);

Route::get('/cart-remove/{rowId}',[CartController::class,'cardRemove']);

Route::post('/create-invoice',[CartController::class,'CreateInvoice']);

Route::post('//make-invoice',[CartController::class,'makeInvoice']);

//report
Route::get('/daily-report',[PosController::class,'dailyReport'])->name('daily.report');
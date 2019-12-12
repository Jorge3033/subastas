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

Route::get('/', function () {
    return view('welcome');
});

///// 				Page Controller
#################################################################################33

Route::get('/contact', 'PageController@contact')->name('contact');	
Route::get('/categories', 'PageController@categories')->name('categories');	

###################################################################################
//					End Page Controlle


// Admin Templates Routes
###################################
Route::get('/adminTemplate', 'AdminTemplateController@index')->name('adminTemplate');	
##################################
// End Admin Templates route

//				Sessions Routes 
###################################################################
//sessins routes Admins
Route::get('/login', 'SessionsController@login')->name('login');	
Route::POST('/checkLogin', 'SessionsController@checkLogin')->name('checkLogin');
Route::get('/logOutAdmin', 'SessionsController@logOutAdmin')->name('logOutAdmin');	
//end sessions routes admins
//session Users
Route::get('/logOutUser', 'SessionsController@logOutUser')->name('logOutUser');	
//end Session Users

###################################################################
// 				end Session Routes


//							admin Routes

###################################################################
#							Users Routes                          #
################################################################### 

Route::get('/reportUsers', 'UserController@report')->name('reportUsers');

Route::get('/formUpUser', 'UserController@formUpUser')->name('formUpUser');
Route::POST('/upUsers', 'UserController@up')->name('upUsers');

Route::get('/modificarUser/{userId}', 'UserController@modificarUser')->name('midificarUser');

Route::get('/formModificarUser', 'UserController@formModificarUser')->name('formModificarUser');
Route::POST('/modificarUsers', 'UserController@modificarUsers')->name('modificarUsers');

Route::get('/lockUser/{userId}', 'UserController@lock')->name('lockUser');
Route::get('/unlockUser/{userId}', 'UserController@unlock')->name('unlockUser');



###################################################################
#						End Users Routes                          #
###################################################################

###################################################################
#							Admins Routes                          #
################################################################### 

Route::get('/reportAdmins', 'AdminController@report')->name('reportAdmins');

Route::get('/formUpAdmin', 'AdminController@formUpAdmin')->name('formUpAdmin');
Route::POST('/upAdmins', 'AdminController@up')->name('upAdmins');

Route::get('/modificarAdmin/{AdminId}', 'AdminController@modificarAdmin')->name('midificarAdmin');

Route::get('/formModificarAdmin', 'AdminController@formModificarAdmin')->name('formModificarAdmin');
Route::POST('/modificarAdmins', 'AdminController@modificarAdmins')->name('modificarAdmins');

Route::get('/lockAdmin/{AdminId}', 'AdminController@lock')->name('lockAdmin');
Route::get('/unlockAdmin/{AdminId}', 'AdminController@unlock')->name('unlockAdmin');

 

###################################################################
#						End Admins Routes                          #
###################################################################

###################################################################
#							Categories Routes                     #
###################################################################  

Route::get('/reportCategories', 'CategoryController@report')->name('reportCategories');

Route::get('/formUpCategory', 'CategoryController@formUpCategory')->name('formUpCategory');
Route::POST('/upCategories', 'CategoryController@up')->name('upCategories');

Route::get('/modificarCategory/{categoryId}', 'CategoryController@modificarCategory')->name('midificarCategory');

Route::get('/formModificarCategory', 'CategoryController@formModificarCategory')->name('formModificarCategory');
Route::POST('/modificarCategories', 'CategoryController@modificarCategories')->name('modificarCategories');

Route::get('/lockCategory/{categoryId}', 'CategoryController@lock')->name('lockCategory');
Route::get('/unlockCategory/{categoryId}', 'CategoryController@unlock')->name('unlockCategory');



###################################################################
#						End Categories Routes                     #
###################################################################

###################################################################
#							subCategories Routes                     #
################################################################### 

Route::get('/reportSubCategories', 'SubCategoryController@report')->name('reportSubCategories');

Route::get('/formUpSubCategory', 'SubCategoryController@formUpSubCategory')->name('formUpSubCategory');
Route::POST('/upSubCategories', 'SubCategoryController@up')->name('upSubCategories');

Route::get('/modificarSubCategory/{SubCategoryId}', 'SubCategoryController@modificarSubCategory')->name('midificarSubCategory');

Route::get('/formModificarSubCategory', 'SubCategoryController@formModificarSubCategory')->name('formModificarSubCategory');
Route::POST('/modificarSubCategories', 'SubCategoryController@modificarSubCategories')->name('modificarSubCategories');

Route::get('/lockSubCategory/{SubCategoryId}', 'SubCategoryController@lock')->name('lockSubCategory');
Route::get('/unlockSubCategory/{SubCategoryId}', 'SubCategoryController@unlock')->name('unlockSubCategory');



###################################################################
#						End subSubCategories Routes               #
###################################################################

###################################################################
#							Articles Routes                       # 
################################################################### 

Route::get('/reportArticles', 'ArticleController@report')->name('reportArticles');

Route::get('/formUpArticle', 'ArticleController@formUpArticle')->name('formUpArticle');
Route::POST('/upArticles', 'ArticleController@up')->name('upArticles');

Route::get('/modificarArticle/{ArticleId}', 'ArticleController@modificarArticle')->name('midificarArticle');

Route::get('/formModificarArticle', 'ArticleController@formModificarArticle')->name('formModificarArticle');
Route::POST('/modificarArticles', 'ArticleController@modificarArticles')->name('modificarArticles');

Route::get('/lockArticle/{ArticleId}', 'ArticleController@lock')->name('lockArticle');
Route::get('/unlockArticle/{ArticleId}', 'ArticleController@unlock')->name('unlockArticle');



###################################################################
#						End subArticles Routes                    #
###################################################################

###################################################################
#							Presales Routes                       #
################################################################### 

Route::get('/reportPresales', 'PresaleController@report')->name('reportPresales');

Route::get('/formUpPresale', 'PresaleController@formUpPresale')->name('formUpPresale');
Route::POST('/upPresales', 'PresaleController@up')->name('upPresales');

Route::get('/modificarPresale/{PresaleId}', 'PresaleController@modificarPresale')->name('midificarPresale');

Route::get('/formModificarPresale', 'PresaleController@formModificarPresale')->name('formModificarPresale');
Route::POST('/modificarPresales', 'PresaleController@modificarPresales')->name('modificarPresales');

Route::get('/lockPresale/{PresaleId}', 'PresaleController@lock')->name('lockPresale');
Route::get('/unlockPresale/{PresaleId}', 'PresaleController@unlock')->name('unlockPresale');



###################################################################
#						End Presales Routes                #
###################################################################

//		end adminRoutes

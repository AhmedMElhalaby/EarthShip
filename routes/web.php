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

use App\Http\Resources\MemberShip as MemberShipResource;
use App\Http\Resources\MemberShipFeature as MemberShipFeatureResource;
use App\Membership;
use App\MembershipFeature;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin'], function () {
    Route::get('login', 'AdminAuth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'AdminAuth\LoginController@login');
    Route::post('logout', 'AdminAuth\LoginController@logout')->name('logout');
});

Route::group(['prefix' => ''], function () {
    Route::get('/login', 'UserAuth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'UserAuth\LoginController@login');
    Route::post('/logout', 'UserAuth\LoginController@logout')->name('logout');

    Route::get('/register', 'UserAuth\RegisterController@showRegistrationForm')->name('register');
    Route::post('/register', 'UserAuth\RegisterController@register');

    Route::post('/password/email', 'UserAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
    Route::post('/password/reset', 'UserAuth\ResetPasswordController@reset')->name('password.email');
    Route::get('/password/reset', 'UserAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
    Route::get('/password/reset/{token}', 'UserAuth\ResetPasswordController@showResetForm');
});
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});
Route::get('/', function () {
    return view('index');
});


Route::group(['prefix' => 'admin/','middleware' => 'admin'], function () {
    Route::get('/','DashboardController@index');
    Route::get('admins','AdminController@Admins');
    Route::get('admins/edit/{id}','AdminController@Edit');
    Route::post('admins/postEdit','AdminController@postEdit');
    Route::get('admins/add','AdminController@Add');
    Route::post('admins/postAdd','AdminController@postAdd');
    Route::get('admins/delete/{id}','AdminController@Delete');
        #/ Users Routes/#
    Route::get('users','UserController@Users');
    Route::get('user/show/{id}','UserController@Show');
    Route::get('user/edit/{id}','UserController@Edit');
    Route::post('user/postEdit','UserController@postEdit');
    Route::get('user/add','UserController@Add');
    Route::post('user/postAdd','UserController@postAdd');
    Route::get('user/delete/{id}','UserController@Delete');
        #/ Address Routes/#
    Route::get('addresses/','AddressController@Addresses');
    Route::get('address/edit/{id}','AddressController@Edit');
    Route::post('address/postEdit','AddressController@postEdit');
    Route::get('address/add','AddressController@Add');
    Route::post('address/postAdd','AddressController@postAdd');
    Route::get('address/delete/{id}','AddressController@Delete');
        #/ Countries Routes/#
    Route::get('countries','CountryController@Countries');
    Route::get('country/edit/{id}','CountryController@Edit');
    Route::post('country/postEdit','CountryController@postEdit');
    Route::get('country/add','CountryController@Add');
    Route::post('country/postAdd','CountryController@postAdd');
    Route::get('country/delete/{id}','CountryController@Delete');
        #/ Features Routes/#
    Route::get('features','FeaturesController@Features');
    Route::get('feature/edit/{id}','FeaturesController@Edit');
    Route::post('feature/postEdit','FeaturesController@postEdit');
    Route::get('feature/add','FeaturesController@Add');
    Route::post('feature/postAdd','FeaturesController@postAdd');
    Route::get('feature/delete/{id}','FeaturesController@Delete');
        #/ Services Routes/#
    Route::get('services','ServicesController@Services');
    Route::get('service/edit/{id}','ServicesController@Edit');
    Route::post('service/postEdit','ServicesController@postEdit');
    Route::get('service/add','ServicesController@Add');
    Route::post('service/postAdd','ServicesController@postAdd');
    Route::get('service/delete/{id}','ServicesController@Delete');
        #/ Support Routes/#
    Route::get('support/','SupportController@Support');
    Route::get('support/edit/{id}','SupportController@Edit');
    Route::post('support/postEdit','SupportController@postEdit');
    Route::get('support/add','SupportController@Add');
    Route::post('support/postAdd','SupportController@postAdd');
    Route::get('support/delete/{id}','SupportController@Delete');
    Route::get('support/close/{id}','SupportController@Close');
        #/ SupportReply Routes/#
    Route::get('support-replies/{id}','SupportController@Replies');
    Route::get('support-reply/{replay}/add','SupportReplyController@Add');
    Route::post('support-reply/postAdd','SupportReplyController@postAdd');
        #/ Membership Routes/#
    Route::get('memberships/','MembershipController@Memberships');
    Route::get('membership/edit/{id}','MembershipController@Edit');
    Route::post('membership/postEdit','MembershipController@postEdit');
    Route::get('membership/add','MembershipController@Add');
    Route::post('membership/postAdd','MembershipController@postAdd');
    Route::get('membership/delete/{id}','MembershipController@Delete');
        #/ Membership Features Routes/#
    Route::get('membership-features/{id}','MembershipController@ShowMembershipFeatures');
    Route::get('membership-feature/{membership}/edit/{id}','MembershipFeaturesController@Edit');
    Route::post('membership-feature/postEdit','MembershipFeaturesController@postEdit');
    Route::get('membership-feature/{membership}/add','MembershipFeaturesController@Add');
    Route::post('membership-feature/postAdd','MembershipFeaturesController@postAdd');
    Route::get('membership-feature/delete/{id}','MembershipFeaturesController@Delete');
        #/ FAQ Category Routes/#
    Route::get('faq-category/','FAQCategoryController@FaqCategories');
    Route::get('faq-category/edit/{id}','FAQCategoryController@Edit');
    Route::post('faq-category/postEdit','FAQCategoryController@postEdit');
    Route::get('faq-category/add','FAQCategoryController@Add');
    Route::post('faq-category/postAdd','FAQCategoryController@postAdd');
    Route::get('faq-category/delete/{id}','FAQCategoryController@Delete');
        #/ FAQ Questions Routes/#
    Route::get('faq-category-question/{id}','FAQCategoryController@ShowCategoryQuestions');
    Route::get('faq-question/{category}/edit/{id}','FAQQuestionController@Edit');
    Route::post('faq-question/postEdit','FAQQuestionController@postEdit');
    Route::get('faq-question/{category_id}/add','FAQQuestionController@Add');
    Route::post('faq-question/postAdd','FAQQuestionController@postAdd');
    Route::get('faq-question/delete/{id}','FAQQuestionController@Delete');
        #/ Settings Category  Routes/#
    Route::get('settings-categories/','SettingCategoryController@SettingCategories');
    Route::get('settings-category/edit/{id}','SettingCategoryController@Edit');
    Route::post('settings-category/postEdit','SettingCategoryController@postEdit');
    Route::get('settings-category/add','SettingCategoryController@Add');
    Route::post('settings-category/postAdd','SettingCategoryController@postAdd');
    Route::get('settings-category/delete/{id}','SettingCategoryController@Delete');
        #/ Settings Routes/#
    Route::get('settings-category/{id}','SettingCategoryController@ShowCategorySettings');
    Route::get('setting/{category}/edit/{id}','SettingsController@Edit');
    Route::post('setting/postEdit','SettingsController@postEdit');
    Route::get('setting/{category_id}/add','SettingsController@Add');
    Route::post('setting/postAdd','SettingsController@postAdd');
    Route::get('setting/delete/{id}','SettingsController@Delete');
        #/ Payment Methods Routes/#
    Route::get('payment-methods','PaymentMethodController@PaymentMethods');
    Route::get('payment-method/edit/{id}','PaymentMethodController@Edit');
    Route::post('payment-method/postEdit','PaymentMethodController@postEdit');
    Route::get('payment-method/add','PaymentMethodController@Add');
    Route::post('payment-method/postAdd','PaymentMethodController@postAdd');
    Route::get('payment-method/delete/{id}','PaymentMethodController@Delete');
        #/ Shipping Methods Routes/#
    Route::get('shipping-methods','ShippingMethodController@ShippingMethods');
    Route::get('shipping-method/edit/{id}','ShippingMethodController@Edit');
    Route::post('shipping-method/postEdit','ShippingMethodController@postEdit');
    Route::get('shipping-method/add','ShippingMethodController@Add');
    Route::post('shipping-method/postAdd','ShippingMethodController@postAdd');
    Route::get('shipping-method/delete/{id}','ShippingMethodController@Delete');
});




//Api
Route::get('api/memberships',function (){
    return MemberShipResource::collection(MemberShip::all());
});
Route::get('api/memberships/feature',function (\Illuminate\Http\Request $request){

    return MemberShipFeatureResource::collection(MembershipFeature::where('membership_id',$request->id)->get());
});
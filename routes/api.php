<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\MemberShip as MemberShipResource;
use App\Http\Resources\AdditionalName as AdditionalNameResource;
use App\Http\Resources\MemberShipFeature as MemberShipFeatureResource;
use App\Http\Resources\ExpectedPackage as ExpectedPackageResource;
use App\Http\Resources\AssistedPurchase as AssistedPurchaseResource;
use App\Http\Resources\Product as ProductResource;
use App\Http\Resources\Support as SupportResource;
use App\Http\Resources\Address as AddressResource;
use App\Http\Resources\Packages as PackagesResource;
use App\Membership;
use App\AdditionalName;
use App\MembershipFeature;
use App\ExpectedPackage;
use App\AssistedPurchase;
use App\AssistedPurchaseItem;
use App\Product;
use App\Address;
use App\Support;
use App\Packages;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group([
    'middleware' => 'api',
], function ($router) {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});
Route::get('product',function (){
    return ProductResource::collection(Product::limit(9)->get());
});
Route::get('address',function (){
    return AddressResource::collection(Address::all());
});
// User Dashboard - Sitting
// Account preferences
Route::get('setting/email_news', function (){
    if(auth()->user()->email_news){
        auth()->user()->update(array('email_news'=>0));
        return response()->json(['status' => 0]);
    }else{
        auth()->user()->update(array('email_news'=>1));
        return response()->json(['status' => 1]);
    }
});
Route::get('setting/package_photo', function (){
    if(auth()->user()->package_photo){
        auth()->user()->update(array('package_photo'=>0));
        return response()->json(['status' => 0]);
    }else{
        auth()->user()->update(array('package_photo'=>1));
        return response()->json(['status' => 1]);
    }
});
Route::get('setting/content_photo', function (){
    if(auth()->user()->content_photo){
        auth()->user()->update(array('content_photo'=>0));
        return response()->json(['status' => 0]);
    }else{
        auth()->user()->update(array('content_photo'=>1));
        return response()->json(['status' => 1]);
    }
});
Route::get('setting/detailed_photo', function (){
    if(auth()->user()->detailed_photo){
        auth()->user()->update(array('detailed_photo'=>0));
        return response()->json(['status' => 0]);
    }else{
        auth()->user()->update(array('detailed_photo'=>1));
        return response()->json(['status' => 1]);
    }
});
Route::get('setting/open_package', function (){
    if(auth()->user()->open_package){
        auth()->user()->update(array('open_package'=>0));
        return response()->json(['status' => 0]);
    }else{
        auth()->user()->update(array('open_package'=>1));
        return response()->json(['status' => 1]);
    }
});
Route::post('setting/other_instruction', function (Request $request){

    if($request->other_instruction != ''){
        auth()->user()->update(array('other_instruction'=>$request->other_instruction));
    }
    return response()->json(['msg' => 'Saved','data'=>auth()->user()]);

});
// Account Names
Route::get('additional_name', function (){
    return AdditionalNameResource::collection(AdditionalName::where('user_id',auth()->user()->id)->get());
});
Route::post('add/additional_name', function (Request $request){
    $validation = $request->validate(AdditionalName::$rules);
    $new =  AdditionalName::create(array(
        'name'=>$request->name,
        'user_id'=>auth()->user()->id,
    ));;
    return response()->json(['status' => true,'id'=>$new->id,'name'=>$new->name]);
});
Route::post('delete/additional_name', function (Request $request){
    $AdditionalName = (new AdditionalName)->where('id',$request->id)->where('user_id',auth()->user()->id)->first();
    if($AdditionalName != null)
        $AdditionalName->delete();
    return response()->json(['status' => true,'msg'=>'Deleted Successfully !']);
});

// Expected Packages
Route::get('expected_package', function (){
    return ExpectedPackageResource::collection(ExpectedPackage::where('user_id',auth()->user()->id)->get());
});
Route::post('add/expected_package', function (Request $request){
    $validation = $request->validate(ExpectedPackage::$rules);
    $new =  ExpectedPackage::create(array(
        'vendor'=>$request->vendor,
        'recipient_name'=>$request->recipient_name,
        'address_id'=>$request->address_id,
        'tracking_number'=>$request->tracking_number,
        'note'=>$request->note,
        'user_id'=>auth()->user()->id,
    ));;
    return response()->json(['status' => true,'data'=>$new]);
});
Route::post('edit/expected_package', function (Request $request){
    $validation = $request->validate(ExpectedPackage::$rules);
    $ExpectedPackage = ExpectedPackage::where('id',$request->id)->where('user_id',auth()->user()->id)->first();
    if($ExpectedPackage != null){
        $ExpectedPackage->update(array(
            'vendor'=>$request->vendor,
            'recipient_name'=>$request->recipient_name,
            'address_id'=>$request->address_id,
            'tracking_number'=>$request->tracking_number,
            'note'=>$request->note,
        ));
        return response()->json(['status' => true,'data'=>$ExpectedPackage]);
    }else{
        return response()->json(['status' => false,'msg'=>'Not Exist !']);
    }
});
Route::post('edit/expected_package/custom', function (Request $request){
    $validation = $request->validate(ExpectedPackage::$rules);
    $ExpectedPackage = ExpectedPackage::where('id',$request->id)->where('user_id',auth()->user()->id)->first();
    if($ExpectedPackage != null){
        $ExpectedPackage->update(array(
            'vendor'=>$request->vendor,
            'recipient_name'=>$request->recipient_name,
            'address_id'=>$request->address_id,
            'tracking_number'=>$request->tracking_number,
            'note'=>$request->note,
        ));
        return response()->json(['status' => true,'data'=>$ExpectedPackage]);
    }else{
        return response()->json(['status' => false,'msg'=>'Not Exist !']);
    }
});
Route::post('delete/expected_package', function (Request $request){
    $ExpectedPackage = (new ExpectedPackage())->where('id',$request->id)->where('user_id',auth()->user()->id)->first();
    if($ExpectedPackage != null)
        $ExpectedPackage->delete();
    return response()->json(['status' => true,'msg'=>'Deleted Successfully !']);
});

////////////////////////////////////////////
///
///
///
///

// Assisted Purchase
Route::get('support_ticket', function (){
    return SupportResource::collection(Support::where('user_id',auth()->user()->id)->get());
});
Route::post('add/support_ticket', function (Request $request){
    $validation = $request->validate(Support::$rules);
    $new = (new Support)->create(array(
        'subject'=>$request->subject,
        'detail'=>$request->detail,
        'type'=>$request->type,
        'user_id'=>auth()->user()->id,
    ));
    return response()->json(['status' => true,'data'=>$new]);
});
Route::post('edit/support_ticket', function (Request $request){
    $validation = $request->validate(Support::$rules);
    $Support = Support::where('id',$request->id)->where('user_id',auth()->user()->id)->first();
    if($Support != null){
        $Support->update(array(
            'subject'=>$request->subject,
            'detail'=>$request->detail,
            'type'=>$request->type,
        ));
        return response()->json(['status' => true,'data'=>$Support]);
    }else{
        return response()->json(['status' => false,'msg'=>'Not Exist !']);
    }
});
Route::post('delete/support_ticket', function (Request $request){
    $Support = (new Support())->where('id',$request->id)->where('user_id',auth()->user()->id)->first();
    if($Support != null){
        $Support->delete();
    }
    return response()->json(['status' => true,'msg'=>'Deleted Successfully !']);
});






///
Route::get('assisted_purchase', function (){
    return AssistedPurchaseResource::collection(AssistedPurchase::where('user_id',auth()->user()->id)->get());
});
Route::post('add/assisted_purchase', function (Request $request){
    $validation = $request->validate(AssistedPurchase::$rules);
    $new = (new AssistedPurchase)->create(array(
        'site_name'=>$request->site_name,
        'site_url'=>$request->site_url,
        'address_id'=>$request->address_id,
        'other_instruction'=>$request->other_instruction,
        'user_id'=>auth()->user()->id,
        'handling_charges'=>$request->handling_charges,
        'domestic_tax'=>$request->domestic_tax,
    ));
    $new1 = (new AssistedPurchaseItem)->create(array(
        'item_name'=>$request->item_name,
        'option'=>$request->option,
        'item_url'=>$request->item_url,
        'price'=>$request->price,
        'quantity'=>$request->quantity,
        'assisted_purchase_id'=>$new->id,
    ));
    return response()->json(['status' => true,'data'=>$new]);
});
Route::post('edit/assisted_purchase', function (Request $request){
    $validation = $request->validate(AssistedPurchase::$rules);
    $AssistedPurchase = AssistedPurchase::where('id',$request->id)->where('user_id',auth()->user()->id)->first();
    if($AssistedPurchase != null){
        $AssistedPurchase->update(array(
            'site_name'=>$request->site_name,
            'site_url'=>$request->site_url,
            'address_id'=>$request->address_id,
            'other_instruction'=>$request->other_instruction,
            'handling_charges'=>$request->handling_charges,
            'domestic_tax'=>$request->domestic_tax,
        ));
        $AssistedPurchaseItem = AssistedPurchaseItem::where('assisted_purchase_id',$request->id)->first();
        $AssistedPurchaseItem->update(array(
            'item_name'=>$request->item_name,
            'option'=>$request->option,
            'item_url'=>$request->item_url,
            'price'=>$request->price,
            'quantity'=>$request->quantity,
        ));
        return response()->json(['status' => true,'data'=>$AssistedPurchase]);
    }else{
        return response()->json(['status' => false,'msg'=>'Not Exist !']);
    }
});
Route::post('delete/assisted_purchase', function (Request $request){
    $AssistedPurchase = (new AssistedPurchase())->where('id',$request->id)->where('user_id',auth()->user()->id)->first();
    if($AssistedPurchase != null){
        AssistedPurchaseItem::where('assisted_purchase_id',$request->id)->delete();
        $AssistedPurchase->delete();
    }
    return response()->json(['status' => true,'msg'=>'Deleted Successfully !']);
});










Route::get('memberships',function (){
    return MemberShipResource::collection(MemberShip::all());
});

Route::get('memberships/allfeatures',function (){
    return MemberShipFeatureResource::collection(MembershipFeature::all());
});
Route::get('memberships/feature',function (\Illuminate\Http\Request $request){
    return MemberShipFeatureResource::collection(MembershipFeature::where('membership_id',$request->id)->get());
});
Route::get('userMemberShip',function (){
    return MemberShipResource::collection(MemberShip::where('id',auth()->user()->membership_id)->get());
});
Route::get('userAddress',function (){
    return AddressResource::collection(Address::where('id',auth()->user()->default_address_id)->get());
});
Route::post('changeAddress',function (Request $request){
    if($request->id != null)
        auth()->user()->update(array('default_address_id'=>$request->id));
    return AddressResource::collection(Address::where('id',auth()->user()->default_address_id)->get());
});


Route::get('packages',function (){
    return PackagesResource::collection(Packages::where('user_id',auth()->user()->id)->get());
});

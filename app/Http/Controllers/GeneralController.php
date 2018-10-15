<?php

namespace App\Http\Controllers;
use App\SettingCategory ;
use App\Country ;
use App\ProhibitedCategory;
use App\ProhibitedItem;
use App\HowItWorkStep;
use App\ProhibitedItemCountry ;
use App\Service ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GeneralController extends Controller
{
    
    public function Index() {
        $settings = SettingCategory::all();
        return view('index',compact('settings'));
    }

    public function Prohibitions() {
        $Countries = Country::all();
        $settings = SettingCategory::all();
        $ProhibitedCategories = ProhibitedCategory::all();
        $limitedItems=[];
        return view('General.prohibition',compact('Countries','ProhibitedCategories','limitedItems','settings'));
    }

    public function ProhibitionSearch(Request $request) {
        $Countries = Country::all();
        $settings = SettingCategory::all();
        $ProhibitedCategories = ProhibitedCategory::all();
        $limitedItems = ProhibitedItemCountry::where('country_id',$request->country_id)->get();
        return view('General.Prohibition',compact('Countries','ProhibitedCategories','limitedItems','settings'));
    }

    
    public function HowItWork() {
        $index=1 ;
        $subIndex = 'a' ;
        $settings = SettingCategory::all();
        $Steps = HowItWorkStep::all();
        return view('General.HowItWork',compact('Steps','index','settings','subIndex'));
    }

    public function ServicesPrices() {
        $settings = SettingCategory::all();
        $Services = Service::all();
        return view('General.ServicesPrices',compact('Services','settings'));
    }

    
   
}

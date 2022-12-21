<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
class SettingController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:settings-update',   ['only' => ['index','update']]);
    }

    public function index()
    {
        if(!auth()->user()->isAbleTo('settings-update'))abort(403);
        $settings = Setting::firstOrCreate();
        return view('admin.settings.index',compact('settings'));
    }

    public function update(Request $request, Setting $settings)
    {
        if(!auth()->user()->isAbleTo('settings-update'))abort(403);
        \App\Models\Setting::query()->update([

            'num_of_projects'=>$request->num_of_projects,
            'map_ifream'=>$request->map_ifream,
            'hourWorks'=>$request->hourWorks,
            'footer_about'=>$request->footer_about,
            'email2'=>$request->email2,
            'email3'=>$request->email3,
            'num_of_customers'=>$request->num_of_customers,
            'num_of_companies'=>$request->num_of_companies,
            'num_of_clients'=>$request->num_of_clients,
            'num_of_employees'=>$request->num_of_employees,
            'website_name'=>$request->website_name,
            'address'=>$request->address,
            'website_bio'=>$request->website_bio,
            'contact_email'=>$request->contact_email,
            'main_color'=>$request->main_color,
            'hover_color'=>$request->hover_color,
            'phone'=>$request->phone,
            'phone2'=>$request->phone2,
            'whatsapp_phone'=>$request->whatsapp_phone,
            'facebook_link'=>$request->facebook_link,
            'twitter_link'=>$request->twitter_link,
            'instagram_link'=>$request->instagram_link,
            'youtube_link'=>$request->youtube_link,
            'telegram_link'=>$request->telegram_link,
            'whatsapp_link'=>$request->whatsapp_link,
            'tiktok_link'=>$request->tiktok_link,
            'nafezly_link'=>$request->nafezly_link,
            'linkedin_link'=>$request->linkedin_link,
            'github_link'=>$request->github_link,
            'another_link1'=>$request->another_link1,
            'another_link2'=>$request->another_link2,
            'another_link3'=>$request->another_link3,
            'contact_page'=>$request->contact_page,
            'header_code'=>$request->header_code,
            'footer_code'=>$request->footer_code,
            'robots_txt'=>$request->robots_txt,
            'dashboard_dark_mode'=>$request->dashboard_dark_mode==1?1:0
        ]);

        if($request->hasFile('website_logo')){
            $file = $this->store_file([
                'source'=>$request->website_logo,
                'validation'=>"image",
                'path_to_save'=>'/uploads/website/',
                'type'=>'IMAGE',
                'user_id'=>\Auth::user()->id,
                'resize'=>null,
                'small_path'=>'small/',
                'visibility'=>'PUBLIC',
                'file_system_type'=>env('FILESYSTEM_DRIVER','local'),
                'optimize'=>true
            ])['filename'];
            \App\Models\Setting::query()->update(['website_logo'=>$file]);
        }
        if($request->hasFile('website_wide_logo')){
            $file = $this->store_file([
                'source'=>$request->website_wide_logo,
                'validation'=>"image",
                'path_to_save'=>'/uploads/website/',
                'type'=>'IMAGE',
                'user_id'=>\Auth::user()->id,
                'resize'=>null,
                'small_path'=>'small/',
                'visibility'=>'PUBLIC',
                'file_system_type'=>env('FILESYSTEM_DRIVER','local'),
                'optimize'=>true
            ])['filename'];
            \App\Models\Setting::query()->update(['website_wide_logo'=>$file]);
        }
        if($request->hasFile('website_icon')){
            $file = $this->store_file([
                'source'=>$request->website_icon,
                'validation'=>"image",
                'path_to_save'=>'/uploads/website/',
                'type'=>'IMAGE',
                'user_id'=>\Auth::user()->id,
                //'resize'=>[500,1000],
                'small_path'=>'small/',
                'visibility'=>'PUBLIC',
                'file_system_type'=>env('FILESYSTEM_DRIVER','local'),
                //'optimize'=>true
            ])['filename'];
            \App\Models\Setting::query()->update(['website_icon'=>$file]);
        }
        if($request->hasFile('website_cover')){
            $file = $this->store_file([
                'source'=>$request->website_cover,
                'validation'=>"image",
                'path_to_save'=>'/uploads/website/',
                'type'=>'IMAGE',
                'user_id'=>\Auth::user()->id,
                'resize'=>[500,1000],
                'small_path'=>'small/',
                'visibility'=>'PUBLIC',
                'file_system_type'=>env('FILESYSTEM_DRIVER','local'),
                'optimize'=>true
            ])['filename'];
            \App\Models\Setting::query()->update(['website_cover'=>$file]);
        }
        toastr()->success('تم تحديث الإعدادات بنجاح','عملية ناجحة');
        return redirect()->back();

    }

}

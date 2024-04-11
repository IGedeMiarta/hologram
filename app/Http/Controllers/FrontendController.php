<?php

namespace App\Http\Controllers;

use App\DefaultSettings;
use App\Portofolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\Extension\Table\Table;

class FrontendController extends Controller
{
    public function index(){
        $data['title'] = 'Custom Cloting';
        $data['app'] = DefaultSettings::first();
        $data['porto'] = Portofolio::orderByDesc('id')->paginate(4);
        return view('frontend.index',$data);
    }
    public function settings(){
        $data['title'] = 'APP Settings';
        $data['app'] = DefaultSettings::first();
        return view('admin.settings',$data);
    }
    public function settingsPost(Request $request){
        DB::beginTransaction();
        try {
            $app = DefaultSettings::first();
            $app->name  = $request->name;
            $app->phone = $request->phone;
            $app->mail  = $request->email;
            $app->s_fb  = $request->facebook;
            $app->s_ig  = $request->instagram;
            $app->s_pin  = $request->pinterest;
            $app->s_tt  = $request->tiktok;
            $app->save();
            DB::commit();
            
            return redirect()->back()->with('success','App Settings Updated');
       } catch (\Throwable $th) {
            return redirect()->back()->with('error','Error <br>' . $th->getMessage());
        
       }
    }
    public function porto(){
       
        $data['title'] =  'Porto';
        $data['table'] = Portofolio::orderByDesc('id')->paginate(10);
        return view('admin.porto',$data);
    }
    public function portoPost(Request $request){
        $request->validate([
            'name' => 'required',
            'by_name' => 'required',
            'date' => 'required',
            'header_img' => 'required|image|max:2048', // Adjust max file size as needed
            'by_logo' => 'required|image|max:2048', // Adjust max file size as needed
        ]);
        DB::beginTransaction();
        try {
                // Handle file uploads for header_img
            $headerImgPath = $request->file('header_img')->store('public/images');
            $headerImgUrl = Storage::url($headerImgPath);

            // Handle file uploads for by_logo
            $byLogoPath = $request->file('by_logo')->store('public/images');
            $byLogoUrl = Storage::url($byLogoPath);

            // Save the rest of the data and the image URLs to the database
            // Example:
            Portofolio::create([
                'name' => $request->name,
                'by_name' => $request->by_name,
                'date' => $request->date,
                'header_img' => $headerImgUrl,
                'by_logo' => $byLogoUrl,
                'complte'  => $request->date
            ]);
            DB::commit();
            return redirect()->back()->with('success','Porotofolio Baru disimpan');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error','Error: '. $th->getMessage() );

            //throw $th;
        }
    }
    public function portoUpdate(Request $request,$id){
        dd($request->all(),$id,$request->file());
        $porto = Portofolio::find($id);
        $porto->name = $request->name;
        $porto->by_name = $request->by_name;
        $porto->complte = $request->date;
        $porto->status =  $request->status;

        //check if any input file
        if ($request->hasFile('header_img')) {
        // Handle header_img file upload
        // $request->file('header_img') will contain the uploaded file
        // Example: $porto->header_img = $request->file('header_img')->store('public/images');
        }

        if ($request->hasFile('by_logo')) {
            // Handle by_logo file upload
            // $request->file('by_logo') will contain the uploaded file
            // Example: $porto->by_logo = $request->file('by_logo')->store('public/images');
        }

    }
}

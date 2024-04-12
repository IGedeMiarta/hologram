<?php

namespace App\Http\Controllers;

use App\About;
use App\Benefit;
use App\Contact;
use App\DefaultSettings;
use App\Portofolio;
use App\Service;
use App\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminFrontendController extends Controller
{
      public function settings(){
        $data['title'] = 'APP Settings';
        $data['app'] = DefaultSettings::first();
        return view('admin.settings',$data);
    }
    public function contactPost(Request $request){
       $contact = new Contact();
       $contact->name = $request->name;
       $contact->whatsapp = $request->whatsapp;
       $contact->message = $request->message;
       $contact->save();
       return redirect()->back()->with('success','Pesan Terkirim! <br> Terima Kasih Telah Mengubungi Kami. Pesan Anda Akan Segera Kami Balas Secepatnya :)');
    }
    public function settingsPost(Request $request){
        DB::beginTransaction();
        try {
            $app = DefaultSettings::first();
            $app->name  = $request->name;
            $app->phone = $request->phone;
            $app->mail  = $request->email;
            $app->s_fb  = $request->s_fb;
            $app->s_ig  = $request->s_ig;
            $app->s_tt  = $request->s_tt;
            if ($request->hasFile('logo')) {
                $logoPath = $request->file('logo')->store('public/images/logo');
                $logoUrl = Storage::url($logoPath);
                $app->logo = $logoUrl;
            }
            $app->save();
            DB::commit();
            
            return redirect()->back()->with('success','App Settings Updated');
       } catch (\Throwable $th) {
            return redirect()->back()->with('error','Error <br>' . $th->getMessage());
        
       }
    }
    public function porto(){
       
        $data['title'] =  'Portofolio';
        $data['table'] = Portofolio::orderByDesc('id')->paginate(10);
        return view('admin.porto',$data);
    }
    public function portoPost(Request $request){

        // $validate = Validator::make($request->all(),[
        //     'project_name' => 'required',
        //     'client_name' => 'required',
        //     'complate_date' => 'required',
        //     'project_img' => 'required|image|max:2048', // Adjust max file size as needed
        //     'client_img' => 'required|image|max:2048', // Adjust max file size as needed
        // ]);
        // if ($validate->fails()) {
        //    return redirect()->back()->with('error','Validasi Error, Semua Input Wajib Diisi');
        // }
        // dd($request->all());
        DB::beginTransaction();
        try {
                // Handle file uploads for header_img
            $headerImgPath = $request->file('project_img')->store('public/images/porto');
            $project_img = Storage::url($headerImgPath);

            // Handle file uploads for by_logo
            $byLogoPath = $request->file('client_img')->store('public/images/porto');
            $client_img = Storage::url($byLogoPath);

            // Save the rest of the data and the image URLs to the database
            // Example:
            Portofolio::create([
                'project_name' => $request->project_name,
                'client_name' => $request->client_name,
                'project_img' => $project_img,
                'client_img' => $client_img,
                'complate_date'  => $request->date_complate
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
        $porto = Portofolio::find($id);
        $porto->project_name = $request->project_name;
        $porto->client_name = $request->client_name;
        $porto->complate_date = $request->date_complate;
        $porto->status =  $request->status;

        //check if any input file
        if ($request->hasFile('project_img')) {
            $headerImgPath = $request->file('project_img')->store('public/images/porto');
            $porto->project_img = Storage::url($headerImgPath);
        }

        if ($request->hasFile('client_img')) {
            // Handle by_logo file upload
            $client_img = $request->file('client_img')->store('public/images/porto');
            $porto->client_img = Storage::url($client_img);
        }
        $porto->save();
        return redirect()->back()->with('success','Porotofolio diupdate');
    }
    public function about(){
        $data['title'] = 'About';
        $data['app'] = DefaultSettings::first();
        $data['about'] = About::first();
        $data['benefit'] = Benefit::all();
        $data['service']  = Service::all();
        $data['testi']  = Testimoni::all();
        return view('admin.about',$data);
    }
    public function banner(Request $request){
        $about = About::find(1);
        if ($request->hasFile('banner_img')) {
            $headerImgPath = $request->file('banner_img')->store('public/images/about');
            $about->banner_img = Storage::url($headerImgPath);
        }
        $about->title = $request->title;
        $about->desc = $request->desc;
        $about->save();
        return redirect()->back()->with('success','Banner diupdate');

    }
    public function benefit(Request $request){
        Benefit::create([
            'about_id'  => 1,
            'text'=> $request->benefit
        ]);
        return redirect()->back()->with('success','Benefit baru ditambahkan');
    }
    public function deleteBenfit($id){
        Benefit::find($id)->delete();
        return redirect()->back()->with('success','Benefit dihapus');

    }
    public function serviceTitle(Request $request){
        // dd($request->all());
        $about= About::find(1);
        $about->service_title = $request->service_title;
        $about->service_sub_title = $request->service_sub_title;
        $about->save();
        return redirect()->back()->with('success','Service Diupdate');

    }
    public function updateBenefit(Request $request){
        $about = About::find(1);
        if ($request->hasFile('banefit_img')) {
            $headerImgPath = $request->file('banefit_img')->store('public/images/about');
            $about->banefit_img = Storage::url($headerImgPath);
            $about->save();
        }
        Benefit::truncate();
        foreach ($request->text as $value) {
            Benefit::create(['about_id'=>1,'text'=>$value]);
        }
        return redirect()->back()->with('success','Benefit diupdate');
    }
    public function serviceAdd(Request $request){
        // dd($request->all());
        $service = new Service();
        $service->about_id = 1;
        $headerImgPath = $request->file('image')->store('public/images/about');
        $service->image = Storage::url($headerImgPath);
        $service->title = $request->title;
        $service->desc = $request->service_sub_title;
        $service->save();
        return redirect()->back()->with('success','Service Baru Ditambahkan');
    }
    public function serviceUpdate(Request $request,$id){
        $service = Service::find($id);
        $service->title = $request->title;
        $service->desc = $request->service_sub_title;
        if ($request->hasFile('image')) {
            $headerImgPath = $request->file('image')->store('public/images/about');
            $service->image = Storage::url($headerImgPath);
        }
        $service->save();
        return redirect()->back()->with('success','Service Diupdate');
    }
    public function serviceDelete($id){
        $service = Service::find($id)->delete();
        return redirect()->back()->with('success','Service Dihapus');
    }
    public function quote(Request $request){
        // dd($request->all());
        $about = About::first();
        if ($request->hasFile('quote_by_img')) {
            $headerImgPath = $request->file('quote_by_img')->store('public/images/about');
            $about->quote_by_img = Storage::url($headerImgPath);
        }
        $about->quote_by_name = $request->quote_by_name;
        $about->quote_by_title = $request->quote_by_title;
        $about->quote = $request->quote;
        $about->save();
        return redirect()->back()->with('success','Quote Diupdate');
    }
    public function testiTitle(Request $request){
        $about= About::find(1);
        $about->testi_title = $request->testi_title;
        $about->testi_sub_title = $request->testi_sub_title;
        $about->save();
        return redirect()->back()->with('success','Testimoni Diupdate');
    }
    public function addTesti(Request $request){
        $testi = new Testimoni();
        $testi->about_id = 1;
        $testi->testi_name  = $request->testi_name;
        $testi->testi_title  = $request->testi_title;
        $testi->testimoni  = $request->testimoni;
        $headerImgPath = $request->file('testi_img')->store('public/images/about');
        $testi->testi_img = Storage::url($headerImgPath);
        $testi->save();
        return redirect()->back()->with('success','Testimoni Baru Ditambahkan');
    }
    public function editTesti(Request $request,$id){
        $testi = Testimoni::find($id);
        $testi->testi_name  = $request->testi_name;
        $testi->testi_title  = $request->testi_title;
        $testi->testimoni  = $request->testimoni;
        if ($request->hasFile('testi_img')) {
            $headerImgPath = $request->file('testi_img')->store('public/images/about');
            $testi->testi_img = Storage::url($headerImgPath);
        }
        $testi->save();
        return redirect()->back()->with('success','Testimoni Diupdate');
    }
    public function message(){
        $data['title'] = 'Message';
        $data['table'] = Contact::orderByDesc('id')->get();
        return view('admin.message',$data);
    }
}

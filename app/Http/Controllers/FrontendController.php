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
use League\CommonMark\Extension\Table\Table;

class FrontendController extends Controller
{
    public function index(){
        $data['app'] = DefaultSettings::first();
        $data['porto'] = Portofolio::orderByDesc('id')->where('status',1)->paginate(4);
        return view('frontend.index',$data);
    }
    public function about(){
        $data['app'] = DefaultSettings::first();
        $data['about'] = About::first();
        $data['benefit'] = Benefit::all();
        $data['service'] = Service::all();
        $data['testi']  = Testimoni::all();
        return view('frontend.about',$data);
    }
    public function contact(){
        $data['app'] = DefaultSettings::first();
        $data['about'] = About::first();
        $data['benefit'] = Benefit::all();
        $data['service'] = Service::all();
        $data['testi']  = Testimoni::all();
        return view('frontend.contact',$data);
    }
  
}

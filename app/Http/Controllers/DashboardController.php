<?php

namespace App\Http\Controllers;

use App\DefaultSettings;
use App\Order;
use App\OrderDetail;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $data['title'] = 'Dashboard';
        return view('dashboard',$data);
    }
    public function invoice($id){
        $data['order'] = Order::find($id);
        $data['app']   = DefaultSettings::first();
        $data['title'] = 'Invoice ' . $data['order']->trx;
        $data['detail'] = OrderDetail::where('order_id',$data['order']->id)->get();
        return view('admin.print.invoice',$data);
    }
     public function nota($id){
        $data['order'] = Order::find($id);
        $data['app']   = DefaultSettings::first();
        $data['title'] = 'Invoice ' . $data['order']->trx;
        $data['detail'] = OrderDetail::where('order_id',$data['order']->id)->get();
        return view('admin.print.nota',$data);
    }
}

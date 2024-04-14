<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $data['title'] = 'Order';
        return view('admin.order',$data);
    }
    public function orderForm(){
        $data['title'] ='Add Order';
        return view('admin.order-create',$data);
    }
}


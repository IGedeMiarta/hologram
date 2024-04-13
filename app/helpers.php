<?php

use Carbon\Carbon;
use Illuminate\Routing\Route;

function is_active($routeName) {
    return request()->routeIs($routeName) ? 'active' : '';
}

function active_class($path, $active = 'active') {
  return call_user_func_array('Request::is', (array)$path) ? $active : '';
}

function is_active_route($path) {
  return call_user_func_array('Request::is', (array)$path) ? 'true' : 'false';
}

function show_class($path) {
  return call_user_func_array('Request::is', (array)$path) ? 'show' : '';
}
function route_active_class($routeName, $active = 'active') {
    return request()->routeIs($routeName) ? $active : '';
}

function route_is_active_route($routeName) {
    return request()->routeIs($routeName) ? 'true' : 'false';
}

function route_show_class($routeName) {
    return request()->routeIs($routeName) ? 'show' : '';
}


function getAmount($num) {
    // Remove any commas from the string
    $num = str_replace(',', '', $num);
    
    // Remove any non-numeric characters except for periods
    $num = preg_replace('/[^0-9.]/', '', $num);
    
    // Convert the string to a float, and then to an integer
    $amount = (int) round((float) $num);
    
    return $amount;
}
function rp($num){
  return 'Rp '.number_format($num,2,'.',',');
}
function dateFormat($d){
  return date('d M Y',strtotime($d));
}


function getMonthStartEndDates($monthOffset) {
    $startOfMonth = Carbon::now()->startOfMonth()->subMonths($monthOffset);
    $endOfMonth = Carbon::now()->endOfMonth()->subMonths($monthOffset);
    return [$startOfMonth, $endOfMonth];
}

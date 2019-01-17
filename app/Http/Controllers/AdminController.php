<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class AdminController extends Controller
{
    public function index()
    {
        $order = Order::all();
        // dd($order);
        return view('dashboard.index', [
            'order' => $order,
        ]);
    }
}

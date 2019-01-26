<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Service;
use App\Member;

class AdminController extends Controller
{
    public function index()
    {
        $order = Order::get();
        $service = Service::with('produk')->get();
        $member = Member::get();
        // dd($service);
        return view('dashboard.index', [
            'order'     => $order,
            'service'   => $service,
            'member'    => $member
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index() {
        $orders = Order::orderBy("id","desc")->paginate(10);
        return view('user.orders.index');
    }

    public function create() {
        return view('user.orders.create');
    }

    public function store(Request $request) {
        return redirect()->route('user.orders.index');
    }

    public function edit($id) {
        // $order = Order::find($id);
        return view('user.orders.edit', compact('order'));
    }

    public function show($id) {
        return view('user.orders.show');
    }
    
    

}

<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Product;
use App\Models\Order;

class AdminController extends Controller
{
   public function index(){
    $totalProducts = Product::count();
    $totalOrders = Order::count();
    
    return Inertia::render('Admin/Dashboard', [
        'totalProducts' => $totalProducts,
        'totalOrders' => $totalOrders,
    ]);
   }

}

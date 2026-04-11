<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Inertia\Inertia;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $query = Order::with(['userAddress', 'creator', 'items'])
            ->latest();

        // Filter by status
        if ($request->status) {
            $query->where('status', $request->status);
        }

        // Search by order ID or customer name
        if ($request->search) {
            $query->where(function($q) use ($request) {
                $q->where('id', 'like', '%' . $request->search . '%')
                  ->orWhereHas('creator', function($userQuery) use ($request) {
                      $userQuery->where('name', 'like', '%' . $request->search . '%')
                                ->orWhere('email', 'like', '%' . $request->search . '%');
                  });
            });
        }

        $orders = $query->paginate(15)->withQueryString();

        // Add order_number to each order
        $orders->getCollection()->transform(function ($order) {
            $order->order_number = $order->orderNumber;
            return $order;
        });

        return Inertia::render('Admin/Order', [
            'orders' => $orders,
            'filters' => $request->only(['status', 'search']),
            'statistics' => [
                'total' => Order::count(),
                'pending' => Order::where('status', 'pending')->count(),
                'processing' => Order::where('status', 'processing')->count(),
                'shipped' => Order::where('status', 'shipped')->count(),
                'delivered' => Order::where('status', 'delivered')->count(),
                'cancelled' => Order::where('status', 'cancelled')->count(),
                'total_revenue' => Order::where('status', 'delivered')->sum('total_price'),
            ]
        ]);
    }
    public function store(Request $request)
{
    $request->validate([
        'total_price' => 'required|numeric',
        'user_address_id' => 'required|exists:user_addresses,id',
    ]);

    $order = Order::create([
        'total_price' => $request->total_price,
        'status' => 'pending',
        'session_id' => session()->getId(),
        'user_address_id' => $request->user_address_id,
        'created_by' => Auth::id(),
    ]);

    return redirect()->route('orders.index'); // or wherever you want
}

    public function show($id)
    {
        $order = Order::with(['userAddress', 'creator', 'items.product.product_images'])
            ->findOrFail($id);

        // Add order_number
        $order->order_number = $order->orderNumber;
        
        return Inertia::render('Admin/Orders/Show', [
            'order' => $order
        ]);
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,processing,shipped,delivered,cancelled'
        ]);

        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->updated_by = auth()->id();
        $order->save();

        return back()->with('success', 'Order status updated successfully!');
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->items()->delete();
        $order->delete();

        return back()->with('success', 'Order deleted successfully!');
    }
}
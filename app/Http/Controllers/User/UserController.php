<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Foundation\Application;
use App\Models\Product;
use App\Models\Order;

class UserController extends Controller
{
     public function index()
    {
        $products = Product::with('brand', 'category', 'product_images')->orderBy('id','desc')->limit(8)->get();
        return Inertia::render('User/Index', [
            'products'=>$products,
            'canLogin' => app('router')->has('login'),
            'canRegister' => app('router')->has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
        ]);
    }

    public function orders()
    {
        $orders = Order::with('items.product.product_images', 'userAddress')
            ->where('created_by', auth()->id())
            ->orderBy('created_at', 'desc')
            ->get();
        
        return Inertia::render('User/Orders', [
            'orders' => $orders,
        ]);
    }

    public function orderDetail($orderId)
    {
        $order = Order::with('items.product.product_images', 'userAddress')
            ->where('id', $orderId)
            ->where('created_by', auth()->id())
            ->firstOrFail();
        
        return Inertia::render('User/OrderDetail', [
            'order' => $order,
        ]);
    }

    public function orderNow(Request $request, $productId)
    {
        $user = auth()->user();
        $product = Product::findOrFail($productId);

        // Validate the request
        $validated = $request->validate([
            'quantity' => 'required|integer|min:1',
            'address' => 'required|array',
        ]);

        // Check if product is available
        if (!$product->is_published || !$product->in_stock) {
            return response()->json(['error' => 'This product is not available'], 422);
        }

        try {
            $newAddress = $validated['address'];

            // Save or update user address
            if ($newAddress['adresse1'] ?? null) {
                // Unset previously main addresses
                $user->user_address()->where('isMain', 1)->update(['isMain' => 0]);
                
                // Create new address
                $address = new \App\Models\UserAddress();
                $address->adresse1 = $newAddress['adresse1'];
                $address->state = $newAddress['state'] ?? null;
                $address->city = $newAddress['city'] ?? null;
                $address->country_code = $newAddress['country_code'] ?? null;
                $address->type = $newAddress['type'] ?? 'shipping';
                $address->user_id = $user->id;
                $address->isMain = 1;
                $address->save();
                $mainAddress = $address;
            } else {
                // Get existing main address
                $mainAddress = $user->user_address()->where('isMain', 1)->first();
                if (!$mainAddress) {
                    return response()->json(['error' => 'Please provide a shipping address'], 422);
                }
            }

            // Create order
            $order = new Order();
            $order->status = 'pending';
            $order->total_price = $product->price * $validated['quantity'];
            $order->session_id = \Illuminate\Support\Str::uuid();
            $order->created_by = $user->id;
            $order->user_address_id = $mainAddress->id;
            $order->save();

            // Create order item
            \App\Models\OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'quantity' => $validated['quantity'],
                'unit_price' => $product->price,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Order created successfully',
                'order_id' => $order->id,
            ], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create order: ' . $e->getMessage()], 500);
        }
    }
}

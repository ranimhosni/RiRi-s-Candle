<?php

namespace App\Http\Controllers\User;

use App\Helper\Cart;
use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Inertia\Inertia;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CheckoutController extends Controller

{
    public function __construct()
{
    $this->middleware('auth');
}
    public function store(Request $request)
    {
        $user = $request->user();

        // Validate required fields
        $request->validate([
            'total' => 'required|numeric|min:0',
            'address' => 'required|array',
        ]);

        $newAddress = $request->address;
        
        // Save or update user address
        if ($newAddress['name'] ?? null) {
            // Unset previously main addresses
            UserAddress::where(['user_id' => $user->id, 'isMain' => 1])->update(['isMain' => 0]);
            
            // Create new address
            $address = new UserAddress();
            $address->name = $newAddress['name'];
            $address->last_name = $newAddress['last_name'] ?? null;
            $address->address = $newAddress['address'] ?? null;
            $address->phone = $newAddress['phone'] ?? null;
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

        // Create order with user address
        $order = new Order();
        $order->status = 'pending';
        $order->total_price = $request->total;
        $order->session_id = Str::uuid();
        $order->created_by = $user->id;
        $order->user_address_id = $mainAddress->id;
        $order->save();

        // Create order items from cart
        $cartItems = CartItem::where('user_id', $user->id)->get();
        
        if ($cartItems->isEmpty()) {
            $order->delete();
           return redirect()->back()->with('error', 'Your cart is empty');
        }

        foreach ($cartItems as $cartItem) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'quantity' => $cartItem->quantity,
                'unit_price' => $cartItem->product->price,
            ]);
        }

        // Clear cart items from database
        CartItem::where('user_id', $user->id)->delete();

        // Clear cart items from cookies
        Cart::setCookieCartItems([]);

        return redirect()->route('orders.index')
    ->with('success', 'Order created successfully!');
    }
}
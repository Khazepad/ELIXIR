<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;

class CartController extends Controller
{
    public function addToCart(Request $request, Product $product)
    {
        $quantity = $request->input('quantity', 1);
        
        // Here you would typically add the item to the cart
        // This is a simplified example using session
        $cart = $request->session()->get('cart', []);
        
        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $quantity;
        } else {
            $cart[$product->id] = [
                'name' => $product->product_name,
                'price' => $product->price,
                'quantity' => $quantity
            ];
        }
        
        $request->session()->put('cart', $cart);
        
        return response()->json(['message' => 'Product added to cart successfully']);
    }

    // this method retreives the cart from the session and displays it
    public function index(Request $request)
    {
        $cart = $request->session()->get('cart', []);
        $total = 0;

        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return view('cart.index', compact('cart', 'total'));
    }
    // kwaon ang session sa cart, ipang kalkyu ang total price
    public function checkout()
    {
        $cart = session('cart');
        $total = 0;

        if ($cart) {
            foreach ($cart as $item) {
                $total += $item['price'] * $item['quantity'];
            }
        }

        return view('cart.checkout', compact('cart', 'total'));
    }

    // validate ang data gikan sa form ug ipang save sa database
    public function placeOrder(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'postal_code' => 'required|string|max:20',
        ]);

        $cart = session('cart');
        $total = array_sum(array_column($cart, 'price'));

        $order = Order::create([
            'user_id' => auth()->id(),
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'address' => $validatedData['address'],
            'city' => $validatedData['city'],
            'postal_code' => $validatedData['postal_code'],
            'total_amount' => $total,
            'payment_status' => 'pending',
            'shipping_status' => 'pending',
        ]);

        foreach ($cart as $id => $details) {
            $order->items()->create([
                'product_id' => $id,
                'product_name' => $details['name'],
                'quantity' => $details['quantity'],
                'price' => $details['price']
            ]);
        }

        session()->forget('cart');

        return redirect()->route('order.receipt', $order->id);
    }
// kani kay ang receipt 
    public function showReceipt(Order $order)
    {
        return view('cart.receipt', compact('order'));
    }

    public function remove(Request $request, $productId)
    {
        $cart = $request->session()->get('cart', []);

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            $request->session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Item removed from cart');
        }

        return redirect()->back()->with('error', 'Item not found in cart');
    }

    public function update(Request $request, $id)
    {
        $cart = $request->session()->get('cart', []);
        
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $request->input('quantity');
            $request->session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Cart updated successfully');
        }

        return redirect()->back()->with('error', 'Item not found in cart');
    }
}

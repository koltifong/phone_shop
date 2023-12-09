<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;

class StoreController extends Controller
{/**
     * Write code on Method
     *
     * @return response()
     */
    public function cart()
    {
        return view('frontend.cart');
    }

     /**
     * Write code on Method
     *
     * @return response()
     */
    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
          
        $cart = session()->get('cart', []);
  
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
            	"product_id"=>$product->id,
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }
          
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }
    public function checkout()
    {
        $cart = session()->get('cart');

        $totalAmount = 0;
        foreach ($cart as $item) {
            $totalAmount += $item['price'] * $item['quantity'];
        }
        $order = new Order();
        //$order->user_id = Auth::user()->id;
        $order->user_id = 1;
        $order->amount = $totalAmount;
        $order->save();
        foreach ($cart as $item) {

            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $item['product_id'];
            $orderItem->quantity = $item['quantity'];
            $orderItem->amount = $item['price'];
            $orderItem->save();
        }
        session()->put('cart', []);
        return redirect()->back()->with('success', 'Checkout successfully!');
    }
    public function stripe()
    {
        // checkout button click
        
        $cart = session()->get('cart');
        $totalAmount = 0;
        foreach ($cart as $item) {
            $totalAmount += $item['price'] * $item['quantity'];
        }
        return view('frontend.stripe')->with('total',$totalAmount);
    }
    public function stripePost(Request $request)
    {
        $cart = session()->get('cart');
    
        $totalAmount = 0;
        foreach ($cart as $item) {
            $totalAmount += $item['price'] * $item['quantity'];
        }
        //======================
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        \Stripe\Charge::create ([
                "amount" => $totalAmount * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from Laravel Piseth"
        ]);
        //======================
        $order = new Order();
        //$order->user_id = Auth::user()->id;
        $order->user_id = 1;
        $order->amount = $totalAmount;
        $order->save();
        foreach ($cart as $item) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $item['product_id'];
            $orderItem->quantity = $item['quantity'];
            $orderItem->amount = $item['price'];
            $orderItem->save();
        }
        session()->put('cart', []);
        return redirect()->back()->with('success', 'Payment successful!');
    }
}

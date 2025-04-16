<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\View;
class CartController extends Controller
{
    public function getCart(Request $request){
        $cartItems = Cart::content();
        $total = Cart::total();
        $count = Cart::count();
    
        $html = View::make('frontend.carts.cart-preview', [
            'cartItems' => $cartItems,
            'total' => $total,
            'count' => $count
        ])->render();
    
        return $html;
    }
    public function index()
    {
        $cartItems = Cart::content();
        $total = Cart::total();
        return view('frontend.carts.cart', compact('cartItems', 'total'));
    }
    public function update(Request $request)
    {
        $rowId = $request->rowId;
        Cart::update($rowId, $request->qty);
        $updatedItem = Cart::get($rowId);
        $price_item = number_format($updatedItem->price * $updatedItem->qty);
        return response()->json([
            'success' => true,
            'count' => Cart::count(),
            'total' => Cart::total(),
            'price_item'=>$price_item
        ]);
    }

    public function add(Request $request){
        $product = Product::find($request->id);
        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => $request->qty,
            'price' => $product->sale_price,
            'weight' => 1,
            'options' => [
                'image' => $product->avatar->webp_path,
                'size'=> $request->size,
                'color' => $request->color,
                'category' => $product->category->name
            ]
        ]);
        return response()->json([
                                    'status' => true,
                                    'total_item' => Cart::count(),
                                ]);
    }

    // Xóa sản phẩm
    public function remove(Request $request)
    {
        $rowId = $request->rowId;
        Cart::remove($rowId);
       
        return response()->json([
            'success' => true,
            'count' => Cart::count(),
            'price_item' => 0,
        ]);
    }

    public function checkout(Request $request){
        $cartItems = Cart::content();
        $total = Cart::total();
        return view('frontend.carts.checkout', compact('cartItems', 'total'));
    }

    // Xóa toàn bộ giỏ hàng
    public function clear()
    {
        Cart::destroy();
        return redirect('/cart');
    }

    public function processCart(Request $request){
        $cartItems = Cart::content();
        $order =  Order::create([
            'customer_address' => $request->customer_address,
            'customer_phone' => $request->customer_phone,
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'note' => $request->note,
            'total'=> str_replace(',', '', Cart::total())
        ]);
        foreach ($cartItems as $key => $value) {
            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $value->id,
                'qty' => $value->qty,
                'product_name' => $value->name,
                'price' => $value->price,
                'size'=> $value->options->size,
                'color' => $value->options->color
            ]);
        }
        Cart::destroy();
        return redirect()->route('home')->with('success', 'Đặt hàng thành công');
    }
}

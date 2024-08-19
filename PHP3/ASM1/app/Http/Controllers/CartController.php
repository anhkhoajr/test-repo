<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart()
    {
        $cart = session()->get('cart', []);
    
        // Calculate subtotal
        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['soluong'] * $item['product_price'];
        }
        $ship = 10;
        $total = $subtotal + $ship; 
    
        // Pass the subtotal and total to the view
        return view('cart', compact('cart', 'subtotal', 'total'));
    }
    

    public function addCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer',
            'soluong' => 'required|integer|min:1|max:10',
            'product_name' => 'required|string',
            'product_price' => 'required|numeric',
            'product_img' => 'required|string',
        ]);

        $data = $request->only('product_id', 'soluong', 'product_name', 'product_price', 'product_img');

        $cart = session()->get('cart', []);

        if (isset($cart[$data['product_id']])) {
            $cart[$data['product_id']]['soluong'] += $data['soluong'];
        } else {
            $cart[$data['product_id']] = [
                'product_id' => $data['product_id'],
                'product_name' => $data['product_name'],
                'product_price' => $data['product_price'],
                'product_img' => $data['product_img'],
                'soluong' => $data['soluong'],
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('cart')->with('success', 'Sản phẩm được thêm vào giỏ hàng thành công!');
    }
    public function removeFromCart($productId)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
        }

        session()->put('cart', $cart);

        return redirect()->route('cart')->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng thành công!');
    }
}

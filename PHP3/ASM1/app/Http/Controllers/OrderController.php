<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OrderItem;
use App\Models\products;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function showcheckout()
    {
        $cart = session()->get('cart', []);
        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['soluong'] * $item['product_price'];
        }
        $ship = 10;
        $total = $subtotal + $ship;
        return view('checkout', compact('cart', 'subtotal', 'total', 'ship'));
    }

    public function checkout(Request $request)
    {
        $order = new Order();
        $order->user_id = (Auth::check()) ? Auth::user()->id : null;
        $order->user_name = $request->name;
        $order->user_email = $request->email;
        $order->user_phone = $request->phone;
        $order->user_address = $request->address;
        $order->tatol_price = 0;
        $order->tatol_quantity = 0;
        $order->save();
        if (session()->has('cart') && count(session('cart')) > 0) {
            foreach (session('cart') as $sp) {
                $order_detail = new OrderDetail();
                $order_detail->order_id = $order->id;
                $order_detail->product_id = $sp['product_id'];
                $order_detail->product_name = $sp['product_name'];
                $order_detail->price = $sp['product_price'];
                $order_detail->quantity = $sp['soluong'];
                $order_detail->save();

                $order->tatol_price += $order_detail->price * $order_detail->quantity;
                $order->tatol_quantity += $order_detail->quantity;
            }
            $order->save();

            // Xóa giỏ hàng sau khi đặt hàng thành công
            session()->forget('cart');

            // Chuyển hướng về trang giỏ hàng (cart)
            return redirect()->route('ordershow', $order->id)->with('success', 'Đặt hàng thành công!');
        } else {
            // Xử lý trường hợp giỏ hàng rỗng
            return redirect()->route('showcheckout')->with('error', 'Giỏ hàng của bạn hiện đang trống.');
        }
    }
    public function show(Order $order)
    {
        // Lấy thông tin đơn hàng và các chi tiết đơn hàng
        $orderDetails = $order->orderDetails; // Đảm bảo bạn đã định nghĩa quan hệ trong model Order
    
        // Trả về view hiển thị chi tiết đơn hàng
        return view('ordershow', compact('order', 'orderDetails'));
    }
    
}

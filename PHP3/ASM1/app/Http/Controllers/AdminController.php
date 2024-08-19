<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\products;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    protected $model;
    public function __construct(products $model)
    {
        $this->model = $model;
    }

    function index()
    {
        return view('admin.index');
    }

    function addproduct()
    {
        $categories = $this->model->ct_all();
        return view('admin.addproduct', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->only(['id','name', 'description', 'price', 'category_id']);

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img'), $imageName);
            $data['img'] = $imageName;
        }

        products::create($data);
        return redirect()->route('productlist')->with('success', 'Đã thêm sản phẩm thành công!');
    }

    public function destroy($id)
    {
        $product = products::findOrFail($id);
        if ($product->img) {
            Storage::delete('public/img/' . $product->img);
        }
        $product->delete();
        return redirect()->route('productlist')->with('success', 'Sản phẩm đã được xóa thành công!');
    }

    public function edit($id)
    {
        $product = products::findOrFail($id);
        $categories = Category::all();
        return view('admin.editProduct', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $product = products::findOrFail($id);
        $data = $request->only(['name', 'description', 'price', 'category_id']);

        if ($request->hasFile('img')) {
            $imagePath = $request->file('img')->store('img', 'public');
            $data['img'] = $imagePath;
        }
        $product->update($data);
        return redirect()->route('productlist')->with('success', 'Sản phẩm được cập nhật thành công!');
    }

    function categorys()
    {
        $categories = $this->model->ct_all();
        return view('admin.categorys', compact('categories'));
    }

    public function productlist(Request $request)
    {
        $searchTerm = $request->input('search');
        $product = products::when($searchTerm, function ($query) use ($searchTerm) {
            $query->where('name', 'like', '%' . $searchTerm . '%');
        })->paginate(10);

        return view('admin.productlist', compact('product'));
    }

    public function users(Request $request)
    {
        $search = $request->query('search');
        $users = User::when($search, function ($query, $search) {
            return $query->where('name', 'LIKE', "%{$search}%")
                         ->orWhere('email', 'LIKE', "%{$search}%");
        })->paginate(10);
        return view('admin.users', compact('users'));
    }

    public function create()
    {
        return view('admin.addusers');
    }

    public function storeuser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:5|confirmed',
            'role' => 'required|in:0,1',
        ]);
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->role = $request->input('role');
        $user->save();

        return redirect()->route('users')->with('success', 'Người dùng đã được thêm thành công!');
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
    
        return redirect()->route('users')->with('success', 'Người dùng đã được xóa thành công!');
    }

    public function orders()
    {
        $orders = Order::with('orderDetails')->get();
        return view('admin.orders', compact('orders'));
    }
    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|string',
        ]);

        // Log the status being updated for debugging
        Log::info('Updating order status', ['order_id' => $order->id, 'status' => $request->status]);

        $order->status = $request->status;
        $order->save();

        return redirect()->back()->with('success', 'Trạng thái đơn hàng được cập nhật thành công.');
    }
    public function deleteOrder(Order $order)
    {
        $order->delete();
        return redirect()->back()->with('success', 'Đơn hàng đã được xóa thành công.');
    }
    public function show($id)
    {
        $order = Order::with('orderDetails')->findOrFail($id);
        return view('admin.orderdetails', compact('order'));
    }

}



<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function login(){
    
    return view('login');
    }
    public function postlogin(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
    
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            // Đăng nhập thành công, lấy người dùng hiện tại
            $user = Auth::user();
    
            // Kiểm tra vai trò của người dùng
            if ($user->role == 1) {
                return redirect()->route('admin');
            } elseif ($user->role == 0) {
                return redirect()->route('home');
            }
    
            // Xử lý cho các vai trò khác (nếu có)
            return redirect()->route('home'); // Hoặc trang mặc định nào đó
        }
    
        // Đăng nhập không thành công, chuyển hướng lại trang đăng nhập với thông báo lỗi
        session()->put('message', 'Email hoặc mật khẩu không đúng!');
        return back();
    }
    
    function register(){

    return view('register');
    }
    function postregister(Request $request){
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $confirm_password = $request->input('confirm_password');

        if($password != $confirm_password){
            session()->put('message', 'Mật Khẩu Nhập Lại Không Trùng Khớp!');
            return back();
        }

        $user = User::where('email', $email)->first();
        if(isset($user)){
            session()->put('message', 'Email đã tồn tại, Không thể đăng ký!');
            return back();
        }
        
        $hashedPassword = Hash::make($password);

        $user = New User();

        $user->name = $name;
        $user->email = $email;
        $user->password = $hashedPassword;
        $user->save();

        return redirect()->route('login')->with('success', 'Bạn đã đăng ký thành công!');
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PayController extends Controller
{
    public function ViewPayment()
    {
        // Logic của bạn ở đây, ví dụ trả về một view
        return view('thanhtoan.thanhtoan');
    }
}

<?php

namespace App\Http\Controllers;

use App\Mail\VerificationMail;
use App\Models\VerificationCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class VerificationCodeController extends Controller
{
    public function generate(Request $request)
    {

        $code = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);

        return response()->json(['message' => 'Verification code generated', 'code' => $code]);
    }

    public function create()
    {
        return view('create_code');
    }
}

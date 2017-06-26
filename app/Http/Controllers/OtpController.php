<?php

namespace App\Http\Controllers;

use App\Otp;
use Illuminate\Http\Request;
use LaravelMsg91;

class OtpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('send');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createotp()
    {
        return mt_rand(100000, 999999);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeotp($key, $mobile)
    {
        $otp = new Otp;
        $otp->mobile = $mobile;
        $otp->otp = $key;
        $otp->save();
    }

    public function sendotp(Request $request)
    {
        $otp = $this->createotp();
        $this->storeotp($otp, $request->mobile);
        $mobile = '91' . $request->mobile;
        $result = LaravelMsg91::message($mobile, 'Welcome to Eezy Rental. Your OTP is ' . $otp);
        return response($result->type);
        $html = view('verify')->render();
        return response()->json(['success' => true, 'html' => $html]);
    }

    // public function test()
    // {
    //     $result = LaravelMsg91::message(131313311234, 'Welcome to Eezy Rental. Your OTP is ');
    //     var_dump($result->type);
    // }

    // public function verify()
    // {
    //     return view('verify');
    // }

    public function verifyotp(Request $request)
    {
        $otp = Otp::where('otp', $request->otp)->first();
        if(is_null($otp))
        {
            $html = view('message')->with('mssg', "Failed")->with('reason', 'OTP did not match ')->render();
            return response()->json(['html' => $html]);
        }
        else {
            $html = view('message')->with('mssg', "Success")->with('reason', 'Your number '. $otp->mobile . ' is verified')->render();
            $otp->delete();
            return response()->json(['html' => $html]);
        }
    }
}
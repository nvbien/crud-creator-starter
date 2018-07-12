<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function setTimezoneLocal(Request $request){
        if($request->has('offset') && $request->input('offset') != ''){
            session(['offset' => $request->input('offset')]);
            return response()->json([
                'success' => true,
                'message' => 'Successfully.'
            ]);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'False.'
            ]);
        }
    }
}

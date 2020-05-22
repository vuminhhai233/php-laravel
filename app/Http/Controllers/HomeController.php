<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth,DB,DateTime;
use App\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function getprofile(){
        $order = DB::table('orders')->where('user_id','=',Auth::user()->id)->get();
        return view('profile',['data'=>$order]);
        }
        public function geteditprofile(){
            $id = Auth::user()->id;
            $data = User::where('id',$id)->first();
            return view('profile_edit',['data'=>$data]);
        }
        public function posteditprofile(Request $request){
            $id = Auth::user()->id;
            $data = User::FindOrFail($id);
            $data->name = $request->name;
            if ($request->password !='') {
                $data->password = bcrypt($request->password);
            }        
            $data->phone = $request->phone;
            $data->address = $request->address;
            $data->updated_at = new datetime;
            $data->save();
            return redirect(route('info'))->with(['flash_level'=>'result_msg','flash_massage'=>' Đã cập nhật thành công !']);
        }
}

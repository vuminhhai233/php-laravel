<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Admins;
use Datetime;
class AdminController extends Controller
{
    public function getIndex()
    {
        return view('admin.home');
    }
    public function getAddUserAdmin(){
        return view('admin.member.add');
    }
    public function postAddUserAdmin(Request $request){
        $data = new Admins();
        $data->name = $request->name;
        $data->email = $request->email;
        if ($request->password !='') {
            $data->password = bcrypt($request->password);
        }        
        $data->level = $request->sltlevel;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->updated_at = new datetime;
        $data->save();
        return redirect('admin/users/list')
        ->with(['flash_level'=>'result_msg','flash_massage'=>' Đã thêm thành công !']);  
    }
    public function getListUserAdmin(){
        $data = Admins::paginate(10);
    	return view('admin.member.list',['data'=>$data]);
    }
    public function getEditUserAdmin($id){
        $data = Admins::FindOrFail($id);
      return view('admin.member.edit',['data'=>$data]);
    }
    public function postEditUserAdmin($id, Request $request){
        $data = Admins::FindOrFail($id);
        $data->name = $request->name;
        $data->email = $request->email;
        if ($request->password !='') {
            $data->password = bcrypt($request->password);
        }        
        $data->level = $request->sltlevel;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->updated_at = new datetime;
        $data->save();
        return redirect('admin/users/list')
        ->with(['flash_level'=>'result_msg','flash_massage'=>' Đã sửa thành công !']);  
    }
    public function getDelUserAdmin($id){
        if (Auth::guard('admin')->user()->level == 100) {
            $dt = Admins::FindOrFail($id);
            $dt->delete();
            return redirect('admin/users/list')
            ->with(['flash_level'=>'result_msg','flash_massage'=>' Đã xóa thành công !']);
          } else{
            echo '<script type="text/javascript">
                  alert("Bạn không có quyền thực hiện thao tác này !");                
                   window.location = "';
                   echo route('list-user');
               echo '";
            </script>';
          } 
    }
   
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Order;
use App\Model\OrderDetail;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function getlist(){
        $data = Order::paginate(10);
    	return view('admin.orders.list',['data'=>$data]);
    }
    public function getdel($id){
        $order = Order::where('id',$id)->first();
    	if ($order->status !=0) {
    		return redirect()->back()
    		->with(['flash_level'=>'result_msg','flash_massage'=>'Không thể hủy đơn hàng số: '.$id.' vì đã được xác nhận hoặc đã thực hiện xong!']);
    	} else {
    		$order = Order::find($id);
        	$order->delete();
        	return redirect('admin/order/list')
         	->with(['flash_level'=>'result_msg','flash_massage'=>'Đã hủy bỏ thành công đơn hàng số:  '.$id.' !']);
     	}
    }
    public function getdetail($id)
    {
        $order = Order::where('id',$id)->first();
    	$data = DB::table('orders_details')
    			 	->join('products', 'products.id', '=', 'orders_details.product_id')
    			 	->where('order_id',$id)
    			 	->get();
    	return view('admin.orders.detail',['data'=>$data,'order'=>$order]);
        
    }
    public function postdetail($id, Request $request)
    {
        $order = Order::find($id);
    	$order->status = $request->sltlevel;
    	$order->save();
    	return redirect('admin/order/list')
      	->with(['flash_level'=>'result_msg','flash_massage'=>' Đã xác nhận đơn hàng thành công !']);    	
    }

}

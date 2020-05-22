<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\Product;
use App\Model\Order;
use App\Model\OrderDetail;
use Cart;
use Illuminate\Support\Facades\Auth;
use DateTime;
class PageController extends Controller
{
    public function getindex(){
        $mobile = DB::table('products')
        ->join('category', 'products.cate_id', '=', 'category.id')
        ->join('product_detail', 'product_detail.product_id', '=', 'products.id')
        ->where('category.parent_id','=','1')
        ->select('products.*','product_detail.cpu','product_detail.ram','product_detail.screen','product_detail.vga','product_detail.storage','product_detail.exten_memmory','product_detail.cam1','product_detail.cam2','product_detail.sim','product_detail.connect','product_detail.battery','product_detail.operatingsystem')
        ->orderBy('products.created_at','desc')
        ->paginate(9);
        $lap = DB::table('products')
        ->join('category', 'products.cate_id', '=', 'category.id')
        ->join('product_detail', 'product_detail.product_id', '=', 'products.id')
        ->where('category.parent_id','=','2')
        ->select('products.*','product_detail.cpu','product_detail.ram','product_detail.screen','product_detail.vga','product_detail.storage','product_detail.exten_memmory','product_detail.cam1','product_detail.cam2','product_detail.sim','product_detail.connect','product_detail.battery','product_detail.operatingsystem')
        ->paginate(9);

        return view('index',['mobile'=>$mobile,'laptop'=>$lap]);
}
    public function getAddCart($id){
        $product=Product::find($id);
        Cart::add(['id' => $id, 'name' => $product->name, 'qty' => 1, 'price' => $product->price,'options'=>['img' => $product->images]]);
        $data=Cart::content();
//        dd($data);
//        die();
//        
          return back();
        //   return redirect(route('detail-cart'));
    }
    public function getPayCart($id){
        $product=Product::find($id);
        Cart::add(['id' => $id, 'name' => $product->name, 'qty' => 1, 'price' => $product->price,'options'=>['img' => $product->images]]);
        return redirect(route('detail-cart'));
    }
    public function getDeleteCart($id){
        if($id=='all'){
            Cart::destroy();
            return redirect(route('index'));
        }else{
            Cart::remove($id);
            return back();
        }
    }
   
    public function ShowCart(){
        if (Cart::count()!=0){
            $data['total'] =Cart::total();
            $test=Cart::content();
            return view('details.cart',$data);
        }else{
            return redirect(route('index'));
        }


    }
    public function UpdateCart(Request $request){
        $id = $request->rowId;
        $qty = $request->qty;

        Cart::update($id,$qty);
        $data = Cart::content();
      
        return json_encode($data);
     
    }
    public function showbill(){
        
        if (Auth::guest()) {
            return redirect('login');
        } else {
            return view ('details.order')
            ->with('slug','Xác nhận');
        }        
    }
    public function postbill(Request $request){
        $order = new Order();
        $total =0;
        foreach (Cart::content() as $row) {
            $total = $total + ( $row->qty * $row->price);
        }
        $order->user_id = Auth::user()->id;
        $order->qty = Cart::count();
        $order->sub_total = floatval($total);
        $order->total =  floatval($total);
        $order->note = $request->txtnote;
        $order->status = 0;
        $order->type = 'cod';
        $order->created_at = new datetime;
        $order->save();
        $order_id =$order->id;

        foreach (Cart::content() as $row) {
           $detail = new OrderDetail();
           $detail->product_id = $row->id;
           $detail->qty = $row->qty;
           $detail->order_id = $order_id;
           $detail->created_at = new datetime;
           $detail->save();
        }
        Cart::destroy();   
        return redirect()->route('index')
        ->with(['flash_level'=>'result_msg','flash_massage'=>' Đặt hàng thành công !']);    
    }
    public function getcate($cate){
        if ($cate == 'dien-thoai') {
            // mobile
            $mobile = DB::table('products')
                ->join('category', 'products.cate_id', '=', 'category.id')
                ->join('product_detail', 'product_detail.product_id', '=', 'products.id')
                ->where('category.parent_id','=','1')
                ->select('products.*','product_detail.cpu','product_detail.ram','product_detail.screen','product_detail.vga','product_detail.storage','product_detail.exten_memmory','product_detail.cam1','product_detail.cam2','product_detail.sim','product_detail.connect','product_detail.battery','product_detail.operatingsystem')
                ->paginate(12);
    		return view('category.mobile',['data'=>$mobile]);
    	} 
        elseif ($cate == 'lap-top') {
            // mobile
            $laptop = DB::table('products')
                ->join('category', 'products.cate_id', '=', 'category.id')
                ->join('product_detail', 'product_detail.product_id', '=', 'products.id')
                ->where('category.parent_id','=','2')
                ->select('products.*','product_detail.cpu','product_detail.ram','product_detail.screen','product_detail.vga','product_detail.storage','product_detail.exten_memmory','product_detail.cam1','product_detail.cam2','product_detail.sim','product_detail.connect','product_detail.battery','product_detail.operatingsystem')
                ->paginate(12);
            return view('category.laptop',['data'=>$laptop]);
        }
    }
    public function getdetail($cate,$id,$slug)
    {
        if ($cate =='dien-thoai')
        {   
            $mobile= Product::where('id',$id)->first();
            $detail = Product::find($mobile->id)->detailproduct;
            // echo "<pre>";
            // print_r($detail);
            // echo "</pre>";
         
            if (empty($mobile))
            {
                return redirect()->route('index');
            } 
            else 
            {   
                // print_r($mobile);
                return view ('details.mobile',['data'=>$mobile,'detail'=>$detail,'slug'=>$slug]);
            }
        }
        elseif ($cate =='lap-top') 
        {
            $laptop = Product::where('id',$id)->first();
            $detail = Product::find($laptop->id)->detailproduct;
            if (empty($laptop))
            {
                return redirect()->route('index');
            } 
            else 
            {
                return view ('details.laptop',['data'=>$laptop,'detail'=>$detail,'slug'=>$slug]);
            }
        }
    }}
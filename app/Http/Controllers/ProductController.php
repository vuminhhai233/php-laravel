<?php

namespace App\Http\Controllers;


use App\Model\Category;
use App\Model\Product;
use App\Model\Product_detail;
use App\Model\Product_img_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use DateTime;
use File;


class ProductController extends Controller
{
    public function getAddProduct()
    {
        $data = Category::all();
        $product = Product::all();
        return view('admin.product.add_pro', ['data' => $data, 'product' => $product]);
    }

    public function postAddProduct(Request $request)
    {
        $pro = new Product();
        $pro->name = $request->txtname;
        $pro->slug = str_slug($request->txtname, '-');
        $pro->tag = $request->txttag;
        $pro->promo = $request->txtpromo;
        $pro->packet = $request->txtpacket;
        $pro->intro = $request->txt_Intro;
        $pro->review = $request->txtReview;
        $pro->tag = $request->txttag;
        $pro->price = $request->txtprice;
        $pro->cate_id = $request->sltCate;
        $pro->admin_id = Auth::guard('admin')->user()->id;
        $pro->created_at = new datetime;
        $pro->status = '1';
        $f = $request->file('txtimg')->getClientOriginalName();
        $filename = time() . '_' . $f;
        $pro->images = $filename;
        $request->file('txtimg')->move('public/uploads/products/', $filename);
        $pro->save();

        $pro_id = $pro->id;

        $detail = new Product_detail();
        $detail->cpu = $request->txtCpu;
        $detail->ram = $request->txtRam;
        $detail->screen = $request->txtScreen;
        $detail->vga = $request->txtVga;
        $detail->storage = $request->txtStorage;
        $detail->exten_memmory = $request->txtExtend;
        $detail->cam1 = $request->txtCam1;
        $detail->cam2 = $request->txtCam2;
        $detail->sim = $request->txtSIM;
        $detail->connect = $request->txtConnect;
        $detail->battery = $request->txtBattery;
        $detail->
        operatingsystem = $request->txtOs;
        $detail->product_id = $pro_id;
        $detail->exten_memmory = $request->txtExtend;

        $detail->created_at = new datetime;
        $detail->save();

        if ($request->hasFile('txtdetail_img')) {
            $df = $request->file('txtdetail_img');
            foreach ($df as $row) {
                $img_detail = new Product_img_detail();
                if (isset($row)) {
                    $name_img = time() . '_' . $row->getClientOriginalName();
                    $img_detail->images_url = $name_img;
                    $img_detail->product_id = $pro_id;
                    $img_detail->created_at = new datetime;
                    $row->move('public/uploads/products/details/', $name_img);
                    $img_detail->save();
                }
            }
        }
        return redirect(route('list-product'))->with(['flash_level'=>'result_msg','flash_massage'=>' Đã thêm thành công !']);
    }

    public function getListProduct(Request $request)
    {
        $products = Product::with('category:id,name');
      
        if ($request->name) $products->where('name', 'like', '%' . $request->name .'%');
        if ($request->cate) $products->where('cate_id',$request->cate);
        $products = $products->orderBy('id')->paginate(10);
        $categories = $this->getCategories();


        $viewData = [
            'products' => $products,
            'categories' => $categories
        ];
        // dd($viewData);
        // die();
        return view('admin.product.list_pro', $viewData);

    }

    public function getCategories()
    {
        return Category::all();
    }

    public function getEditProduct($id)
    {
        $pro = Product::where('id',$id)->first();       
        $detail_id=$pro->id;
        $product_detail=Product_detail::where('product_id',$detail_id)->first();
      
        $product_img=DB::table('product_img_detail')->where('product_id',$detail_id)->get()->toArray();
        $categories = $this->getCategories()    ;
        
      
        $viewData=[
            'pro'=>$pro,
            'categories'=>$categories,
            'product_detail'=>$product_detail,
            'product_img'=>$product_img
        ];
       
        // dd($viewData);
        // die();
       return view('admin.product.edit_pro',$viewData);
    }

    public function postEditProduct(Request $request, $id)
    {
     $pro=Product::find($id);
     $pro->name = $request->txtname;
        $pro->slug = str_slug($request->txtname, '-');
        $pro->tag = $request->txttag;
        $pro->promo = $request->txtpromo;
        $pro->packet = $request->txtpacket;
        $pro->intro = $request->txt_Intro;
        $pro->review = $request->txtReview;
        $pro->tag = $request->txttag;
        $pro->price = $request->txtprice;
        if($pro->cate_id!=$request->sltCate){
            $pro->cate_id = $request->sltCate;
        }
    
        $pro->admin_id = Auth::guard('admin')->user()->id;
        $pro->created_at = new datetime;
        $pro->status = '1';
        $file_path = public_path('public/uploads/products/').$pro->images;  
        if ($request->hasFile('txtimg')) {
            if (file_exists($file_path))
                {
                    unlink($file_path);
                }            
            $f = $request->file('txtimg')->getClientOriginalName();
            $filename = time().'_'.$f;
            $pro->images = $filename;       
            $request->file('txtimg')->move('public/uploads/products/',$filename);
        }
        $pro->save();
        $pro_id=$pro->id;
       
        $pro_detail=Product_detail::where('product_id',$id)->first();
        // dd($pro_detail->cpu);
        // die();
       
        $pro_detail->cpu = $request->txtCpu;
        $pro_detail->ram = $request->txtRam;
        $pro_detail->screen = $request->txtScreen;
        $pro_detail->vga = $request->txtVga;
        $pro_detail->storage = $request->txtStorage;
        $pro_detail->exten_memmory = $request->txtExtend;
        $pro_detail->cam1 = $request->txtCam1;
        $pro_detail->cam2 = $request->txtCam2;
        $pro_detail->sim = $request->txtSIM;
        $pro_detail->connect = $request->txtConnect;
        $pro_detail->battery = $request->txtBattery;
        $pro_detail->
        operatingsystem = $request->txtOs;
        $pro_detail->product_id = $pro_id;
        $pro_detail->exten_memmory = $request->txtExtend;
        $pro_detail->created_at = new datetime;
        $pro_detail->save();

        if ($request->hasFile('txtdetail_img')) {
            $detail_img = Product_img_detail::where('product_id',$id)->get();
            $df = $request->file('txtdetail_img');
            foreach ($detail_img as $row) {                
               $dt = Product_img_detail::find($row->id);
               $pt = public_path('public/uploads/products/details/').$dt->images_url; 
            //    dd($pt);   
                if (file_exists($pt))
                {
                    unlink($pt);
                }
               $dt->delete();                              
            }
            foreach ($df as $row) {
                $img_detail = new Product_img_detail();
                if (isset($row)) {
                    $name_img= time().'_'.$row->getClientOriginalName();
                    $img_detail->images_url = $name_img;
                    $img_detail->product_id = $id;
                    $img_detail->created_at = new datetime;
                    $row->move('public/uploads/products/details/',$name_img);
                    $img_detail->save();
                }
            }
        }
        return redirect(route('list-product'))->with(['flash_level'=>'result_msg','flash_massage'=>' Đã sửa thành công !']);
       
    }

    public function getDelProduct($id)
    {
        $product_img=Product::find($id)->detail_img_product->toArray();
        foreach($product_img as $value ){
            File::delete('public/uploads/products/details/'.$value["images_url"]);
        }
      
        $product=Product::find($id);
        File::delete('public/uploads/products/'.$product->images);
        $product->delete();
        return redirect(route('list-product'))->with(['flash_level'=>'result_msg','flash_massage'=>' Đã xóa thành công !']);
       
    }

}

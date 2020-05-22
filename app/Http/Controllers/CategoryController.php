<?php

namespace App\Http\Controllers;

use App\Model\Category;
use Illuminate\Http\Request;
use DateTime;
use App\Http\Requests\CateRequest;
class CategoryController extends Controller
{
    public function getAddCate(){
    $data=Category::all();
    return view('admin.category.add_cate',['data'=>$data]);
    }
    public function postAddCate(CateRequest $request){
        $this->validate($request, [
    		'txtCateName' => 'required',
    		],[
    		'txtCateName.required' => 'Bạn phải nhập vào tên danh mục',
    	    ]);
        $cate= new Category();
        $cate->parent_id= $request->sltCate;
        $cate->name= $request->txtCateName;
        $cate->slug = str_slug($request->txtCateName,'-');
        $cate->created_at = new DateTime;
        $cate->save();
        return redirect(route('list-category'))->with(['flash_level'=>'result_msg','flash_massage'=>' Đã thêm thành công !']);
    }
    public function getListCate(){     
       
        $data=Category::all();
        return view('admin.category.list_cate',['data'=>$data]);
    }
    public function getEditCate($id){
        $cat = Category::all();
        $data = Category::findOrFail($id)->toArray();
        return View ('admin.category.edit_cate',['cat'=>$cat,'data'=>$data]);
    }
    public function postEditCate(CateRequest $request,$id){
        $cat = Category::find($id);
        if ($cat->parent_id != 0) {
            $cat->name = $request->txtCateName;
            $cat->slug = str_slug($request->txtCateName, '-');
            $cat->parent_id = $request->sltCate;
            $cat->updated_at = new DateTime;
            $cat->save();
            return redirect(route('list-category'))->with(['flash_level'=>'result_msg','flash_massage'=>' Đã sửa']);
        }
    }
    public function getDelCate($id){
        $cate = Category::find($id);
        $cate->delete();
        return redirect(route('list-category'))->with(['flash_level'=>'result_msg','flash_massage'=>'Đã xóa !']);
    }


}



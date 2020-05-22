@extends('admin.layout.master')
@section('title', 'Danh sách sản phẩm')
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li class="active">Quản lý sản phẩm</li>
            </ol>
        </div><!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-12">
                                <form class="form-inline"action="">
                                    <div class="form-group">
                                        <input type="text"class="form-control"placeholder="Tên sản phẩm..." name="name" value="{{\Request::get('name')}}">
                                    </div>
                                    <div class="form-group">
                                        <select name="cate" id="" class="form-control">
                                            <option value="0">- CHỌN MỘT DANH MỤC --</option>
                                            @if(isset($categories))
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}"{{\Request::get('cate')== $category->id ? "selected='selected":""}}>{{$category->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                   <button type="submit"class="btn btn-default">Tìm kiếm</button>
                                   <a href="{{route('add-product')}}" title="">
                                    <button type="button" class="btn btn-primary pull-right">Thêm mới sản phẩm</button>
                                </a>
                                </form>
                                
                            </div>
                        </div>
                       
                    </div>
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @elseif (Session()->has('flash_level'))
                        <div class="alert alert-success">
                            <ul>
                                {!! Session::get('flash_massage') !!}
                            </ul>
                        </div>
                    @endif
                    <div class="panel-body" style="font-size: 12px;">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Hình ảnh</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Tóm tắt chức năng</th>
                                    <th>Thương hiệu</th>
                                    <th>Giá bán</th>
                                    <th>Trạng thái</th>
                                    <th colspan="2">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{$product->id}}</td>
                                        <td> <img src="{{url("/")}}/public/uploads/products/{{$product->images}}" alt="iphone" width="100" height="80"></td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->intro}}</td>
                                        <td>{{$product->category->name}}</td>
                                        <td>{{number_format($product->price,0,',','.')}} đ</td>
                                        <td>
                                            @if($product->status ==1)
                                                <span style="color:blue;">Còn hàng</span>
                                            @else
                                                <span style="color:red;"> Tạm hết hàng</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="admin/product/edit/{{$product->id}}" title="Sửa"><span class="glyphicon glyphicon-edit">Sửa</span> </a>
                                        </td>
                                        <td>
                                            <a href="admin/product/delete/{{$product->id}}"  title="Xóa" onclick="return xacnhan('Xóa danh mục này ?')"><span class="glyphicon glyphicon-remove">Xóa</span> </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div><!--/.row-->
    </div>


@endsection

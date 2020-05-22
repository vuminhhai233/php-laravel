@extends('admin.layout.master')
@section('title', 'Sủa sản phẩm')
@section('content')
<!-- main content - noi dung chinh trong chu -->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Sản phẩm</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><small>Sửa sản phẩm</small></h1>
			</div>
		</div><!--/.row-->		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">					
					<div class="panel-body" style="background-color: #ecf0f1; color:#27ae60;">
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
                    <form action="" method="POST" role="form" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="input-id">Chọn danh mục</label>
                            <select name="sltCate" id="inputSltCate" required class="form-control">
                                <option value="">--Chọn thương hiệu--</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}}"@if($category->id == $pro->cate_id) selected @endif>{{$category->name}}</option> 	
                                @endforeach	
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="input-id">Tên sản phẩm</label>
                            <input type="text" name="txtname" id="inputTxtname" class="form-control" value="{!! old('txtname',isset($pro["name"]) ? $pro["name"] : null) !!}"  required="required">
                        </div>
                       
                        <div class="form-group">
                            <label for="input-id">Gồm có : </label>
                            <input type="text" name="txtpacket" id="inputtxtpacket" value="{!! old('txtpacket',isset($pro["packet"]) ? $pro["packet"] : null) !!}" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="input-id">Khuyễn mãi</label>
                            <div class="row">
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                    khuyễn mại  : <input type="text" name="txtpromo" id="inputtxtpromo" value="{!! old('txtpromo',isset($pro["promo"]) ? $pro["promo"] : null) !!}" class="form-control" >
                                </div>
                            </div>				      			
                        </div>
                        <div class="form-group">				      			
                            <div class="row">
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                    Hình ảnh : <input type="file" name="txtimg" accept="image/png" id="inputtxtimg"  class="form-control" >
                                    Ảnh cũ: <img src="{{url("/")}}/public/uploads/products/{{$pro->images}}" alt="{!!$pro->images!!}" width="80" height="60">
                                </div>
                                <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                                    Giá bán : <input type="number" name="txtprice" id="inputtxtprice" class="form-control" value="{!! old('txtproname',isset($pro["price"]) ? $pro["price"] : null) !!}" required="required">
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    Tag : <input type="text" name="txttag" id="inputtag" value="{!! old('txtproname',isset($pro["tag"]) ? $pro["tag"] : null) !!}" class="form-control">
                                </div>
                            </div>				      			
                        </div>
                   
                        <div class="form-group">
                            <label for="input-id"> Chi tiết cấu hình sản phẩm</label>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    Cpu : <input type="text" name="txtCpu" id="inputtxtCpu" value="{!! old('txtCpu',isset($product_detail->cpu) ? $product_detail->cpu : null) !!}" class="form-control" >
                                </div>
                                <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                                    RAM : <input type="text" name="txtRam" id="inputtxtRam" value="{!! old('txtRam',isset($product_detail->ram) ? $product_detail->ram : null) !!}" class="form-control" >
                                </div>
                                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2">
                                    Bộ nhớ trong : <input type="text" name="txtStorage" id="inputtxtStorage" value="{!! old('txtStorage',isset($product_detail->storage) ? $product_detail->storage : null) !!}" class="form-control" >
                                </div>
                                <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2" style="padding-left: 0;">
                                    Thẻ nhớ <input type="text" name="txtExtend" id="inputtxtExtend" value="{!! old('txtExtend',isset($product_detail->exten_memmory) ? $product_detail->exten_memmory : null) !!}" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                    Màn hình : <input type="text" name="txtScreen" id="inputtxtscreen" value="{!! old('txtScreen',isset($product_detail->screen) ? $product_detail->screen : null) !!}" class="form-control" >
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                    VGA : <input type="text" name="txtVga" id="inputtxtVga" value="{!! old('txtVga',isset($product_detail->vga) ? $product_detail->vga : null) !!}" class="form-control">
                                </div>
                                <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                                    Cammera Trước : <input type="text" name="txtCam1" id="inputtxtCam1" value="{!! old('txtCam1',isset($product_detail->cam1) ? $product_detail->cam1 : null) !!}" class="form-control" >
                                </div>
                                <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                                    Cammera Sau: <input type="text" name="txtCam2" id="inputtxtCam2" value="{!! old('txtCam2',isset($product_detail->cam2) ? $product_detail->cam2 : null) !!}" class="form-control" >
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                    SIM hỗ trợ : <input type="text" name="txtSIM" id="inputtxtSIM" value="{!! old('txtSIM',isset($product_detail->sim) ? $product_detail->sim : null) !!}" class="form-control" >
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                    Kết nối : <input type="text" name="txtConnect" id="inputtxtConnect" value="{!! old('txtConnect',isset($product_detail->connect) ? $product_detail->connect : null) !!}" class="form-control">
                                </div>
                                <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                                    PIN : <input type="text" name="txtBattery" id="inputtxtBattery" value="{!! old('txtPin',isset($product_detail->battery) ? $product_detail->battery : null) !!}" class="form-control" >
                                </div>
                                <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                                    Hệ điều hành : <input type="text" name="txtOs" id="inputtxtOs" value="{!! old('txtOs',isset($product_detail->operatingsystem) ? $product_detail->operatingsystem : null) !!}" class="form-control" >
                                </div>
                            </div>				      			
                        </div>
                    
                             <div class="form-group">
                            <label for="input-id">Hình ảnh chi tiết sản phẩm</label>
                            <?php $stt=0; ?>
                            <div class="row">
                              
                                  @foreach($product_img as $row)
                                    <?php $stt++; ?>
                                    <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">	
                                        @if(isset($row->images_url))	
                                                                             			 
                                        Ảnh cũ: {!!$stt!!}<img src="{{url("/")}}/public/uploads/products/details/{{$row->images_url}}" alt="" width="80" height="60">
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                            <div class="row">
                                @for( $i=1; $i<=8; $i++)
                                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                    Hình ảnh mới {!!$i!!} : <input type="file" name="txtdetail_img[]" value="{{ old('txtdetail_img[]') }}" accept="image" id="inputtxtdetail_img" class="form-control">
                                </div>
                                @endfor
                            </div>				      			
                        </div>
                        <div class="form-group">
                            <label for="input-id">Đánh giá chi tiết sản phẩm</label>
                            <div class="row">					      			
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <label for="input-id">Tóm tắt đánh giá</label>
                                    <textarea name="txt_Intro" id="inputTxt_Intro" class="form-control"  rows="2">{!! old('txtIntro',isset($pro->intro) ? $pro->intro : null) !!}</textarea>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <label for="input-id">Bài đánh giá chi tiết</label>
                                    <textarea name="txtReview" id="inputtxtReview" class="form-control" rows="4" ">{!! old('txtReview',isset($pro->review) ? $pro->review : null) !!}</textarea>
                                    <script type="text/javascript">
                                      var editor = CKEDITOR.replace('txtReview',{
                                          language:'vi',
                                          filebrowserImageBrowseUrl : '../../../../plugin/ckfinder/ckfinder.html?Type=Images',
                                          filebrowserFlashBrowseUrl : '../../../../plugin/ckfinder/ckfinder.html?Type=Flash',
                                          filebrowserImageUploadUrl : '../../../../plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                          filebrowserFlashUploadUrl : '../../../../plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                                      });
                                  </script>
                                </div>
                            </div>				      			
                        </div>	
                        <div class="form-group">
                            <label for="input-id">Trạng thái sản phẩm</label>
                            <select name="sltstatus" id="inputsltstatus" required class="form-control">
                                <option value="1" @if($pro->status==1) selected @endif>-- Còn hàng --</option>
                                <option value="0" @if($pro->status==0) selected @endif>-- Tạm hết --</option>
                            </select>
                        </div>      				      		

                        <input type="submit" name="btnCateAdd" class="btn btn-primary" value="Lưu lại" class="button" />
                    </form>			      	
					</div>
				</div>
			</div>
		</div><!--/.row-->		
	</div>	<!--/.main-->
<!-- =====================================main content - noi dung chinh trong chu -->
@endsection
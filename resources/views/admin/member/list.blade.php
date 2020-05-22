@extends('admin.layout.master')
@section('title', 'Danh sách nhân viên')
@section('content')
<!-- main content - noi dung chinh trong chu -->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Nhân viên</li>
			</ol>
		</div><!--/.row-->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel-heading">
					Danh sách nhân viên
					<a href="{!!url('admin/users/add')!!}" title=""><button type="button" class="btn btn-primary pull-right">Thêm mới nhân viên</button></a>
					</div>					
				</div>
				<div class="panel panel-default">					
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
					<div class="panel-body" style="font-size: 13px;">
						<div class="table-responsive">
							<table class="table table-hover">
								<thead>
									<tr>										
										<th>ID</th>										
										<th>Tên nhân viên</th>
										<th>Email</th>
										<th>Địa chỉ</th>
                                        <th>Đt Liên hệ</th>
                                        <th>Quyền</th>								
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($data as $row)
										<tr>
											<td>{!!$row->id!!}</td>
											<td>{!!$row->name!!}</td>
											<td>{!!$row->email!!}</td>
											<td>{!!$row->address!!}</td>
											<td>{!!$row->phone!!}</td>
											<td>
												@if($row->level ==100)
													<span style="color:#d35400;">Quản trị hệ thống</span>
												@elseif($row->level ==1)
													<span style="color:#27ae60;">Nhân viên quản lý</span>
												@else
													<span style="color:#27ae60;">Nhân viên bán hàng</span>
												@endif
											</td>																			
											<td>
												@if (Auth::guard('admin')->user()->level == 100)												 
											    	<a href="{!!url('admin/users/edit/'.$row->id)!!}" title="Chi tiết"> Cập nhật</a> &nbsp;	
											    @endif
											    @if ($row->level !=100)										    
											    	<a href="{!!url('admin/users/delete/'.$row->id)!!}"  title="Xóa" onclick="return xacnhan('Xóa danh mục này ?')">Xóa bỏ</a>
											    @endif
											</td>
										</tr>
									@endforeach								
								</tbody>
							</table>
						</div>
						{!! $data->render() !!}
					</div>
				</div>
			</div>
		</div><!--/.row-->		
	</div>	<!--/.main-->
<!-- =====================================main content - noi dung chinh trong chu -->
@endsection
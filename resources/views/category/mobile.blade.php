@extends('layouts.master')
@section('title', 'Điện thoại')
@section('content')
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">   
    <h3 class="panel-title">
        <span class="glyphicon glyphicon-home"><a href="#" title=""> Home</a></span>
        <span class="glyphicon glyphicon-chevron-right" style="font-size: 11px;"></span><a href="#" title=""> Smartphone</a>
        
    </h3>
    <h2>SMARTPHONES</h2>
        <!-- danh muc dien thoai -->
        @foreach($data as $row)        
          <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 no-padding">
            <div class="thumbnail mobile">              
              <div class="bt">
                <div class="image-m pull-left">
                  <img class="img-responsive" src="{{url('/')}}/public/uploads/products/{{$row->images}}" alt="img responsive">
                </div>
                <div class="intro pull-right">
                  <h1><small class="title-mobile">{!!$row->name!!}</small></h1>
                  <li>{!!$row->intro!!}</li>
                  <span class="label label-info">Khuyễn mãi</span>   
                  <li><span class="glyphicon glyphicon-hand-right"></span> {{number_format($row->price,0,',','.')}}</li>

                </div><!-- /div introl -->
              </div> <!-- /div bt -->
              <div class="ct">
                <a href="{{url('/')}}/detail/dien-thoai/{{$row->id}}/{{$row->slug}}" title="Xem chi tiết">
                  <span class="label label-info">Ưu đãi khi mua</span>   
                  <li><span class="glyphicon glyphicon-hand-right"></span> {!!$row->promo!!}</li> 
              
                  <span class="label label-warning">Cấu Hình Nổi bật</span> 
                  <li><strong>CPU</strong> : <i> {!!$row->cpu!!}</i></li>
                  <li><strong>Màn Hình</strong> : <i>{!!$row->screen!!} </i></li> 
                  <li><strong>Camera</strong> : Trước  <i>{!!$row->cam1!!}</i> Sau <i>{!!$row->cam2!!} </i></li> 
                  <li><strong>HĐH</strong> :<i> {!!$row->operatingsystem!!} </i> <strong> Bộ nhớ trong</strong> :<i> {!!$row->storage!!} </i></li> 
                  <li><strong>Pin</strong> :<i> {!!$row->battery!!}</i></li>
                </a>
              </div>
                <span class="btn label-warning"><strong>{{number_format($row->price,0,',','.')}}</strong> Đ </span>
                <a href="{!!url('cart/add/'.$row->id)!!}" class="btn btn-success pull-right add">Thêm vào giỏ </a>
            </div> <!-- / div thumbnail -->
          </div>  <!-- /div col-4 -->
          @endforeach
          <!-- danh muc dien thoai -->
@endsection
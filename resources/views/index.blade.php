@extends('layouts.master')
@section('title', 'Trang chủ')
@section('content')
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">   
    <h2>Mẫu điện thoại di động mới về</h2>
        <!-- danh muc dien thoai -->
        @foreach($mobile as $row)        
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
                  <li><span class="glyphicon glyphicon-hand-right"></span>
                     @if($row->promo==1)
                    Trả góp 0%
                   @endif
                  </li>

                </div><!-- /div introl -->
              </div> <!-- /div bt -->
              <div class="ct">
                <a href="{{url('/')}}/detail/dien-thoai/{{$row->id}}/{{$row->slug}}" title="Xem chi tiết">
                  <span class="label label-info">Ưu đãi khi mua</span>   
                  <li><span class="glyphicon glyphicon-hand-right"></span> 
                    
                  </li> 
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
       
         
        <!--========================== phan danh muc laptop   =========================================  -->

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">   
          <h2>Mẫu laptop mới về</h2>
              <!-- danh muc dien thoai -->
              @foreach($laptop as $row)        
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
                        <li><span class="glyphicon glyphicon-hand-right"></span>
                           @if($row->promo==1)
                          Trả góp 0%
                         @endif
                        </li>
      
                      </div><!-- /div introl -->
                    </div> <!-- /div bt -->
                    <div class="ct">
                      <a href="{{url('/')}}/detail/lap-top/{{$row->id}}/{{$row->slug}}" title="Xem chi tiết">
                        <span class="label label-info">Ưu đãi khi mua</span>   
                        <li><span class="glyphicon glyphicon-hand-right"></span> 
                          
                        </li> 
                         <span class="label label-warning">Cấu Hình Nổi bật</span> 
                         <span class="label label-warning">Cấu Hình Nổi bật</span> 
                        <li><strong>CPU</strong> : <i>{!!$row->cpu!!}</i></li>
                        <li><strong>RAM </strong> : <i>{!!$row->ram!!}</i></li>
                        <li><strong>Lưu Trữ</strong> : <i> {!!$row->storage!!}</i></li>
                        <li><strong>Màn Hình</strong> : <i> {!!$row->screen!!} </i></li> 
                        <li><strong>VGA</strong> : <i> {!!$row->vga!!}</i></li> 
                        <li><strong>HĐH</strong> :<i> {!!$row->operatingsystem!!}</i></li> 
                        <li><strong>Pin</strong> :<i> {!!$row->battery!!}</i></li>
                    </div>
                      <span class="btn label-warning"><strong>{{number_format($row->price,0,',','.')}}</strong> Đ </span>
                      <a href="{!!url('cart/add/'.$row->id)!!}" class="btn btn-success pull-right add">Thêm vào giỏ </a>
                  </div> <!-- / div thumbnail -->
                </div>  <!-- /div col-4 -->
                @endforeach
       
@endsection


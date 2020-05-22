@extends('layouts.new-master')
@section('title', 'Smartphone')
@section('content')
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <h3 class="panel-title">
      <span class="glyphicon glyphicon-home"><a href="{!!url('/')!!}" title=""> Home</a></span> 
      <span class="glyphicon glyphicon-chevron-right" style="font-size: 11px;"></span><a href="{!!url('/mobile')!!}" title=""> Điện thoại</a>
      <span class="glyphicon glyphicon-chevron-right" style="font-size: 11px;"></span> <a href="#" title="">{!!$slug!!}</a>
    </h3>              
    <div class="">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
          <div class="panel panel-success">
            <div class="panel-body">
              <div class="row">
              <!-- hot new content -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-padding">
                  <h3 class="pro-detail-title"><a href="{{url('/')}}/dien-thoai/{{$data->id}}/{{$slug}}" title="">{!!$data->name!!}</a></h3>
                  <hr>
                  <div class="row">
                    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                      <div class="img-box">
                        <img class="img-responsive img-mobile" src="{!!url('public/uploads/products/'.$data->images)!!}" alt="img responsive">
                      </div>
                      
                      <label class="btn btn-large btn-block btn-warning">{!!number_format($data->price)!!} vnd</label>
                    </div>
                    <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
                      <div class="panel panel-info" style="margin: 0;">
                        <div class="panel-heading" style="padding:5px;">
                          <h3 class="panel-title">Khuyễn mãi - Chính sách</h3>
                        </div>
                        <div class="panel-body">
                          <div class="khuyenmai">
                              <li><span class="glyphicon glyphicon-ok-sign"style="padding-right:5px"></span>Trả góp 0%</span></li>
                              <li><span class="glyphicon glyphicon-ok-sign"style="padding-right:5px"></span>Giảm 50% khi mua cường lực, ốp lưng</li>
                              <li><span class="glyphicon glyphicon-ok-sign"style="padding-right:5px"></span>Bảo hành chính hãng 12 tháng, 1 đổi 1 trong 7 ngày</li>    
                              <li><span class="glyphicon glyphicon-ok-sign"style="padding-right:5px"></span>Ưu đãi 30% chi phí sữa chữa/thay thế linh kiện sau bảo hành</li>                                                     
                          </div>                         
                        </div>
                      </div>
                      <div class="panel panel-info">
                        <div class="panel-body">
                         <div class="chinhsach">
                            <li><span class="glyphicon glyphicon-hand-right"style="padding-right:5px"></span> Trong hộp có: {!!$data->packet!!} </li>
                            <li><span class="glyphicon glyphicon-hand-right"style="padding-right:5px"></span> Bảo hành chính hãng: thân máy 12 tháng, pin 12 tháng, sạc 12 tháng</li>
                            <li><span class="glyphicon glyphicon-hand-right"style="padding-right:5px"></span> Giao hàng tận nơi miễn phí trong 1 ngày</li>
                            
                         </div>
                        </div>
                      </div>
                      @if($data->status ==1)
                        <a href="{!!url('cart/pay/'.$data->id)!!}" title="" class="btn btn-large btn-block btn-primary" style="font-size: 20px;">Đặt hàng ngay</a>
                      @else
                        <a href="" title="" class="btn btn-large btn-block btn-primary disabled" style="font-size: 20px;">Tạm hết hàng</a>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                  <div class="table-responsive">
                    <table class="table table-hover">
                        @foreach ($detail as $item)

                      <thead>
                        <tr>
                          <th colspan="2">CẤU HÌNH CHI TIẾT SẢN PHẨM</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Màn hình</td>
                          <td>{!!$item->screen!!}</td>
                        </tr>
                        <tr>
                          <td>Hệ điều hành</td>
                          <td>{!!$item->operatingsystem!!}</td>
                        </tr>
                        
                        <tr>
                          <td>CPU</td>
                          <td>{!!$item->cpu!!}</td>
                        </tr>
                        <tr>
                          <td>RAM</td>
                          <td>{!!$item->ram!!}</td>
                        </tr>
                        <tr>
                          <td>Bộ nhớ trong</td>
                          <td>{!!$item->storage!!}</td>
                        </tr>
                        <tr>
                          <td>VGA</td>
                          <td>{!!$item->vga!!}</td>
                        </tr>
                     
                        <tr>
                          <td>Cammera trước</td>
                          <td>{!!$item->cam1!!}</td>
                        </tr>
                        <tr>
                          <td>Cammera sau</td>
                          <td>{!!$item->cam2!!}</td>
                        </tr>
                        <tr>
                          <td>Hỗ trợ thẻ nhớ</td>
                          <td>{!!$item->exten_memmory!!}</td>
                        </tr>
                        <tr>
                          <td>Thẻ SIM</td>
                          <td>{!!$item->sim!!}</td>
                        </tr>
                        <tr>
                          <td>Dung lượng PIN</td>
                          <td>{!!$item->battery!!}</td>
                        </tr>
                      </tbody>
                      @endforeach
                    </table>
                  </div>
                </div>

              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                  <h2> <small> Đánh giá chi tiết sản phẩm</small></h2>
                  <div class="accordion-group">
                    <div class="accordion-heading">
                      <p class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                        {!!$data->intro!!}
                      </p>
                    </div>
                    <div id="collapseTwo" class="accordion-body collapse">
                      <div class="accordion-inner">                        
                          {!!$data->review!!}
                      </div>
                    </div>
                    <button class="SeeMore btn-primary" data-toggle="collapse" href="#collapseTwo"><b class="caret"></b> Xem chi tiết</button>
                  </div>
                </div>
              </div>

@endsection
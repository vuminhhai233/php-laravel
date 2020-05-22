@extends('layouts.cart-master')
@section('title', 'Xác nhận thông tin đơn hàng')
@section('content')

  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <h3 class="panel-title">
      <span class="glyphicon glyphicon-home"><a href="#" title=""> Home</a></span> 
      <span class="glyphicon glyphicon-chevron-right" style="font-size: 11px;"></span><a href="#" title=""> Đặt hàng</a>
      <span class="glyphicon glyphicon-chevron-right" style="font-size: 11px;"></span> <a href="#" title="">Xác nhận đơn hàng</a>
    </h3>              
    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 no-padding">              
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
          <div class="panel panel-success">
            <div class="panel-body">   
            <legend class="text-left">Xác nhận thông tin đơn hàng</legend> 
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Hình ảnh</th>
                      <th>Tên sản phẩm</th>
                      <th>SL</th>
                      <th>Giá</th>
                      <th>Thành tiền</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach(Cart::content() as $row)
                    <?php
                     $total =0;
                    $total =  $total+ ($row->price * $row->qty);
                     
                    ?>
                    <tr>
                      <td>{!!$row->id!!}</td>
                      <td><img src="{!!url('public/uploads/products/'.$row->options->img)!!}" alt="dell" width="80" height="50"></td>
                      <td>{!!$row->name!!}</td>
                      <td class="text-center">                        
                          <span>{!!$row->qty!!}</span>
                      </td>
                      <td>{{number_format($row->price,0,'.',',')}} </td>
                      <td>{{number_format($row->price*$row->qty,0,'.',',')}} VND</td>
                    </tr>
                  @endforeach                    
                    <tr>
                      <td colspan="3"><strong>Tổng cộng :</strong> </td>
                      <td colspan="2"><span>{{Cart::count()}}</span>
                    </td>
                      <td  style="color:red;">{{Cart::subtotal()}} VND</td>                      
                    </tr>                    
                  </tbody>
                </table>                
              </div>
            
              <form action="" method="POST" role="form">
                <legend class="text-left">Xác nhận thông tin khách hàng</legend>
                {{ csrf_field() }}
                <div class="form-group">
                  <label for="">
                    - Tên khách hàng : <strong>{{ Auth::user()->name }} </strong> &nbsp;
                    - Điện thoại: <strong> {{ Auth::user()->phone }}</strong> &nbsp;
                    - Địa chỉ: <strong> {{ Auth::user()->address }}</strong>
                  </label>
                </div>               
                <div class="form-group">
                  <label for="">Các ghi chú khác</label>
                  <textarea name="txtnote" id="inputtxtNote" class="form-control" rows="4" required="required">                    
                  </textarea>
                </div>              
                <button type="submit" class="btn btn-primary pull-right"> Đặt hàng</button> 
              </form>
                   
            </div>
          </div>   
        </div>
      </div>     
    </div> 
   
@endsection
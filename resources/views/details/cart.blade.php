@extends('layouts.cart-master')
@section('title', 'Giỏ hàng')
@section('content')
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <h3 class="panel-title">
            <span class="glyphicon glyphicon-home"><a href="#" title=""> Home</a></span>
            <span class="glyphicon glyphicon-chevron-right" style="font-size: 11px;"></span><a href="#" title=""> Đặt
                hàng</a>
            <span class="glyphicon glyphicon-chevron-right" style="font-size: 11px;"></span> <a href="#" title="">Chi
                tiết đơn hàng</a>
        </h3>
        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 no-padding">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                    <div class="panel panel-success" style="min-height: 1760px;">
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
                        <div class="panel-body">
                            <div  class="table-responsive"id="listcart">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Hình ảnh</th>
                                        <th>Tên sản phẩm</th>
                                        <th>SL</th>
                                        <th>Action</th>
                                        <th>Giá</th>
                                        <th>Thành tiền</th>
                                    </tr>
                                    </thead>
                                    <form action="" method="post">
                                        {{ csrf_field() }}

                                        <tbody id="result">
                                        @foreach(Cart::content() as $row)
                                            <tr>
                                                <td>{!!$row->id!!}</td>
                                                <td><img src="{!!url('public/uploads/products/'.$row->options->img)!!}"
                                                         alt="dell" width="80" height="50"></td>
                                                <td>{!!$row->name!!}</td>

                                                <td class="qtycart">
                                                    <input type="number" style="width:40px;text-align:center"
                                                           value="{{$row->qty}}"
                                                           onchange="updateCart(this.value,'{{$row->rowId}}')">
                                                </td>
                                                {{-- sao ko đổi? --}}


                                                <td><a href="{!!url('cart/delete/'.$row->rowId)!!}"
                                                       onclick="return xacnhan('Xóa sản phẩm này ?')"><span
                                                                class="glyphicon glyphicon-remove"
                                                                style="padding:5px; font-size:18px; color:red;"></span></a>
                                                </td>
                                                <td>{!! number_format($row->price,0,',','.') !!} VND</td>
                                                <td>{!! number_format($row->price*$row->qty,0,',','.') !!} VND</td>
                                            </tr>
                                        @endforeach

                                    <tr>
                                        <td colspan="3"><strong>Tổng cộng :</strong></td>
                                        <td>{!!Cart::count()!!}</td>
                                        <td colspan="3" style="color:red;text-align: right;">
                                        {{$total}}VND
                                        </td>
                                    </tr>
                                    </tbody>
                                    </form>
                                </table>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 no-paddng">
                                @if(Cart::count() !=0)
                                    <a href="{{url('/')}}/order" type="button"
                                       class="btn btn-large btn-primary pull-right">Tiếp tục mua hàng</a>
                                @endif
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            function updateCart(qty, rowId) {
                $.get(
                    '{{asset('cart/update')}}',
                    {qty: qty, rowId: rowId},
                    function (data) {
                       $("#listcart").load("{{asset('cart/detail')}} #listcart");
                    }
                )
            }
        </script>
@endsection
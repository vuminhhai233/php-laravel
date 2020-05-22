 <!-- main menu  navbar -->
    <nav class="navbar navbar-default navbar-top" role="navigation" id="main-Nav" style="background-color: #16a085;margin-bottom: 5px;font-size: 13px;">
      <div class="container">  
        <div class="row">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
             <span  class="visible-xs pull-left" style="font-size:30px;cursor:pointer; padding-left: 10px; color: #ecf0f1;" onclick="openNav()">&#9776; </span> 
             <span  class="visible-xs pull-right" style="font-size:20px;cursor:pointer; padding-right: 10px; padding-top: 8px; color: #FFFFFF;" >    
                </span>
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="main-mav-top">
            <ul class="nav navbar-nav">
              <li> <a href="{!!url('')!!}" {!!  Request::is('') || Request::is('/*') ? 'style="color: #FFFFFF;background-color: #2c3e50;" ' : ' style="color: #FFFFFF;background-color: #333300;"' !!} ><b class="glyphicon glyphicon-home"></b> Trang chủ </a> </li>
              <li class="{!!  Request::is('dien-thoai') || Request::is('dien-thoai/*') ? 'active ' : '' !!}">
                <a href="{!!url('dien-thoai')!!}" {!!  Request::is('dien-thoai') || Request::is('dien-thoai/*') ? 'style="color: #FFFFFF;background-color: #2c3e50;" ' : '' !!} >Điện Thoại </a>                          
              </li>                                                  
              <li class="{!!  Request::is('lap-top') || Request::is('lap-top/*') ? 'active' : '' !!}">
                <a href="{!!url('lap-top')!!}" {!!  Request::is('lap-top') || Request::is('lap-top/*') ? 'style="color: #FFFFFF;background-color: #2c3e50;" ' : '' !!} > Laptop </a>                
              </li>    
            </ul>


             <ul class="nav navbar-nav pull-right">
              
              <li class="dropdown">
                <a  class="dropdown-toggle" data-toggle="dropdown"> <span class="glyphicon glyphicon-shopping-cart"><span class="badge">{!!Cart::count();!!}</span></span> Giỏ Hàng <b class="caret"></b></a>
                <ul class="dropdown-menu" style="right:0; left: auto; min-width: 350px;">
                @if(Cart::count() !=0)
                  <div class="table-responsive">
                     <table class="table table-hover" >
                      <thead>
                      <tr>
                        <th>Ảnh</th>
                        <th>Tên</th>
                        <th>SL</th>
                        <th>Giá</th>
                      </tr>
                    </thead>
                       <tbody>                       
                      @foreach(Cart::content() as $row)
                         <tr>
                           <td>  <img class="card-img img-circle" src="{!!url('public/uploads/products/'.$row->options->img)!!}" alt="lỗi"></td>
                           <td>{!!$row->name!!}</td>
                           <td>{!!$row->qty!!} </td>
                           <td>{{number_format($row->price,0,',','.')}}VND</td>
                         </tr>                         
                        @endforeach                           
                       </tbody>                       
                     </table> 
                     <a href="{{url('/')}}/cart/detail" type="button" class="btn btn-success"> Chi Tiết Giỏ Hàng </a>
                     <a href="{{url('/')}}/cart/delete/all" type="button" class="btn btn-danger pull-right"> Xóa </a>
                  </div>
                  @else
                    <div class="table-responsive">
                     <table class="table table-hover" >
                      <thead>
                      <tr>
                        <th>Ảnh</th>
                        <th>Tên </th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                      </tr>
                    </thead>
                       <tbody>                       
                        <td colspan="3">Giỏ hàng đang trống</td>                        
                       </tbody>                       
                     </table> 
                  </div>
                  @endif
                </ul>
              </li> 
              <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{url('/login')}}">Đăng nhập</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ url('/') }}/profile"><i class="glyphicon glyphicon-info-sign"style="padding-right:5px"></i>Thông tin cá nhân</a></li>
                           
                            <li><a class="top-a" href="{{ url('/logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();" title="đăng xuất">
                                <i class="fa fa-btn fa-sign-out"></i><small>Thoát</small>
                            </a>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
          </div><!-- /.navbar-collapse -->
        </div> <!-- /row -->
      </div><!-- /container -->
    </nav>    <!-- /main nav -->



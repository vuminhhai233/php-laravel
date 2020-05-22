@extends('admin.layout.master')
@section('title', 'Thêm mới danh mục')
@section('content')
    <!-- main content - noi dung chinh trong chu -->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li class="active">Danh mục</li>
            </ol>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><small>Thêm mới danh mục</small></h1>
            </div>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
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
                        <form action="" method="POST" role="form">

                            <div class="form-group">
                                <label for="input-id">Danh mục cha</label>
                                <select name="sltCate" id="inputSltCate" class="form-control">
                                    <option value="0">- ROOT --</option>
                                   <?php MenuMulti($data,0,$str='---',old('sltCate')); ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="input-id">Tên danh mục</label>
                                <input type="text" name="txtCateName" id="inputTxtCateName" class="form-control" >
                            </div>
                            <input type="submit" name="btnCateAdd" class="btn btn-primary" value="Thêm danh mục" class="button" />
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
            </div>
        </div><!--/.row-->
    </div>	<!--/.main-->
    <!-- =====================================main content - noi dung chinh trong chu -->
@endsection

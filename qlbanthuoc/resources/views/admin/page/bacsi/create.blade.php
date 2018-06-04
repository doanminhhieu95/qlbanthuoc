@extends('admin.master') @section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            General Form Elements
            <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="#">
                    <i class="fa fa-dashboard"></i> Home</a>
            </li>
            <li>
                <a href="#">Forms</a>
            </li>
            <li class="active">General Elements</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        @if(count($errors)>0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $err) {{$err}}
            <br/> @endforeach
        </div>
        @endif
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Quick Example</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{route('bacsi.store')}}" method="post">
                        {{csrf_field()}}
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Số hiệu</label>
                                                <input type="text" class="form-control" placeholder="" name="sohieu" value="" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Khoa</label>
                                                <select class="form-control" name="idkhoa">
                                                @foreach($khoa as $item)
                                                    <option value="{{$khoa->id}}">{{$khoa->name}}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Địa chỉ</label>
                                        <input type="text" class="form-control" placeholder="" name="diachi" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nơi công tác</label>
                                        <input type="text" class="form-control" placeholder="" name="noicongtac" value="">
                                    </div>
                                    
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Ten gọi</label>
                                        <input type="text" class="form-control" placeholder="Enter name" name="name" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Chứng chỉ</label>
                                        <input type="text" class="form-control" placeholder="" name="chungchi" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tài khoản</label>
                                        <input type="text" class="form-control" placeholder="" name="taikhoan" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
            <!--/.col (left) -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
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
                    <form role="form" action="{{route('nhacungcap.update',[$nhacungcap->id])}}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="put" />
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tên gọi</label>
                                        <input type="text" class="form-control" placeholder="Enter Name" name="name" value="{{$nhacungcap->name}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Địa chỉ</label>
                                        <input type="text" class="form-control" placeholder="Enter email" name="diachi" value="{{$nhacungcap->diachi}}">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email</label>
                                                <input type="email" class="form-control" placeholder="Enter email" name="email" value="{{$nhacungcap->email}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Website</label>
                                                <input type="text" class="form-control" placeholder="Enter email" name="website" value="{{$nhacungcap->website}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Mã số thuế</label>
                                                <input type="text" class="form-control" placeholder="Enter email" name="masothue" value="{{$nhacungcap->masothue}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Ghi chú</label>
                                                <input type="text" class="form-control" placeholder="Enter email" name="ghichu" value="{{$nhacungcap->ghichu}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nhóm nhà cung cấp</label>
                                        <select class="form-control" name="idnhomncc">
                                        @foreach($nhomncc as $item)
                                            <option value="{{$item->id}}"
                                            <?php 
                                                if($nhacungcap->idnhomncc == $item->id) echo "Selected";
                                            ?>
                                            >{{$item->name}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Điện thoại</label>
                                                <input type="text" class="form-control" placeholder="Enter email" name="dienthoai" value="{{$nhacungcap->dienthoai}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Fax</label>
                                                <input type="text" class="form-control" placeholder="Enter email" name="fax" value="{{$nhacungcap->fax}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Người liên hệ</label>
                                        <input type="text" class="form-control" placeholder="Enter email" name="nguoilienhe" value="{{$nhacungcap->nguoilienhe}}">
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="khachhang" 
                                            <?php 
                                                if($nhacungcap->khachhang == 1) echo 'checked';
                                            ?>
                                            > Khách hàng
                                        </label>
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
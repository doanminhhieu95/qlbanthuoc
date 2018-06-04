@extends('admin.master') @section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Add Admin
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('user.index')}}">
                    <i class="fa fa-circle"></i> Admin</a>
            </li>
            <li class="active">Add</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        @if(count($errors)>0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $err)
                {{$err}} <br/>
            @endforeach
        </div>
        @endif
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Custom</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{route('nhasanxuat.store')}}" method="post">
                        {{csrf_field()}}
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-4">
                                <label for="exampleInputEmail1">Số hiệu</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="" name="sohieu" value="" required>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                <label for="exampleInputEmail1">Tên gọi</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="" name="name" value="" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                <label for="exampleInputEmail1">Địa chỉ</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="" name="diachi" value="" >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                <label for="exampleInputEmail1">Điện thoại</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="" name="dienthoai" value="" >
                                    </div>
                                </div>
                                <div class="col-md-8">
                                <label for="exampleInputEmail1">Số fax</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="" name="fax" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                <label for="exampleInputEmail1">Email</label>
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="" name="email" value="" >
                                    </div>
                                </div>
                                <div class="col-md-8">
                                <label for="exampleInputEmail1">Website</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="" name="website" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                <label for="exampleInputEmail1">Ghi chú</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="" name="ghichu" value="" >
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
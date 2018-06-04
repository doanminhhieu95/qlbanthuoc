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
            @foreach($errors->all() as $err)
                {{$err}} <br/>
            @endforeach
        </div>
        @endif @if(Session::has('loi'))
        <div class="alert alert-danger">
            {{session('loi')}}
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
                    <form role="form" action="{{route('nhomncc.update',[$nhomncc->id])}}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="put" />
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mã nhóm</label>
                                <input type="text" class="form-control" placeholder="Enter Name" name="sohieu" value="{{$nhomncc->sohieu}}"  readonly="readonly">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên gọi</label>
                                <input type="text" class="form-control" placeholder="Enter email" name="name" value="{{$nhomncc->name}}" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Chiết khấu nhập</label>
                                <input type="number" min="0" class="form-control" placeholder="Enter email" name="cknhap" value="{{$nhomncc->cknhap}}" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Chiết khấu xuất</label>
                                <input type="number" min="0" class="form-control" placeholder="Enter email" name="ckxuat" value="{{$nhomncc->ckxuat}}" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ghi chú</label>
                                <input type="text" class="form-control" placeholder="Enter email" name="ghichu" value="{{$nhomncc->ghichu}}">
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
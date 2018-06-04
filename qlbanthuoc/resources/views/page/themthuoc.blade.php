@extends('admin.master') @section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Danh mục
            <small>{{$danhmuc->name}}</small>
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
                        <h3 class="box-title">Thêm thuốc</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{route('themthuoc',[$id])}}" method="post">
                        {{csrf_field()}}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên thuốc</label>
                                <input type="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="product-name">Đơn vị tính
                                    <span class="required"></span>
                                </label>
                                <select class="form-control" name="donvi" style="width:100px;">
                                    <option value="Hộp">Hộp</option>
                                    <option value="Chai">Chai</option>
                                    <option value="Ống">Ống</option>
                                    <option value="Bình">Bình</option>
                                    <option value="Khác">Khác</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ngày sản xuất</label>
                                <input type="date" class="form-control" placeholder="" name="nsx" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Hạn sử dụng</label>
                                <input type="date" name="hsd" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Số lượng</label>
                                <input type="number" min="1" class="form-control" id="exampleInputEmail1" placeholder="Enter url" name="soluong" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nhà sản xuất</label>
                                <select class="form-control" name="idnsx" style="width:300px;">
                                    @foreach($nhasanxuat as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
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
<script>
    $(document).ready(function () {

    });
</script>
@endsection
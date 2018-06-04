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
                        <h3 class="box-title">Sửa thuốc</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{route('suathuoc',[$id,$idthuoc])}}" method="post">
                        {{csrf_field()}}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên thuốc</label>
                                <input type="name" class="form-control" value="{{$thuoc->name}}" placeholder="Enter Name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="product-name">Đơn vị tính
                                    <span class="required"></span>
                                </label>
                                <select class="form-control" name="donvi" style="width:100px;">
                                    <option value="Hộp" <?php if($thuoc->donvi=="Hộp") echo "Selected"?>>Hộp</option>
                                    <option value="Chai" <?php if($thuoc->donvi=="Chai") echo "Selected"?>>Chai</option>
                                    <option value="Ống" <?php if($thuoc->donvi=="Ống") echo "Selected"?>>Ống</option>
                                    <option value="Bình" <?php if($thuoc->donvi=="Bình") echo "Selected"?>>Bình</option>
                                    <option value="Khác" <?php if($thuoc->donvi=="Khác") echo "Selected"?>>Khác</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ngày sản xuất</label>
                                <input type="date" class="form-control" placeholder="" value="{{$thuoc->nsx}}" name="nsx" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Hạn sử dụng</label>
                                <input type="date" name="hsd" class="form-control" value="{{$thuoc->hsd}}" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Số lượng</label>
                                <input type="number" min="1" class="form-control" value="{{$thuoc->soluong}}" placeholder="" name="soluong" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nhà sản xuất</label>
                                <select class="form-control" name="idnsx" style="width:300px;">
                                    @foreach($nhasanxuat as $item)
                                    <option 
                                    @if($thuoc->idnsx == $item->id)
                                    {{"Selected"}}
                                    @endif
                                    value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Danh mục</label>
                                <select class="form-control" name="iddanhmuc" style="width:300px;">
                                    @foreach($danhmucs as $item)
                                    <option 
                                    @if($thuoc->iddanhmuc == $item->id)
                                    {{"Selected"}}
                                    @endif
                                    value="{{$item->id}}">{{$item->name}}</option>
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
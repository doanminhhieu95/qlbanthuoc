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
                    <form role="form" action="{{route('thuoc.store')}}" method="post">
                        {{csrf_field()}}
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="row">
                                        <div class="col-xs-11">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nhóm hàng</label>
                                                <select class="form-control" name="idhang" required>
                                                    @foreach($nhomhang as $item)
                                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-1">
                                            <div class="form-group" style="margin-top: 30px; margin-left:-10px;">
                                                <a href="nhomhang/create" target="_blank">
                                                    <!-- <button style="margin-top: 26px;" class="btn btn-primary btn-sm"> -->
                                                        <span class="glyphicon glyphicon-plus"></span>
                                                    <!-- </button> -->
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-11">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nhóm điều trị</label>
                                                <select class="form-control" name="iddieutri" required>
                                                    @foreach($nhomdieutri as $item)
                                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-1">
                                            <div class="form-group" style="margin-top: 30px; margin-left:-10px;">
                                                <a href="nhomdieutri/create" target="_blank">
                                                    <!-- <button style="margin-top: 26px;" class="btn btn-primary btn-sm"> -->
                                                        <span class="glyphicon glyphicon-plus"></span>
                                                    <!-- </button> -->
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Mã sản phẩm</label>
                                                <input type="text" class="form-control" placeholder="" name="masanpham" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"></label>
                                                <input style="margin-top: 5px;" type="text" class="form-control" placeholder="" name="masanpham" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tên sản phẩm</label>
                                        <input type="text" class="form-control" placeholder="Enter Name" name="name" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Hoạt chất</label>
                                        <input type="text" class="form-control" placeholder="" name="hoatchat" value="">
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-11">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nhà sản xuất</label>
                                                <select class="form-control" name="idnsx" required>
                                                    @foreach($nhasanxuat as $item)
                                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-1">
                                            <div class="form-group" style="margin-top: 30px; margin-left:-10px;">
                                                <a href="nhasanxuat/create" target="_blank">
                                                    <!-- <button style="margin-top: 26px;" class="btn btn-primary btn-sm"> -->
                                                        <span class="glyphicon glyphicon-plus"></span>
                                                    <!-- </button> -->
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Đơn vị tính 1</label>
                                                <select class="form-control" name="iddvt1">
                                                    @foreach($donvitinh as $item)
                                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-5">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Đơn vị tính 2</label>
                                                <select class="form-control" name="iddvt2" required>
                                                    @foreach($donvitinh as $item)
                                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-1">
                                            <div class="form-group" style="margin-top: 30px; margin-left:-10px;">
                                                <a href="{{route('donvitinh.index')}}" target="_blank">
                                                    <!-- <button style="margin-top: 26px;" class="btn btn-primary btn-sm"> -->
                                                        <span class="glyphicon glyphicon-plus"></span>
                                                    <!-- </button> -->
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Hệ số quy đổi</label>
                                                <input type="number" min="0" class="form-control" placeholder="" name="heso" value="0" required>
                                            </div>
                                        </div>
                                        <div class="col-xs-5">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Cách sử dụng</label>
                                                <select class="form-control" name="idcachsd" required>
                                                    @foreach($cachsudung as $item)
                                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-1">
                                            <div class="form-group" style="margin-top: 30px; margin-left:-10px;">
                                                <a href="{{route('cachsudung.index')}}" target="_blank">
                                                    <!-- <button style="margin-top: 26px;" class="btn btn-primary btn-sm"> -->
                                                        <span class="glyphicon glyphicon-plus"></span>
                                                    <!-- </button> -->
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Giá nhập</label>
                                        <input type="number" min="0" class="form-control" placeholder="" name="gianhap" value="0" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Giá bán buôn</label>
                                        <input type="number" min="0" class="form-control" placeholder="" name="banbuon" value="0" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Giá bán lẻ</label>
                                        <input type="number" min="0" class="form-control" placeholder="" name="banle" value="0" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Giá niêm yết</label>
                                        <input type="number" min="0" class="form-control" placeholder="" name="niemyet" value="0" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tồn tối đa</label>
                                        <input type="number" min="0" class="form-control" placeholder="" name="tonmax" value="0" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tối thiểu</label>
                                        <input type="number" min="0" class="form-control" placeholder="" name="tonmin" value="0" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Đời sống thuốc</label>
                                        <input type="number" min="0" class="form-control" placeholder="" title="Đời sống thuốc tính theo ngày" name="doisong" value="0"
                                            required>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-10">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">ĐK bảo quản</label>
                                                <select class="form-control" name="idbaoquan" required>
                                                    @foreach($baoquan as $item)
                                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-1">
                                            <div class="form-group" style="margin-top: 30px; margin-left:-10px;">
                                                <a href="{{route('baoquan.index')}}" target="_blank">
                                                    <!-- <button style="margin-top: 26px;" class="btn btn-primary btn-sm"> -->
                                                        <span class="glyphicon glyphicon-plus"></span>
                                                    <!-- </button> -->
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-xs-11">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Vị trí cất giữ</label>
                                                <select class="form-control" name="idvitri" required>
                                                    @foreach($vitri as $item)
                                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-1">
                                            <div class="form-group" style="margin-top: 30px; margin-left:-10px;">
                                                <a href="{{route('vitri.index')}}" target="_blank">
                                                    <!-- <button style="margin-top: 26px;" class="btn btn-primary btn-sm"> -->
                                                        <span class="glyphicon glyphicon-plus"></span>
                                                    <!-- </button> -->
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Số ngày cảnh báo</label>
                                        <input type="number" min="0" class="form-control" placeholder="" name="ngaycanhbao" value="0" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Số lượng cảnh báo</label>
                                        <input type="number" min="0" class="form-control" placeholder="" name="soluongcanhbao" value="0" required>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" name="theodon"> Thuốc bán theo đơn
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" name="treem"> Trẻ em dưới 6 tuổi
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" name="huongthan"> Thuốc hướng thần
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" name="anhsang"> Tránh ánh sáng mặt trời
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" name="amuot"> Tránh ẩm ướt
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" name="bhyt"> Danh mục BHYT
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
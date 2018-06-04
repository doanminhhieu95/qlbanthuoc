@extends('admin.master') @section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Nhà sản xuất
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('nhasanxuat.index')}}">
                    <i class="fa fa-circle-o active"></i> Nhà sản xuất</a>
            </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        @if(Session::has('thanhcong'))
        <div class="alert alert-success">
            {{session('thanhcong')}}
        </div>
        @endif @if(Session::has('edit'))
        <div class="alert alert-success">
            {{session('edit')}}
        </div>
        @endif @if(Session::has('thatbai'))
        <div class="alert alert-danger">
            {{session('thatbai')}}
        </div>
        @endif
        <div class="row">
            <div class="col-xs-12">
                <div class="form-group row add">
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter some name" required>
                        <p class="error text-center alert alert-danger hidden"></p>
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-primary" type="submit" id="add">
                            <span class="glyphicon glyphicon-plus"></span> ADD
                        </button>
                    </div>
                </div>
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Nhà sản xuất</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="table-responsive text-center">
                        <table class="table table-borderless" id="table">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            @foreach($danhmucs as $item)
                            <tr class="item{{$item->id}}">
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>
                                    <button class="edit-modal btn btn-info btn-sm" data-id="{{$item->id}}" data-name="{{$item->name}}">
                                        <span class="glyphicon glyphicon-edit"></span> Edit
                                    </button>
                                    <button class="delete-modal btn btn-danger btn-sm" data-id="{{$item->id}}" data-name="{{$item->name}}">
                                        <span class="glyphicon glyphicon-trash"></span> Delete
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                        <input type="hidden" value="adddanhmuc" id="them"/>
                        <input type="hidden" value="editdanhmuc" id="sua"/>
                        <input type="hidden" value="deletedanhmuc" id="xoa"/>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="id">ID:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="fid" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="name">Name:</label>
                        <div class="col-sm-10">
                            <input type="name" class="form-control" id="n">
                        </div>
                    </div>
                </form>
                <div class="deleteContent">
                    Are you Sure you want to delete
                    <span class="dname"></span> ?
                    <span class="hidden did"></span>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn actionBtn" data-dismiss="modal">
                    <span id="footer_action_button" class='glyphicon'> </span>
                </button>
                <button type="button" class="btn btn-warning" data-dismiss="modal">
                    <span class='glyphicon glyphicon-remove'></span> Close
                </button>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/app1.js') }}"></script>
<script src="{{ asset('js/script2.js') }}"></script>
@endsection
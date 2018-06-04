@extends('admin.master') @section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Admin
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('user.index')}}">
                    <i class="fa fa-circle-o active"></i> Admin</a>
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
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Admin</h3>
                        <button type="button" class="btn btn-info btn-xs">
                            <a href="/user/create" style="color:inherit;">Add</a>
                        </button>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Delete</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        <button class="delete-modal btn btn-danger btn-xs" data-id="{{$user->id}}" data-name="{{$user->name}}">
                                            <span class="glyphicon glyphicon-trash"></span> Delete
                                        </button>
                                    </td>
                                    <td>
                                        <a href="/user/{{$user->id}}/edit">Edit</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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
                <div class="deleteContent">
                    Are you Sure you want to delete
                    <span class="dname"></span>
                    <span class="did"></span>?
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
            <input type="hidden" value="deleteUser" id="delete"/>
        </div>
    </div>
</div>

<script src="{{ asset('js/app1.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>
@endsection
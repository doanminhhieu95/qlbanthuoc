$(document).ready(function () {
    var them = $('#them').val();
    var sua = $('#sua').val();
    var xoa = $('#xoa').val();
    $("#add").click(function() {
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
        $.ajax({
            type: 'post',
            url: '/'+them,
            data: {
                '_token': $('input[name=_token]').val(),
                'name': $('input[name=name]').val(),
                'sohieu': $('input[name=sohieu]').val()
            },
            success: function(data) {
                if ((data.errors)) {
                    $('.error').addClass('hidden');
                    $('.error2').addClass('hidden');
                    if(data.errors.name){
                        $('.error').removeClass('hidden');
                        $('.error').text(data.errors.name);
                    }
                    if(data.errors.sohieu){
                        $('.error2').removeClass('hidden');
                        $('.error2').text(data.errors.sohieu);
                    }
                } else {
                    $('.error').addClass('hidden');
                    $('.error2').addClass('hidden');
                    var sohieu = data.sohieu;
                    if(sohieu == null) sohieu = "";
                    $('#table').append("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.name + "</td><td>" + sohieu + "</td><td><button class='edit-modal btn btn-info btn-sm' data-id='" + data.id + "' data-name='" + data.name + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger btn-sm' data-id='" + data.id + "' data-name='" + data.name + "'><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
                }
            },
        });
        $('#name').val('');
        $('#sohieu').val('');
    });
    $(document).on('click', '.edit-modal', function() {
        $('#footer_action_button').text(" Update");
        $('#footer_action_button').addClass('glyphicon-check');
        $('#footer_action_button').removeClass('glyphicon-trash');
        $('.actionBtn').addClass('btn-success');
        $('.actionBtn').removeClass('btn-danger');
        $('.actionBtn').removeClass('delete');
        $('.actionBtn').addClass('edit');
        $('.modal-title').text('Edit');
        $('.deleteContent').hide();
        $('.form-horizontal').show();
        $('#fid').val($(this).data('id'));
        $('#n').val($(this).data('name'));
        $('#s').val($(this).data('sohieu'));
        $('#myModal').modal('show');
    });
    $('.modal-footer').on('click', '.edit', function() {
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
        $.ajax({
            type: 'post',
            url: '/' + sua,
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $("#fid").val(),
                'name': $('#n').val(),
                'sohieu': $('#s').val()
            },
            success: function(data) {
                if ((data.errors)) {
                    // $('.error').removeClass('hidden');
                    // $('.error').text(data.errors.name);
                    alert(data.errors.name);
                } else {
                    $('.error').addClass('hidden');
                    $('.error2').addClass('hidden');
                    var sohieu = data.sohieu;
                    if(sohieu == null) sohieu = "";
                    $('.item' + data.id).replaceWith("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.name + "</td><td>" + sohieu + "</td><td><button class='edit-modal btn btn-info btn-sm' data-id='" + data.id + "' data-name='" + data.name + "' data-sohieu='" + data.sohieu + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger btn-sm' data-id='" + data.id + "' data-name='" + data.name + "' ><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
                }
            }
        });
    });
    $(document).on('click', '.delete-modal', function() {
        $('#footer_action_button').text(" Delete");
        $('#footer_action_button').removeClass('glyphicon-check');
        $('#footer_action_button').addClass('glyphicon-trash');
        $('.actionBtn').removeClass('btn-success');
        $('.actionBtn').removeClass('edit');
        $('.actionBtn').addClass('btn-danger');
        $('.actionBtn').addClass('delete');
        $('.modal-title').text('Delete');
        $('.did').text($(this).data('id'));
        $('.deleteContent').show();
        $('.form-horizontal').hide();
        $('.dname').html($(this).data('name'));
        $('#myModal').modal('show');
    });
    $('.modal-footer').on('click', '.delete', function() {
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
        $.ajax({
            type: 'post',
            url: '/' + xoa,
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $('.did').text()
            },
            success: function(data) {
                $('.item' + $('.did').text()).remove();
            }
        });
    });
});
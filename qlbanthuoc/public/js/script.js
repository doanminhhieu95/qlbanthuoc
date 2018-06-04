$(document).ready(function () {
    var a;
    $(document).on('click', '.delete-modal', function () {
        $('#footer_action_button').text("Delete");
        $('#footer_action_button').addClass('glyphicon-trash');
        $('.actionBtn').addClass('btn-danger');
        $('.actionBtn').addClass('delete');
        $('.modal-title').text('Delete');
        $('.did').text($(this).data('id'));
        $('.dname').html($(this).data('name'));
        $('.deleteContent').show();
        $('#myModal').modal('show');
        a = $(this);
    });
    $('.modal-footer').on('click', '.delete', function () {
        var link = $('#delete').val();
        $.ajax({
            type: 'get',
            url: '/'+link,
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $('.did').text()
            },
            success: function (data) {
                // a.parent().parent().remove();
                if(data=="1"){
                    alert("Can not delete the last admin");
                }
                else a.parent().parent().remove();
            }
        });
    });
    $("#add").click(function() {
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
        $.ajax({
            type: 'post',
            url: '/addItem',
            data: {
                '_token': $('input[name=_token]').val(),
                'name': $('input[name=name]').val()
            },
            success: function(data) {
                if ((data.errors)) {
                    $('.error').removeClass('hidden');
                    $('.error').text(data.errors.name);
                } else {
                    $('.error').remove();
                    $('#table').append("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.name + "</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-name='" + data.name + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-name='" + data.name + "'><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
                }
            },
            error: function(){
                alert('ok');
            }
        });
        $('#name').val('');
    });
});
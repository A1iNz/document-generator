@extends('layout.main')
@section('title')
<span>Master Jenis Dokumen</span>
    <a href="javascript:void()" onclick="create()" class="btn btn-success btn-sm rounded-circle"><i class="fa fa-plus-circle"></i></a>
@endsection
@section('content')
<div class="container mt-5 pb-5">
    <div class="panel panel-default">
        <div class="panel-body">
            <table id="table" class="table table-bordered" enctype>
                <thead>
                    <tr>
                        <th>Nama Surat</th>
                        <th>Object</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script>
    var datatable;
        $(function(){
            datatable = $('#table').DataTable({
                processing:true,
                searchDelay:1000,
                serverSide:true,
                ajax:'<?= route('jenis_dokumen.get') ?>',
                columns:[
                    {data: 'nama_surat', name: 'nama_surat'},
                    {data: 'object', name: 'object'},
                    {data: 'id',width: '150px', searchable: false, orderable: false, class: 'text-right nowrap',mRender: function(data){
                      return '<a href="javascript:void()" class="btn btn-info btn-sm" onclick="view('+data+')">view</a> \n\
                              <a href="javascript:void()" class="btn btn-warning btn-sm" onclick="edit('+data+')">edit</a>\n\
                              <a href="javascript:void()" class="btn btn-danger btn-sm" onclick="destroy('+data+')">delete</a>';
                    }}
                ]
            });
        })

        function create(){
            $.ajax({
                url: '<?= route('jenis_dokumen.create') ?>',
                success: function(response){
                bootbox.dialog({
                    title: 'create',
                    message: response,
                });
                datatable.ajax.reload()
                }
            });
        }
        
        function edit(id){
        $.ajax({
          url: '<?= route('jenis_dokumen.edit') ?>/'+id,
          success: function(response){
            bootbox.dialog({
                title: 'edit',
                message: response
              });
              datatable.ajax.reload()
          }
        });
      }

      function update(id){
        $('#form_jenis_dokumen .alert').remove();
        $.ajax({
          url: '<?= route('jenis_dokumen.update') ?>/'+id,
          dataType: 'json',
          type: 'post',
          data: $('#form_jenis_dokumen').serialize(),
          success: function(response){
            if(response.success){
                    swal({
                    title: "Create",
                    text: response.message,
                    icon: "success",
                    button: "Oke",
                    });
                    bootbox.hideAll();
                    datable.ajax.reload();
            }else{
              swal({
                    title: "Create",
                    text: response.message,
                    icon: "warning",
                    button: "Oke",
                    });
            }
          },
          error: function(xhr, ajaxOptions, thrownError){
            var response = JSON.parse(xhr.responseText);
            $('#form_jenis_dokumen').prepend(validation(response));
          }
        });
      }

      function store(){
        $('#form_jenis_dokumen .alert').remove();
        $.ajax({
          url: '<?= route('jenis_dokumen.store'); ?>',
          dataType: 'json',
          type: 'post',
          data: $('#form_jenis_dokumen').serialize(),
          success: function(response){
            if(response.success){
              alert(response.message);
              bootbox.hideAll();
              datatable.ajax.reload();
            }else{
              alert(response.message);
            }
          },
          error: function(xhr, ajaxOptions, thrownError){
            var response = JSON.parse(xhr.responseText);
            $('#form_jenis_dokumen').prepend(validation(response));
          }
        });
      }

      function destroy(id){
        $.ajax({
          url: '<?= route('jenis_dokumen.delete') ?>/'+id,
          dataType: 'json',
          success: function(response){
            if(response.success){
                swal({
                    title: "delete",
                    text: response.message,
                    icon: "success",
                    button: "Oke",
                    });
                    get();
                    bootbox.hideAll();
                    Datatable.ajax.reload()
            }else{
              swal({
                    title: "delete",
                    text: response.message,
                    icon: "warning",
                    button: "Oke",
                    });
                    bootbox.hideAll();
            }
          }
        });
      }

      function validation(errors){
        var validation = '<div class="alert alert-danger">';
            validation += '<p><b>'+errors.message+'</b></p>';
            $.each(errors.errors, function(i, error){
              validation += error[0]+'<br>';
            });
            validation += '</div>';
            return validation;
      }
  </script>
@endsection
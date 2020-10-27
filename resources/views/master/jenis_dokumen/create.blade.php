{!! Form::open(['id' => 'form_jenis_dokumen', 'enctype' => 'multipart/form-data']) !!}
@include('master.jenis_dokumen.form')
    <button type="button" class="btn btn-primary btn-sm" onclick="store('file')">Store</button>
    <button type="button" class="btn btn-defaults btn-sm" onclick="bootbox.hideAll()">Cancel</button>
{!! Form::close() !!}
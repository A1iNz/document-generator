<div class="form-group">
    <label>Nama Surat</label>
    {!! Form::text('nama_surat', null, ['class' => 'form-control', 'id' => 'nama_surat']) !!}
</div>
<div class="form-group">
    <label>Object</label>
    {!! Form::text('object', null, ['class' => 'form-control', 'id' => 'object']) !!}
</div>
<div class="form-group">
    <label>Upload</label>
    {!! Form::file('file', null, ['class' => 'form-control', 'id' => 'file']); !!}
</div>
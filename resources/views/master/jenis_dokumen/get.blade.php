<!-- @foreach($model as $row)
        <tr>
            <td>{!! $row->id !!}</td>
            <td>{!! $row->nama_surat !!}</td>
            <td>{!! $row->object !!}</td>
            <td>{!! $row->format !!}</td>
            <td>
                <a href="javascript:void()" class="btn btn-info btn-sm" onclick="view(<?= $row->id; ?>)">view</a>
                <a href="javascript:void()" class="btn btn-warning btn-sm" onclick="edit(<?= $row->id; ?>)">Edit</a>
                <a href="javascript:void()" class="btn btn-danger btn-sm" onclick="destroy(<?= $row->id ?>)">delete</a>
            </td>
        </tr>
    @endforeach -->
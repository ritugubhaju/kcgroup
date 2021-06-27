<tr>
    <td>{{++$key}}</td>
    <td>{{ Str::limit($gallery->title, 47) }}</td>
    <td>{{ Str::limit($gallery->album->name, 47) }}</td>

    <td class="text-center">
        @if($gallery->is_published =='1')
            <span class="badge" style="background-color: #419645">{{$gallery->is_published ? 'Yes' : 'No'}}</span>
        @elseif($gallery->is_published =='0')
            <span class="badge" style="background-color: #f44336">{{$gallery->is_published ? 'Yes' : 'No'}}</span>
        @endif    </td>
    <td class="text-right">
        <a href="{{ route('gallery.edit', $gallery->slug)}}" class="btn btn-flat btn-primary btn-xs" title="edit">
            <i class="glyphicon glyphicon-edit"></i>
        </a>
        <a href="{{ route('gallery.destroy', $gallery->id) }}">
            <button type="button" 
                class="btn btn-flat btn-danger btn-xs item-delete" title="delete">
                <i class="glyphicon glyphicon-trash"></i>
            </button>
    </td>
</tr>


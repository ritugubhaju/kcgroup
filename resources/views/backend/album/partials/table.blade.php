<tr>
    <td>{{++$key}}</td>
{{--    <td><img src="{{asset($album->thumbnail_path)}}" class="img-circle width-1" alt="album_image" width="50" height="50"></td>--}}
    <td>{{ Str::limit($album->name, 47) }}</td>
{{--    <td class="text-center">{{ Carbon\Carbon::parse($album->date)->format('Y-m-d') }}</td>--}}
    <td class="text-right">
        <a href="{{route('album.edit', $album->slug)}}" class="btn btn-flat btn-primary btn-xs" title="edit">
            <i class="glyphicon glyphicon-edit"></i>
        </a>
        <a href="{{ route('album.destroy', $album->id) }}">
            <button type="button" 
                class="btn btn-flat btn-danger btn-xs item-delename="delete">
                <i class="glyphicon glyphicon-trash"></i>
            </button>
    </td>
</tr>


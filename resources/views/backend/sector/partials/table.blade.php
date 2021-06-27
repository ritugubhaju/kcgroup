<tr>
    <td>{{++$key}}</td>
    <td><img src="{{asset($sector->thumbnail_path)}}" class="img-circle width-1" alt="sector_image" width="50" height="50"></td>
    <td>{{ Str::limit($sector->title, 47) }}</td>

    <td class="text-center">
        @if($sector->is_published =='1')
            <span class="badge" style="background-color: #419645">{{$sector->is_published ? 'Yes' : 'No'}}</span>
        @elseif($sector->is_published =='0')
            <span class="badge" style="background-color: #f44336">{{$sector->is_published ? 'Yes' : 'No'}}</span>
        @endif    </td>
    <td class="text-right">
        <a href="{{route('sector.edit', $sector->slug)}}" class="btn btn-flat btn-primary btn-xs" title="edit">
            <i class="glyphicon glyphicon-edit"></i>
        </a>
        <a href="{{ route('sector.destroy', $sector->id) }}">
        <button type="button" 
            class="btn btn-flat btn-danger btn-xs item-delete" title="delete">
            <i class="glyphicon glyphicon-trash"></i>
        </button>
    </td>
</tr>


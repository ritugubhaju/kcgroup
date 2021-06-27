<tr>
    <td>{{++$key}}</td>
   
    <td>{{ Str::limit($video->title, 47) }}</td>
    

    <td class="text-center">
        @if($video->is_published =='1')
            <span class="badge" style="background-color: #419645">{{$video->is_published ? 'Yes' : 'No'}}</span>
        @elseif($video->is_published =='0')
            <span class="badge" style="background-color: #f44336">{{$video->is_published ? 'Yes' : 'No'}}</span>
        @endif    </td>
    <td class="text-right">
        <a href="{{ route('video.edit', $video->id)}}" class="btn btn-flat btn-primary btn-xs" title="edit">
            <i class="glyphicon glyphicon-edit"></i>
        </a>
        <a href="{{ route('video.destroy', $video->id) }}">
            <button type="button" 
                class="btn btn-flat btn-danger btn-xs item-delete" title="delete">
                <i class="glyphicon glyphicon-trash"></i>
            </button>
    </td>
</tr>


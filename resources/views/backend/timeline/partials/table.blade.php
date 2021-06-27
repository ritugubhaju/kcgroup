<tr>
    <td>{{++$key}}</td>
    <td><img src="{{asset($timeline->thumbnail_path)}}" class="img-circle width-1" alt="timeline_image" width="50" height="50"></td>
    <td>{{ Str::limit($timeline->title, 47) }}</td>
    <td class="text-center">{{ ($timeline->timeline_date)->format('Y-m-d') }}</td>

    <td class="text-center">
        @if($timeline->is_published =='1')
            <span class="badge" style="background-color: #419645">{{$timeline->is_published ? 'Yes' : 'No'}}</span>
        @elseif($timeline->is_published =='0')
            <span class="badge" style="background-color: #f44336">{{$timeline->is_published ? 'Yes' : 'No'}}</span>
        @endif    </td>
    <td class="text-right">
        <a href="{{route('timeline.edit', $timeline->slug)}}" class="btn btn-flat btn-primary btn-xs" title="edit">
            <i class="glyphicon glyphicon-edit"></i>
        </a>
        <a href="{{ route('timeline.destroy', $timeline->id) }}">
        <button type="button" 
            class="btn btn-flat btn-danger btn-xs item-delete" title="delete">
            <i class="glyphicon glyphicon-trash"></i>
        </button>
    </td>
</tr>


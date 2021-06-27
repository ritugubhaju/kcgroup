<tr>
    <td>{{++$key}}</td>
    <td><img src="{{asset($event->thumbnail_path)}}" class="img-circle width-1" alt="event_image" width="50" height="50"></td>
    <td>{{ Str::limit($event->title, 47) }}</td>
    <td class="text-center">{{ ($event->event_date)->format('Y-m-d') }}</td>

    <td class="text-center">
        @if($event->is_published =='1')
            <span class="badge" style="background-color: #419645">{{$event->is_published ? 'Yes' : 'No'}}</span>
        @elseif($event->is_published =='0')
            <span class="badge" style="background-color: #f44336">{{$event->is_published ? 'Yes' : 'No'}}</span>
        @endif    </td>
    <td class="text-right">
        <a href="{{route('event.edit', $event->slug)}}" class="btn btn-flat btn-primary btn-xs" title="edit">
            <i class="glyphicon glyphicon-edit"></i>
        </a>
        <a href="{{ route('event.destroy', $event->id) }}">
        <button type="button" 
            class="btn btn-flat btn-danger btn-xs item-delete" title="delete">
            <i class="glyphicon glyphicon-trash"></i>
        </button>
    </td>
</tr>


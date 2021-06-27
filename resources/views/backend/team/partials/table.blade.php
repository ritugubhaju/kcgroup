<tr>
    <td>{{++$key}}</td>
    <td>{{ str_limit($team->title,15) }}</td>
    <td>{!!str_limit($team->position,35) !!}</td>
    <td>{{$team->view}}</td>
    <td class="text-center">
        <span class="badge">{{ $team->is_published ? 'Yes' : 'No' }}</span>
    </td>

    <td class="text-right">
        <a href="{{route('team.edit', $team->slug)}}" class="btn btn-flat btn-primary btn-xs" title="edit">
            <i class="glyphicon glyphicon-edit"></i>
        </a>
        <a href="{{ route('team.destroy', $team->id) }}">
        <button type="button" 
            class="btn btn-flat btn-danger btn-xs item-delete" title="delete">
            <i class="glyphicon glyphicon-trash"></i>
        </button>
    </td>
</tr>

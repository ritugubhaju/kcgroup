<tr>
    <td>{{++$key}}</td>
    <td><img src="{{asset($project->thumbnail_path)}}" class="img-circle width-1" alt="project_image" width="50" height="50"></td>
    <td>{{ Str::limit($project->title, 47) }}</td>

    <td class="text-center">
        @if($project->is_published =='1')
            <span class="badge" style="background-color: #419645">{{$project->is_published ? 'Yes' : 'No'}}</span>
        @elseif($project->is_published =='0')
            <span class="badge" style="background-color: #f44336">{{$project->is_published ? 'Yes' : 'No'}}</span>
        @endif    </td>

    <td class="text-center">
        @if($project->type =='Completed')
            <span class="badge" style="background-color: #419645">{{$project->type ? 'Completed' : 'Ongoing'}}</span>
        @elseif($project->type =='Ongoing')
            <span class="badge" style="background-color: #f44336">{{$project->type ? 'Ongoing' : 'Completed'}}</span>
        @endif    </td>
    <td class="text-right">
        <a href="{{route('project.edit', $project->slug)}}" class="btn btn-flat btn-primary btn-xs" title="edit">
            <i class="glyphicon glyphicon-edit"></i>
        </a>
        <a href="{{ route('project.destroy', $project->id) }}">
        <button type="button" 
            class="btn btn-flat btn-danger btn-xs item-delete" title="delete">
            <i class="glyphicon glyphicon-trash"></i>
        </button>
    </td>
</tr>


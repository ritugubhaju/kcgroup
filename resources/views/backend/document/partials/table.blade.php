<tr>
    <td>{{++$key}}</td>
    <td>{{ Str::limit($document->title, 47) }}</td>
    <td class="text-center">{{ Carbon\Carbon::parse($document->created_at)->format('Y-m-d') }}</td>
    
    <td class="text-center">
        @if($document->is_published =='1')
            <span class="badge" style="background-color: #419645">{{$document->is_published ? 'Yes' : 'No'}}</span>
        @elseif($document->is_published =='0')
            <span class="badge" style="background-color: #f44336">{{$document->is_published ? 'Yes' : 'No'}}</span>
        @endif    </td>
    <td class="text-right">
        <a href="{{route('document.edit', $document->slug)}}" class="btn btn-flat btn-primary btn-xs" title="edit">
            <i class="glyphicon glyphicon-edit"></i>
        </a>
        <a href="{{ route('document.destroy', $document->id) }}">
        <button type="button" 
            class="btn btn-flat btn-danger btn-xs item-delete" title="delete">
            <i class="glyphicon glyphicon-trash"></i>
        </button>
    </td>
</tr>


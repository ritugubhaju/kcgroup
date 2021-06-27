<tr>
    <td>{{++$key}}</td>
    <td><img src="{{asset($client->thumbnail_path)}}" class="img-circle width-1" alt="client_image" width="50" height="50"></td>
    <td>{{ Str::limit($client->title, 47) }}</td>
    <td class="text-center">
        @if($client->is_published =='1')
            <span class="badge" style="background-color: #419645">{{$client->is_published ? 'Yes' : 'No'}}</span>
        @elseif($client->is_published =='0')
            <span class="badge" style="background-color: #f44336">{{$client->is_published ? 'Yes' : 'No'}}</span>
        @endif    </td>
    <td class="text-right">
        <a href="{{route('client.edit', $client->slug)}}" class="btn btn-flat btn-primary btn-name="edit">
            <i class="glyphicon glyphicon-edit"></i>
        </a>
        <a href="{{ route('client.destroy', $client->id) }}">
        <button type="button" 
            class="btn btn-flat btn-danger btn-xs item-delename="delete">
            <i class="glyphicon glyphicon-trash"></i>
        </button>
    </td>
</tr>


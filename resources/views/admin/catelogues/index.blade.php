@extends('admin.layouts.master')

@section('title')
Danh sach danh muc san pham
@endsection

@section('content')
<a href="{{ route('admin.catelogues.create')}}">
    <button class="btn btn-primary">Add</button>
</a>
</button>
<table class="table">
    <tr>
        <th>ID</th>
        <th>NAME</th>
        <th>COVER</th>
        <th>IS ACTIVE</th>
        <th>CREATED AR</th>
        <th>UPDATE AR</th>
        <th>ACTION</th>
    </tr>
    @foreach($data as $item)
    <tr>
        <td>{{ $item -> id}}</td>
        <td>{{ $item -> name}}</td>
        <td>
            <img src="{{ \Storage::url($item -> cover) }}" alt="" width="50px">
        </td>
        <td>{!! $item -> is_active ? 
            '<span class="badge bg-primary">Yes</span>' : 
            '<span class="badge bg-danger">No</span>
            '!!}</td>
        <td>{{ $item -> created_at}}</td>
        <td>{{ $item -> updated_at	}}</td>
        <td>
        <a href="{{ route('admin.catelogues.show', $item->id)}}" class="btn btn-info">Xem</a>
        <a href="{{ route('admin.catelogues.edit', $item->id)}}" class="btn btn-warning">Update</a>

        <a href="{{ route('admin.catelogues.destroy', $item->id)}}"
        onclick="return confirm('Ban co chac chan muon xoa?')"
        class="btn btn-danger">Xoa</a>
        </td>
    </tr>
    @endforeach
</table>
{{$data->links()}}
@endsection
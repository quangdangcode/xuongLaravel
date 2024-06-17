@extends('admin.layouts.master')

@section('title')
Chi tiet : {{$model->name}}
@endsection

@section('content')
<table>
    <tr>
        <th>Truong</th>
        <th>Gia tri</th>
    </tr>
    @foreach($model ->toArray() as $key => $value)
    <tr>
        <td>{{$key}}</td>
        <td>
            @php
            if($key == 'cover'){
            $url = \Storage::url($value);
            echo "<img src=\"$url\" alt=\"\" width=\"50px\">";
            } elseif (Str::startsWith($key, 'is_')) { // Giả định hàm đúng là startsWith
            echo $value
            ? '<span class="badge bg-primary">Yes</span>'
            : '<span class="badge bg-danger">No</span>';
            } else {
            echo $value;
            }
            @endphp

        </td>
    </tr>
    @endforeach
</table>
@endsection
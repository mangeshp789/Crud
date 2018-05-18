@extends('layouts.app')

@section('content')
  @if(Session::has('message'))
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif
<div class="container">
   <div class="tableallRecords">
        <table class="table">
            <tr>
                <th>Sr.no</th>
                <th>name</th>
                <th>emailID</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <tbody>
                @foreach(App\User::all() as $key=>$value)
                    <tr>
                        <td>{{$key + 1}}</td>
                        <td>{{$value->name}}</td>
                        <td>{{$value->email}}</td>
                        <td><a href="{{url('/view/'.$value->id)}}" class="btn btn-primary">Edit</a></td>
                        <td><a href="{{url('/delete/'.$value->id)}}" class="btn btn-danger">Delete</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
   </div>
</div>
@endsection
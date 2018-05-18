@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <form action="{{url('/edit/'.$id)}}" method="post">
               {{csrf_field()}}
              <?php $user = App\User::find($id); ?>
              
            <div class="form-group">
                <label class="col-sm-1 control-label">Name</label>
                    <div class="col-sm-4">
                         <input type="text" value="{{$user->name}}" class="form-control" required="required" name="firstname">
                    </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label">email</label>
                    <div class="col-sm-4">
                         <input type="text" value="{{$user->email}}" class="form-control" required="required" name="email">
                    </div>
            </div>
            <input type="submit" value="submit" class="btn btn-primary" name="submit">
        </form>
    </div>
</div>
@endsection

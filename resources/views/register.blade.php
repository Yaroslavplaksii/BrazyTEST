@extends('app')
@section('content')
    <div>
        <h1 class="logo-name">IN+</h1>
    </div>
    <h3>Welcome to IN+</h3>
    <p>Perfectly designed and precisely prepared admin theme with over 50 pages with extra new web app views.</p>
    <p>Register. To see it in action.</p>
    @if(session('status'))
        {{session('status')}}
    @endif
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form class="m-t" role="form" action="/register" method="POST">
        {{csrf_field()}}
        <div class="form-group">
            <input type="text" name="email" class="form-control" placeholder="Username" value="{{old('email')}}" >
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Password" value="{{old('password')}}">
        </div>
        <div class="form-group">
            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" value="{{old('password_confirmation')}}">
        </div>
        <button type="submit" class="btn btn-primary block full-width m-b">Register</button>

        <a href="#"><small>Forgot password?</small></a>
        <p class="text-muted text-center"><small>Do you have an account?</small></p>
        <a class="btn btn-sm btn-white btn-block" href="/">Login in an account</a>
    </form>
    <p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small></p>
@endsection
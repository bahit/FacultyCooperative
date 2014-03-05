@extends("main")
@section("content")
    {{ Form::open([
        "url"   =>  "users/create", 
        "class" =>  "form-signup"
    ]) }}
        <h2 class="form-signup-heading">Register here</h2>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <input type="name" name="name" class="form-control" placeholder="Name" required autofocus>
        <input type="email" name="email" class="form-control" placeholder="Email address" required>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>

        <button class="btn btn-lg btn-primary btn-block" type="submit" value="Register">Register</button>
    {{ Form::close() }}
@stop
@section("footer")
    @parent
    <script src="//polyfill.io"></script>
@stop
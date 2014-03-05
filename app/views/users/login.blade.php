@extends("main")
@section("content")
    {{ Form::open([
        "url"        => "users/signin",
        "autocomplete" => "off",
        "class" => "form-signin"
    ]) }}
        <h2 class="form-signin-heading">Please sign in</h2>
        <input type="email" name="email" class="form-control" placeholder="Email address" required autofocus>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label>
        @if ($error = $errors->first("password"))
            <div class="alert alert-danger">
                {{ $error }}
            </div>
        @endif

        <button class="btn btn-lg btn-primary btn-block" type="submit" value="Login">Sign in</button>
    {{ Form::close() }}
@stop
@section("footer")
    @parent
    <script src="//polyfill.io"></script>
@stop
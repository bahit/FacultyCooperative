@extends("main")
@section("content")
<div class="row">
    <div class="span12">
      <div class="jumbotron center">
          <h1>Sorry, that page <br>doesn't exists!<small><font face="Tahoma" color="red">Error 404</font></small></h1>
          <br />
          <p>The page you requested could not be found, either contact your webmaster or try again. Use your browsers <b>Back</b> button to navigate to the page you have prevously come from</p>
          <p><b>Or you could just press this neat little button:</b></p>
          <a href="{{ URL::to('home') }}" class="btn btn-large btn-info"><i class="glyphicon glyphicon-home"></i> Take Me Home</a>
        </div> 
    </div>
  </div>
@stop
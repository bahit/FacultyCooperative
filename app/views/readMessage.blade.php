@extends('main')
@section('content')


<h3>Read you messages {{$user->name}}</h3>

<!--SEE profile controller - need to resize image when saved!!!  ST -->
<p><img src='../images/{{$user->image}}' width="100px"/></p>





@if(isset($readMessages))



@foreach($readMessages as $readMessage)

<p>message: {{$readMessage->content}}
Time sent: {{$readMessage->created_at}}
Read Flag: {{$readMessage->read_flag}}</p>



@endforeach
@endif


@endsection





@extends('main')
@section('content')


<h3>Read you messages {{$user->name}}</h3>

<!--SEE profile controller - need to resize image when saved!!!
  Path a problem here ST -->
<p><img src='/FacultyCooperative/public/images/{{$user->image}}' width="100px"/></p>


@if(isset($readMessages))

<h4><em>This could look much nicer with some styling to tidy it up!!</em></h4>

@foreach($readMessages as $readMessage)

<p>subject: <a href='/FacultyCooperative/public/readMessage/{{$user->id}}/{{$readMessage->id}}'>
        {{$readMessage->subject}}</a>
    sent: {{$readMessage->created_at}}
    From: {{$readMessage->name}}

    @if(!$readMessage->read_flag)

    <!-- TODO  inline style needs taking out -->
    <span style="background-color:red;">   UNREAD</span>
    @endif

    @if(isset($message))
    @if($message->id==$readMessage->id)
<p>{{$message->body}}</p>
<p><img src='/FacultyCooperative/public/images/{{$readMessage->image}}' width="100px"/></p>


<p><a href='/FacultyCooperative/public/sendMessage/{{$readMessage->from_user_id}}'> REPLY NOW</a></p>

@endif
@endif


</p>


@endforeach
@endif


@endsection





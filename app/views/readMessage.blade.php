@extends('main')
@section('content')

<div class="msgbanner">
	<div class="msg-img">
		<img src='../image2/profile/{{$user->image}}' width="100px"/>
    </div>
	<div class="msg-text">
    	<h2> {{$user->name}}'s messages</h2>
    </div>   
</div>

<div class="msg-content">

@if(isset($readMessages))
@foreach($readMessages as $readMessage)

<div class='new{{$readMessage->id}}' style="background-color:red; display:inline;">
    @if(!$readMessage->read_flag)
    NEW
    @endif

</div>

    <button id='{{$readMessage->id}}'>{{$readMessage->subject}}</button>


    sent: {{$readMessage->created_at}}
    From: {{$readMessage->name}}

    <div class='result a{{$readMessage->id}}'>
    <div class='body'><p>{{$readMessage->body}}</p></div>
    <p><img src='../image2/thumb/{{$readMessage->image}}' width="100px"/></p>

    <p><a href='../sendMessage/{{$readMessage->from_user_id}}'> REPLY NOW</a></p>

    </div>


</p>


@endforeach
@endif

</div>


@endsection

@section("script")
    <script>
    $(document).ready(function(){

        $( ".result" ).hide();

        $("button").click(function(){
            var bid = this.id;
            //alert("Data: " + bid);
            $.post("../messageBodyAjax",
                {
                    "bid":bid


                },
                function(data,status){

                    $( ".result" ).hide();

                    $( ".new"+bid ).hide();
                    $( ".a"+bid ).slideDown( "slow", function() {
                        // Animation complete.
                    });


                });
        });
    });
</script>
@stop





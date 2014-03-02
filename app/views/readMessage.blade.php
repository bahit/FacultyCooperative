@extends('main')
@section('content')




<script>
    $(document).ready(function(){

        $( ".result" ).hide();

        $("button").click(function(){
            var bid = this.id;
            //alert("Data: " + bid);
            $.post("/FacultyCooperative/public/messageBodyAjax",
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

<h3>Read your messages {{$user->name}}</h3>

<!--SEE profile controller - need to resize image when saved!!!
  Path a problem here ST -->
<p><img src='/FacultyCooperative/public/images/{{$user->image}}' width="100px"/></p>


@if(isset($readMessages))

<h4><em>This could look much nicer with some styling to tidy it up!!</em></h4>

@foreach($readMessages as $readMessage)

<p>

    <!-- TODO  inline style needs taking out -->
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
    <p><img src='/FacultyCooperative/public/images/{{$readMessage->image}}' width="100px"/></p>

    <p><a href='/FacultyCooperative/public/sendMessage/{{$readMessage->from_user_id}}'> REPLY NOW</a></p>

    </div>


</p>


@endforeach
@endif


@endsection





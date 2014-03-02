@extends('main')
@section('content')
<div class="welcome">

    <h1>Ajax testing</h1>
</div>





<script>
    $(document).ready(function(){

        $( ".result" ).hide();

        $("button").click(function(){
            var bid = this.id;
            //alert("Data: " + bid);
            $.post("testPost",
                {
                    "bid":bid


                },
                function(data,status){

                    $( ".result" ).hide();
                    //alert("Data: " + data.name + "\nStatus: " + status);
                    $( ".name" ).empty().append( data.name);

                    $( ".a"+data.id ).slideDown( "slow", function() {
                        // Animation complete.
                    });


                });
        });
    });
</script>


<h2>Ajax test</h2>

@for ($i = 1; $i < 4; $i++)

<button id='{{$i}}'>ajax button</button>


<h2><div class="result a{{$i}}">

    <div class='name'></div>
    <img src='images/default.jpg' height="80px"/>


    </div></h2>

@endfor



@if(isset($user))

kjijo

@endif


{{ Form::open(array('url' => 'testPost', 'id' => 'form1', 'method' => 'post')) }}


{{ Form::label( 'setting_name', 'Setting Name:' ) }}
{{ Form::text( 'setting_name', '', array(
'id' => 'setting_name','placeholder' => 'Enter Setting Name','maxlength' => 20,
'required' => true,
) ) }}


{{ Form::submit( 'Add Setting', array(
'id' => 'btn-add-setting',
) ) }}

{{ Form::close() }}


@endsection

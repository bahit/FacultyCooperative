@extends('main')
@section('content')

<!-- seems to be a bug effecting alignment of first item on page so this is a work around -->
<div style="visibility: hidden">&nbsp; </div>

<h1>Edit your Profile, {{$profile->name}}</h1>

@if(isset($success))


<h4 class="alert alert-success">Thank you - your profile has been updated</h4>


<h4 class="alert alert-success"><a href="{{URL::to('')}}/publicProfile/{{$profile->id}}">
        Follow this link to see how your profile page looks now</a></h4>


@endif

<!--This picks up errors from validation-->
{{ HTML::ul($errors->all()) }}


{{ Form::open(array('url' => 'updateProfile', 'files' => true, 'method' => 'post','class' => 'form-horizontal')) }}

<fieldset>

    <!-- Main Form Name -->
    <legend>Profile Details</legend>


    <!-- Name Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="title">Name</label>

        <div class="col-md-4">
            {{ Form::text('name', $profile->name, array('class'=>'form-control input-md', 'placeholder'=>'Name',
            'required' => '')) }}

        </div>
    </div>


    <div class="form-group">
        <label class="col-md-4 control-label" for="Current Image">Current Image</label>

        <div class="col-md-4">
            <img src='{{URL::to('')}}/image2/profile/{{$profile->image}}' />
        </div>
    </div>

    <!-- Image File Button -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="logo">Upload New Image</label>

        <div class="col-md-4">
            <input id="image" name="image" class="input-file" type="file">
        </div>
    </div>

    <div class="form-group" id="previewDiv">
        <label class="col-md-4 control-label" for="preview">New Image</label>
        <div class="col-md-4">
        <img id="preview" alt="Upload Image Preview" width="200px" height="200px"/>

    </div>
    </div>

    <!-- Description Textarea -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="description">Tell us about yourself </label>

        <div class="col-md-4">
            {{ Form::textarea('bioDetails', $profile->bio_details, array('class'=>'form-control')) }}
        </div>
    </div>


    <div class="form-group">
        <label class="col-md-4 control-label" for="careerstatus">Career Status </label>

        <div class="col-md-4">

            <!--We might want to populate these pull down boxes from the database-->
            {{ Form::select('careerStatus', array(
            'default' => $profile->career_status,
            'Academic Professional' => 'Academic Professional',
            'Business Professional' => 'Business Professional',
            'Postgraduate Student' => 'Postgraduate Student',
            'Undergraduate Student' => 'Undergraduate Student'
            ),'default') }}
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label" for="institution">Institution </label>

        <div class="col-md-4">

            {{ Form::text('institution', $profile->institution, array('class'=>'input-block-level')) }}

        </div>
    </div>

    <!--I think a public profile should not talk about investment amount - just a boolean yes/no here -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="investmentOffered">Are you willing to offer investment? </label>

        <div class="col-md-4">

            {{ Form::checkbox('investmentOffered', 'yes', $profile->investmentOffered) }}

        </div>
    </div>
    <br>
    <br>

    <!--The skills heirachy needs to go in here somehow - or we simplify with just a text entry -->
    <h3>What skills can you offer:</h3>


    @if(isset($skills))

    {{$category=''}}

    @foreach($skills as $key => $skill)

    @if ($category<>$skill["category"])
    <h4>{{$skill["category"]}}</h4>
    @endif

    {{$skill["skill_name"]}}

    <input tabindex="1" type="checkbox" name="skillsCB[]" id="{{$skill["id"]}}" value="{{$skill["id"]}}"
    {{$skill["checked"]}}>&nbsp;&nbsp;



    <?php $category = $skill["category"] ?>
    @endforeach
    @endif


    <br><br>


    {{ Form::submit('Update your Profile',array('class' => 'btn btn-primary')) }}


    {{ Form::close() }}
</fieldset>

@endsection
@section("script")
<script>

    $(document).ready(function(){
        $( "#previewDiv" ).hide();
       // alert("I am an alert box!");
    });

    function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);

        }
    }

    $("#image").change(function () {
        $("#previewDiv").show();
        previewImage(this);
    });

</script>
@stop

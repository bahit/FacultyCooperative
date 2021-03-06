@extends('main')
@section('content')

<!-- seems to be a bug effecting alignment of first item on page so this is a work around -->
<div style="visibility: hidden">&nbsp; </div>

<h1>Edit Venture</h1>

<h2><a href='../viewVenture/{{$venture->id}}'>{{$venture->title}}</a></h2>

@if(isset($success))

<h4 class="alert alert-success">Thank you - your venture has been updated</h4>

<h4 class="alert alert-success"><a href="{{URL::to('')}}/viewVenture/{{$venture->id}}" >Follow this link to see how your venture page looks now</a></h4>

@endif

<!--This picks up errors from validation-->
{{ HTML::ul($errors->all()) }}


<!-- Start of form -->
{{ Form::open(array('url' => 'updateVenture/'.$venture->id, 'files' => true, 'method' => 'post', 'class' => 'form-horizontal')) }}
  
  <fieldset>

  <!-- Main Form Name -->
  <legend>Venture Details</legend>

  <!-- Title Text input-->
  <div class="form-group">
    <label class="col-md-4 control-label" for="title">Title</label>  
    <div class="col-md-4">
    {{ Form::text('title', $venture->title, array('class'=>'form-control input-md', 'placeholder'=>'Venture Title', 'required' => '')) }}
    <span class="help-block">The name of the venture</span>  
    </div>
  </div>



  <div class="form-group">
    <label class="col-md-4 control-label" for="Current Image">Current Image</label>
    <div class="col-md-4">
      <img src='{{URL::to('')}}/image2/profile/{{$venture->logo}}' />
    </div>
  </div>

      <!-- Image File Button -->
      <div class="form-group">
          <label class="col-md-4 control-label" for="logo">New Image</label>
          <div class="col-md-4">
              <input id="logo" name="logo" class="input-file" type="file">
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
    <label class="col-md-4 control-label" for="description">Describe the Venture</label>
    <div class="col-md-4">                     
      {{ Form::textarea('description', $venture->description, array('class'=>'form-control')) }}
    </div>
  </div>

  <!-- Funding Target Prepended text input-->
  <div class="form-group">
    <label class="col-md-4 control-label" for="funding_target">Funding Target</label>
    <div class="col-md-4">
      <div class="input-group">
        <span class="input-group-addon">£</span>
        {{ Form::text('funding_target', $venture->funding_target, array('class'=>'form-control', 'placeholder'=>'£', 'required' => '')) }}
      </div>
      <p class="help-block">The amount required for successful funding</p>
    </div>
  </div>

  <!-- Secured Funding Prepended text input-->
  <div class="form-group">
    <label class="col-md-4 control-label" for="funding_target">Funding Target</label>
    <div class="col-md-4">
      <div class="input-group">
        <span class="input-group-addon">£</span>
        {{ Form::text('funding_secured', $venture->funding_secured, array('class'=>'form-control', 'placeholder'=>'£', 'required' => '')) }}
      </div>
      <p class="help-block">The amount of funding secured</p>
    </div>
  </div>



<!-- Skills Form Name -->
<legend>What skills does your venture seek?</legend>

@if(isset($skills))

  {{$category=''}}

  @foreach($skills as $key => $skill)

    @if ($category<>$skill["category"])
      <h4>{{$skill["category"]}}</h4>
    @endif

      <!-- Actual name of skill output -->
      {{$skill["skill_name"]}}
    <input tabindex="1" type="checkbox" name="skillsCB[]" id="{{$skill["id"]}}" value="{{$skill["id"]}}" {{$skill["checked"]}}>

   &nbsp;&nbsp;
    
    <?php $category=$skill["category"]?>
  
  @endforeach

@endif

<br><br>

{{ Form::submit('Update your Venture Page',array('class' => 'btn btn-primary')) }}


</fieldset>


{{ Form::close() }}

<!-- End of form -->

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

    $("#logo").change(function () {
        $("#previewDiv").show();
        previewImage(this);
    });

</script>
@stop




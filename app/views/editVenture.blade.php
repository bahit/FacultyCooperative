@extends('main')
@section('content')

<!-- seems to be a bug effecting alignment of first item on page so this is a work around -->
<div style="visibility: hidden">&nbsp; </div>

<h1>Edit Venture</h1>

<h2><a href='../viewVenture/{{$venture->id}}'>{{$venture->title}}</a></h2>

@if(isset($success))

<h4 class="alert alert-success">Thank you - your venture has been updated</h4>

<h4 class="alert alert-success"><a href="{{URL::to('')}}//viewVenture/{{$venture->id}}" >Follow this link to see how your venture page looks now</a></h4>

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

  <!-- Image File Button --> 
  <div class="form-group">
    <label class="col-md-4 control-label" for="logo">Image</label>
    <div class="col-md-4">
      <input id="logo" name="logo" class="input-file" type="file">
    </div>
  </div>


  <div class="form-group">
    <label class="col-md-4 control-label" for="Selecterd Image">Selected Image</label>
    <div class="col-md-4">
      <img src='../image2/profile/{{$venture->logo}}' />
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

  {{ Form::submit('Update your Venture Page',array('class' => 'btn btn-primary')) }}

  </fieldset>

<fieldset>

<!-- Skills Form Name -->
<legend>What skills does your venture seek?</legend>

@if(isset($skills))

  {{$category=''}}

  @foreach($skills as $key => $skill)

    @if ($category<>$skill["category"])
      <h4>{{$skill["category"]}}</h4>
    @endif


    <input tabindex="1" type="checkbox" name="skillsCB[]" id="{{$skill["id"]}}" value="{{$skill["id"]}}" {{$skill["checked"]}}>

    <!-- Actual name of skill output -->
    {{$skill["skill_name"]}}
    
    <?php $category=$skill["category"]?>
  
  @endforeach

@endif

<br><br>

{{ Form::submit('Update your Venture Page',array('class' => 'btn btn-primary')) }}


</fieldset>


{{ Form::close() }}

<!-- End of form -->

@endsection





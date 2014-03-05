@extends('main')
@section('content')

<h1>View Venture</h1>

<h2>About {{$venture->title}}</h2>

<p><img src='../images/{{$venture->logo}}' width="300px"/></p>

<p>{{$venture->description}}</p>

<h3>This venture is {{number_format($venture->funding_secured/$venture->funding_target*100,0)}}% funded</h3>
<em>!! This would look much nicer as a little graphic - could be done with css??  !!</em>



<h2>Team members</h2>


@foreach($teams as $team)
<li> <!--SEE profile controller - need to resize image when saved!!!  ST -->
    <img src='../images/{{$team->image}}' width="80px"/>

    <a href="../publicProfile/{{$team->user_id}}">{{$team->name}}</a>



    @if($team->position==2)
          <strong>Team Leader</strong>
    @endif

    @if($team->position==1)
              <strong>Team Mentor</strong>
    @endif

</li>

@endforeach



<h2>Skills wanted by this venture</h2>

{{$category=''}}
@foreach($skillsWanted as $skill)

@if ($category<>$skill->category)
<h4>{{$skill->category}}</h4>
@endif

<li>{{$skill->skill_name}}</li>

<?php $category=$skill->category ?>
@endforeach


@if($auth)
<h3>You are a team leader for this venture</h3>
<h3><a href='../editVenture/{{$venture->id}}'> click here to edit this venture</a></h3>
@endif

@endsection



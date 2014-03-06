@extends('main')
@section('content')

<h2>{{$profile->name}}'s Public Profile Page</h2>




<!--SEE profile controller - need to resize image when saved!!!  ST -->
<img src='../images/{{$profile->image}}' width="200px"/>

<h3>About</h3>

<p>{{$profile->bio_details}} </p>
<p> {{$profile->name}}'s career status: {{$profile->career_status}} </p>
<p> {{$profile->name}}'s institution: {{$profile->institution}} </p>


@if($profile->investmentOffered=1)
<h4>{{$profile->name}} is willing to offer investment</h4>
@else
<h4>{{$profile->name}} is not willing to offer investment</h4>
@endif

<h3> {{$profile->name}} Offers the following skills: </h3>



{{$category=''}}
@foreach($skillOffer as $skill)

@if ($category<>$skill->category)
<h4>{{$skill->category}}</h4>
@endif

<li>{{$skill->skill_name}}</li>

<?php $category=$skill->category ?>
@endforeach



<br>

@if($teamInvolvement)
<h3>Team Memberships</h3>
<p>{{$profile->name}} is involved with the following ventures</p>
@foreach($teamInvolvement as $team)
<li><a href='../viewVenture/{{$team->venture_id}}'>{{$team->title}}</a></li>

@endforeach
@endif


<h3><a href="../sendMessage/{{$profile->id}}">Send a message to {{$profile->name}}</a></h3>

<br>
@endsection
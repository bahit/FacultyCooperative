@extends('main')
@section('content')

<h1>View Public profile</h1>

<h2>About {{$profile->screen_name}}</h2>


<!--SEE profile controller - need to resize image when saved!!!  ST -->
<img src='../images/{{$profile->image}}' width="200px"/>

<p> {{$profile->screen_name}}'s details: {{$profile->bio_details}} </p>
<p> {{$profile->screen_name}}'s career status: {{$profile->career_status}} </p>
<p> {{$profile->screen_name}}'s institution: {{$profile->institution}} </p>

<p> {{$profile->screen_name}}'s Offers the following skills - <em>
        Needs some nicer arrangement!!
        </em></p>


@foreach($skillOffer as  $skillOffer)




<li>Category: {{$skillOffer->category}} Skill: {{$skillOffer->skill_name}}</li>




@endforeach


<p> {{$profile->screen_name}}'s investment offered: {{$profile->investment_offered}} <em>This is a boolean value and
        needs hooking to a checkbox </em></p>


@endsection


{{--loop category hierachy

{{$category = ''}}
@foreach($skills as $key => $skill)


@if ($category <> $skill->category)
<br>{{$category = $skill->category}}: &nbsp;
@endif
{{ $skill->skillName }}, &nbsp;


@endforeach
--}}


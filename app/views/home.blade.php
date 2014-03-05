@extends('main')
@section('content')

@include('layout/carousel')
@include('layout/marketing')
<div class="welcome">

    <h1>You have arrived.</h1>
</div>


<h2>Hello Group 1</h2>

<h3> <em>!!Test Links - All need hooking up to some sort of system !! </em></h3>

<p><a href="publicProfile/1">This link should take you to view profile for user id 1</a></p>

<p><a href="editProfile">This link should take you to edit profile of the logged in user</a></p>


<p><a href="viewVenture/1">This link should take you to view venture id 1</a></p>

<p><a href="createVenture">This link will allow a logged in user to create a new venture</a></p>

<p><a href="editVenture/1">This link should take you to edit venture id 1</a></p>

<p><a href="editTeam/1">This link should take you to edit the team for venture id 1</a></p>

<p><a href="search">This link should take you to search page</a></p>

<p><a href="sendMessage/1">This link should send a message to user id 1</a></p>

<p><a href="readMessage">This link should allow the logged in user to read their messages</a></p>

@endsection

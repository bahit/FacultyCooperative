@extends('main')
@section('content')
<!-- seems to be a bug effecting alignment of first item on page so this is a work around -->
<div style="visibility: hidden">&nbsp; </div>

<h1>FAQs</h1>

<div id="faq">

    <h4>Who can view my profile?</h4>

    <div><p>Any visitor to the site can view your public profile page</p></div>

    <h4>How do I create my profile?</h4>

    <div><p>You must be registered to create a profile. When you register an empty public profile will be
            created for you. You can edit this by clicking on 'update your profile' from the dashboard page</p></div>

    <h4>How do I register?</h4>

    <div><p>You can register by clicking on the <a href='register'>register link</a>. Your email will be used to login. You must pick a
            password</p></div>

    <h4>How do I create a new venture?</h4>
    <div><p>You must be registered. From your dashboard click the link to create a new venture. You just need to name your
        venture to begin. You can then add details and build your team</p></div>


    <h4>How do I add members to my team</h4>
    <div><p>You must be logged in. From your dashboard or search page click to view venture details. If you are the
        team leader there will be an extra link at the bottom of the page allowing you to go to the team management page.
        From here you can edit your team</p></div>

    <h4>How do I add a mentor to my team</h4>
    <div><p>You must be logged in. From your dashboard or search page click to view venture details. If you are the
            team leader there will be an extra link at the bottom of the page allowing you to go to the team management page.
            From here you can edit your team. To add a mentor first add the user as a team member, then promote them to mentor</p></div>

    <h4>How can I send a user a message</h4>
    <div><p>You must be logged in. Find a link to the user from the search page or venture page. Click the link to see
        the users public profile. There is a link to send that user a message</p></div>

    <h4>How can I read my messages</h4>
    <div><p>You must be logged in. Go to the dashboard and follow the links to read your messages. Click on a message header
        to expand the message body</p></div>

</div>

@endsection

@section("script")
<script>
    $(document).ready(function () {

        $('#faq h4').each(function () {
            var h = $(this), answer = h.next('div').hide().slideUp();
            h.click(function () {

                $('#faq h4').each(function () {
                   $(this).next('div').slideUp();
                });
             answer.slideDown();

            });
        });
    });
</script>
@stop
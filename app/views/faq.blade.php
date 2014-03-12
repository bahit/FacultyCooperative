@extends('main')
@section('content')

<h1>FAQs</h1>

<div id="faq">

    <h4>Who can view my profile?</h4>

    <div><p>Any visitor to the site can view your public profile page</p></div>

    <h4>How do I create my profile?</h4>

    <div><p>You must be registered to create a profile. When you register an empty public profile will be
            created for you. You can edit this by clicking on 'edit profile' from the ?????? page</p></div>

    <h4>How do I register?</h4>

    <div><p>You can register by clicking on the register link. Your email will be used to login. You must pick a
            password</p></div>


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
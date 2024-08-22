@component("mail::message")
    # Welcome {{$name}}!!


{{--    Dear {{$user->first_name}} {{$user->last_name}}, --}}
    Thank you for signing up to our website. We are thrilled to have you as our new member.
    Please click the button below to verify your email address.
    @component('mail::button', ['url' => '#', 'color' => 'blue'])
        Verify Email
    @endcomponent

@endcomponent

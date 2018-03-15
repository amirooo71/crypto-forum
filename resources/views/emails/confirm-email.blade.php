@component('mail::message')
    # Introduction

    We just need to confirm your email address to prove that you're human.

    @component('mail::button', ['url' => url('/register/confirm?token=' . $user->confirmation_token)])
        Confirm Email
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent

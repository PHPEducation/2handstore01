@component('mail::message')

<h1>{{ __(':greet :name', ['greet' => __('Hello'), 'name' => $user->name]) }}</h1>
<p>{{ __('Please click the button below to verify your email address!') }}</p>
@component('mail::button', ['url' => $url])
{{ __('verify email') }}
@endcomponent
<p>{{ __('Thank you for using our application!') }}</p>
{{ __('regards') }}<br>
{{ config('app.name') }}
@component('mail::subcopy', ['url' => $url])
{{ __('If you’re having trouble clicking the :action button, copy and paste the URL below
into your web browser', ['action' => __('verify email')]) }}: [{{ $url}}]({{ $url}})
@endcomponent

@endcomponent

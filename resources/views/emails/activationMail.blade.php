@component('mail::message')
    <h1>{{ $details['title'] }}</h1>
    <p> <b>{{ $details['organisation'] }}</b> {{ $details['body'] }}</p>
    <h2>Wachtwoord:</h2>
    <h3>{{ $details['password'] }}</h3>

@component('mail::button', ['url' => 'https://www.wijnbouwer.be/'])
    naar Wijnbouwer.be
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

@component('mail::message')
    <h1>{{ $details['title'] }}</h1>
    <p>{{ $details['body'] }}</p>
    <h2>Wachtwoord:</h2>
    <h3>{{ $details['password'] }}</h3>

@component('mail::button', ['url' => 'https://www.wijnbouwer.be/'])
    Naar Wijnbouwer.be
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

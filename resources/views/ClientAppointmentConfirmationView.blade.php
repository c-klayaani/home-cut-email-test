@component('mail::message')
    Hello {{ $clientName }}, <br><br>
    Your appointment on {{ $appointmentDate }} at {{ $appointmentTime }} with {{ $barberName }} has been confirmed.<br>
    <br>
    See you! <br>
    <i>The HomeCut Team</i>
@endcomponent

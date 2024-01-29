@component('mail::message')
    Hello {{ $shopManagerName }}, <br><br>
    {{ $clientName }} has booked an appointment on {{ $appointmentDate }} at {{ $appointmentTime }} with
    {{ $barberName }}.<br>
    <br>
    <strong>Location:</strong> <br>
    City: {{ $locationDetails['city'] }}<br>
    Full Address: {{ $locationDetails['full_address'] }}<br>
    Building: {{ $locationDetails['building'] }}<br>
    Floor Number: {{ $locationDetails['floor_number'] }}<br>
    Notes: {{ $locationDetails['notes'] }}<br><br>
    All the best, <br>
    <i>The HomeCut Team</i>
@endcomponent

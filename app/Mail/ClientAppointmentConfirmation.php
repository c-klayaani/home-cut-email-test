<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ClientAppointmentConfirmation extends Mailable
{
    use Queueable, SerializesModels;
    public $clientName;
    public $appointmentDate;
    public $appointmentTime;
    public $barberName;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($clientName, $appointmentDate, $appointmentTime, $barberName)
    {
        $this->clientName = $clientName;
        $this->appointmentDate = $appointmentDate;
        $this->appointmentTime = $appointmentTime;
        $this->barberName = $barberName;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Appointment Confirmation')->from('bookings@homecut.app', 'HomeCut')->markdown('ClientAppointmentConfirmationView');
    }
}

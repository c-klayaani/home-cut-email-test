<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ShopManagerAppointmentConfirmation extends Mailable
{
    use Queueable, SerializesModels;
    public $shopManagerName;
    public $clientName;
    public $appointmentDate;
    public $appointmentTime;
    public $barberName;
    public $locationDetails;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($shopManagerName, $clientName, $appointmentDate, $appointmentTime, $barberName, $locationDetails)
    {
        $this->shopManagerName = $shopManagerName;
        $this->clientName = $clientName;
        $this->appointmentDate = $appointmentDate;
        $this->appointmentTime = $appointmentTime;
        $this->barberName = $barberName;
        $this->locationDetails = $locationDetails;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Appointment Confirmation')->from('bookings@homecut.app', 'HomeCut')->markdown('ShopManagerAppointmentConfirmationView');
    }
}

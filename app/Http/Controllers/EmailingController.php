<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ShopManagerAppointmentConfirmation;
use App\Models\Appointment;
use App\Models\Barber;
use App\Models\Client;
use App\Models\ShopManager;

class EmailingController extends Controller
{
    private $emailAccount = "c.klayaani@a2z.media";

    public function sendEmail(Request $request)
    {
        try {
            if($request->type == "static") $this->sendStaticEmail();
            if($request->type == "dynamic") $this->sendDynamicEmail();
        } catch (\Throwable $th) {
            \Log::error($th);
            return response()->json("Something went wrong");
        }
    }

    private function sendDynamicEmail()
    {
        $appointment = Appointment::all()->last();

        $locationDetails = [
            "city" => $appointment->City,
            "full_address" => $appointment->FullAddress,
            "building" => $appointment->Building,
            "floor_number" => $appointment->FloorNb,
            "notes" => $appointment->AddressNotes,
        ];

        $client = Client::find($appointment['ClientId']);
        $barber = Barber::find($appointment['BarberId']);
        $shopManager = ShopManager::find($barber['ShopManagerId']);

        Mail::
        to($this->emailAccount)
        ->cc("christopher.klayaani@gmail.com")
        ->send(
            new ShopManagerAppointmentConfirmation(
                $shopManager['Name'],
                $client['Name'],
                $appointment['AppointmentDate'],
                $appointment['Timeslot'],
                $barber['Name'],
                $locationDetails
            )
        );
    }
    
    private function sendStaticEmail()
    {
        $emailInfo = [
            "ManagerName" => "A2z Shop Manager",
            "ClientName" => "Christopher Klayaani",
            "AppointmentDate" => "Today",
            "Timeslot" => "in the Afternoon",
            "BarberName" => "CPanel Server"
        ];

        $locationDetails = [
            "city" => "Metn",
            "full_address" => "Qornet El Hamra, Rosary Sisters School Street",
            "building" => "St Charbel",
            "floor_number" => "1",
            "notes" => "This is a testing email sent from the server",
        ];

        Mail::
                to($this->emailAccount)
                ->cc("christopher.klayaani@gmail.com")
                ->send(
                    new ShopManagerAppointmentConfirmation(
                        $emailInfo['ManagerName'],
                        $emailInfo['ClientName'],
                        $emailInfo['AppointmentDate'],
                        $emailInfo['Timeslot'],
                        $emailInfo['BarberName'],
                        $locationDetails
                    )
                );
    }
}

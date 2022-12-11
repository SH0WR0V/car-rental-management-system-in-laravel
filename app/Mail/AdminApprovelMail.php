<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdminApprovelMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $renter_address='';
    public $renter_mail='';
    public $renter_username='';
    public $renter_name='';
    public $renter_id='';
    public $customer_address='';
    public $customer_username='';
    public $customer_mail='';
    public $customer_name='';
    public $customer_id='';
    public $rent_date='';
    public $service_id='';
    public $payment_no='';
    public $rent_price='';
    public $car_name='';
    public $car_model='';
    public $car_type='';
    public $car_color='';
    public $car_number='';
    public $id='';

    public function __construct($renter_address,
    $renter_mail,
    $renter_username,
    $renter_name,
    $renter_id,
    $customer_address,
    $customer_username,
    $customer_mail,
    $customer_name,
    $customer_id,
    $rent_date,
    $service_id,
    $payment_no,
    $rent_price,
    $car_name,
    $car_model,
    $car_type,
    $car_color,
    $car_number,
    $id
    )
    {
        //
        $this->renter_address=$renter_address;
        $this->renter_mail=$renter_mail;
        $this->renter_username=$renter_username;
        $this->renter_name= $renter_name;
        $this->renter_id= $renter_id;
        $this->customer_address= $customer_address;
        $this->customer_username= $customer_username;
        $this->customer_mail= $customer_mail;
        $this->customer_name= $customer_name;
        $this->customer_id= $customer_id;
        $this->rent_date= $rent_date;
        $this->service_id= $service_id;
        $this->payment_no=  $payment_no;
        $this->rent_price= $rent_price;
        $this->car_name= $car_name;
        $this->car_model= $car_model;
        $this->car_type= $car_type;
        $this->car_color=  $car_color;
        $this->car_number=$car_number;
        $this->id= $id;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Admin Approvel Mail',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'Admin_Pages.Admin_mail.Approvel',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}

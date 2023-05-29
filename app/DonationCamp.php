<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonationCamp extends Model {

    protected $fillable = [
        'donation_date',
        'from',
        'to',
        'country',
        'district',
        'city',
        'venue',
        'image',
        'organization',
        'contact_person',
        'phone',
        'email',
        'fax',
    ];

}

<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends \TCG\Voyager\Models\User {

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'title', 'first_name', 'last_name', 'gender', 
        'date_of_birth', 'blood_group', 'nic', 'country', 'current_province', 'avatar',
        'current_district', 'current_city', 'current_address', 'mobile_phone',
        'home_phone', 'fax', 'contact_me_via', 'facebook_profile', 'twitter_handler',
        'google_profile', 'whatsapp_number', 'viber_number', 'instagram_handler',
        'contact_social_media', 'terms_conditions', 'description', 'last_donated_date',
        'felt_sick_after', 'last_took_medicine', 'live_new_location', 'new_location',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

}

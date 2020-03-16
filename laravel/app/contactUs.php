<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contactUs extends Model
{
    protected $table='contact_us';


    protected $fillable = [
        'id','name','email','message',

    ];

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    use HasFactory;
    protected $fillable = [
        'firstname',
        'lastname',
        'alternate_email',
        'phone_ext',
        'phone',
        'mobile',
        'address1',
        'address2',
        'city',
        'state',
        'country',
        'zipcode',
        'image',
        'user_id',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

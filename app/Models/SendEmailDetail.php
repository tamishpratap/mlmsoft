<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SendEmailDetail extends Model
{
    protected $fillable = [
        'company_name',
        'memberid',
        'name',
        'mobile',
        'email',
    ];
}

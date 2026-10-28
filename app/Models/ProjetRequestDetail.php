<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjetRequestDetail extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'mobile',
        'company',
        'country',
        'website',
        'plan',
        'budget',
        'modules',
        'notes',
        'status',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'projet_request_details';
}


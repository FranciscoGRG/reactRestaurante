<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservaSinLogin extends Model
{
    use HasFactory;

    protected $fillable= ['nombre', 'email', 'card-owner', 'card-number', 'card-expired'];
}

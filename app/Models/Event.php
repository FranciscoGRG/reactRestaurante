<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable= ['event', 'start_date', 'end_date', 'name', 'email', 'message','menu', 'telefono', 'alergias', 'card-number', 'card-owner', 'expiration',  'comensales', 'user_id', 'table_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function table()
    {
        return $this->hasOne(Table::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function fromContact()
    {
        return $this->hasOne(User::class, 'id', 'from');
    }
}

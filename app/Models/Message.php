<?php

namespace App\Models\Mail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];
    protected $dates = ['delivered_at', 'failed_at'];
 
    public function receiver()
    {
        return $this->morphTo();
    }
}

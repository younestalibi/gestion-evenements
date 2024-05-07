<?php

namespace App\Models;

use App\Models\Event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Message extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'message',
        'type',
        'item_id',
        'user_id',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class, 'item_id');
    }
    public function service()
    {
        return $this->belongsTo(Service::class, 'item_id');
    }
}

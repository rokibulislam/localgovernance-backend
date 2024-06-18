<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'user_id', 'image', 'category_id', 'type_id' ];


    public function tickets()
    {
        return $this->hasMany( Ticket::class, 'events_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(EventCategory::class );
    }

    public function type()
    {
        return $this->belongsTo(EventType::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class);
    }
}

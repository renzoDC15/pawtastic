<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Day;
use App\Models\Appointment;
class AppointmentDays extends Model
{
    use HasFactory;
    protected $fillable = [
        'appointment_id',
        'day_id',
    ];

    public function day()
    {
        return $this->belongsTo(Day::class, 'day_id', 'id');
    }

    public function appointment()
    {
        return $this->belongsTo(Appointment::class, 'appointment_id', 'id');
    }
}

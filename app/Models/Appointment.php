<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\AppointmentDays;
use App\Models\Frequency;
use App\Models\Time;

class Appointment extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'frequency_id',
        'start_date',
        'time_id',
        'note'
    ];
    protected $appends = [
        'formatted_date',
        'formatted_time',
    ];
    public static function boot()
    {
        parent::boot();
        self::updating(function ($model) {
            foreach (array_keys($model->getAttributes()) as $attr) {
                if ($model->isDirty($attr)) {
                    $model->logs()->create([
                        'user_id' => lit_user()->id ?? null,
                        'field' => $attr,
                        'from' => $model->getOriginal($attr),
                        'to' => $model->getAttribute($attr),
                    ]);
                }
            }
        });
    }
    public function logs()
    {
        return $this->morphMany(UpdateLog::class, 'loggable');
    }

    public function frequency(){
        return $this->belongsTo(Frequency::class);
    }

    public function getFormattedDateAttribute()
    {

        return $this->created_at==null?'':$this->created_at->format('F d, Y') ?? '';
    }

    public function getFormattedTimeAttribute()
    {
        return $this->created_at==null?'': $this->created_at->format('h:iA') ?? '';
    }


    public function time(){
        return $this->belongsTo(Time::class);
    }

    public function days()
    {
        return $this->belongsToMany(Day::class, 'appointment_days', 'appointment_id', 'day_id');
    }
    // public function days()
    // {
    //     return $this->belongsToMany(AppointmentDays::class,'appointment_days','appointment_id','day_id');
    // }




}

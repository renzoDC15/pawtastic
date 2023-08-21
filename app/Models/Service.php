<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description',
        'active',
    ];

    protected $casts = [
        'active' => 'boolean',
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
}

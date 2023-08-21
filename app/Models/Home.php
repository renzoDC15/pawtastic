<?php

namespace App\Models;

use Ignite\Crud\Models\Traits\HasMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia as HasMediaContract;

class Home extends Model implements HasMediaContract
{
    use HasFactory, HasMedia;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'header_line',
        'about_title',
        'about_content',
    ];
    protected $appends = [
        'file_header_image',
        'file_about_images',
    ];

    public function getFileHeaderImageAttribute()
    {
        return $this->getMedia('file_header_image');
    }
    public function getFileAboutImagesAttribute()
    {
        return $this->getMedia('file_about_images');
    }
}

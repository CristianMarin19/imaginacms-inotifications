<?php

namespace Modules\Notification\Entities;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use Translatable;

    protected $table = 'notification__templates';

    public $translatedAttributes = [
        'name',
    ];

    protected $fillable = [
        'view',
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LiteratureReview extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'year',
        'type',
        'topic',
        'link',
    ];
}

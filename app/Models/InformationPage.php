<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InformationPage extends Model
{
    protected $table = 'information_page';

    protected $fillable = [
        'title',
        'title_2',
        'subtitle_1',
        'description_1',
        'subtitle_2',
        'description_2',
        'subtitle_3',
        'description_3',
        'image_1',
        'subtitle_4',
        'description_4',
        'image_2',
        'subtitle_5',
        'description_5',
        'subtitle_6',
        'description_6',
        'subtitle_7',
        'description_7',
        'image_3',
    ];
}

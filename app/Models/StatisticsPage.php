<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatisticsPage extends Model
{
    protected $table = 'statistics_page';
    protected $fillable = [
        'title',
        'description',
    ];
}

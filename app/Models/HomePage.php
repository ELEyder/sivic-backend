<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomePage extends Model
{

    protected $table = 'home_page';
    protected $fillable = [
        'welcome_title',
        'welcome_text',
        'title',
        'subtitle',
        'description',
    ];
    
}

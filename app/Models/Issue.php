<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    use HasFactory;

    public function getPost()
{
    return $this->belongsTo('App\Models\Post', 'post_id');
}

}

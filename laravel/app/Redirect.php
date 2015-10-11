<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Redirect extends Model
{
    protected $table = 'urls';

    protected $fillable = ['url', 'id_string'];
}

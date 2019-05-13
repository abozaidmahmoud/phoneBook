<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class phone extends Model
{
    protected $table='phones';
    protected $fillable=['name','phone','email'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class file extends Model
{
    protected $table = "files";
    protected $fillable = [ 'title', 'description', 'file'];
}
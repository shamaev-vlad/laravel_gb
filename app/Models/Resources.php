<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resources extends Model
{

    protected $table = 'resources';
    public $timestamps = false;
    protected $fillable = ['link'];
    }

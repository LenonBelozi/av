<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudantes extends Model
{
    use HasFactory;

    protected $table = 'estudantes';

    protected $fillable = ['nome', 'curso'];
}

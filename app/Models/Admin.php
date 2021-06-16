<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Autenticatable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Autenticatable
{
    use HasFactory;
}

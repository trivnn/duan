<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    // protected $table = "new_tests";
    // protected $primaryKey = "tests_id";
    // public $timestamps = false;
    protected $fillable = ["name"];
    protected $hidden = ["id"];


}

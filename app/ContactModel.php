<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactModel extends Model
{
    //
    protected $table = "contacts";

    protected $fillable = [
        "first_name",
        "last_name",
        "phone"
    ];
}

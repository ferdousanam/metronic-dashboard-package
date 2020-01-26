<?php

namespace Anam\Dashboard\Models;

use Illuminate\Database\Eloquent\Model;

class Priority extends Model
{
    protected $fillable = array(
        'priority_name',
        'priority_description',
        'priority_status',
    );
}

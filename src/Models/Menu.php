<?php

namespace Anam\Dashboard\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = array(
        'selector',
        'menu_id',
        'serial_no',
        'menu_name',
        'route_name',
        'route_url',
        'icon',
        'status',
    );

    public function parent()
    {
        return $this->belongsTo(Menu::class, 'menu_id', 'id');
    }

    public function child()
    {
        return $this->hasMany(Menu::class, 'menu_id', 'id');
    }

    public function priorities()
    {
        return $this->belongsToMany(Priority::class, 'priority_menu');
    }
}

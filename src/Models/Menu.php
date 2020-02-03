<?php

namespace Anam\Dashboard\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model {
    protected $fillable = array(
        'selector',
        'parent_id',
        'serial_no',
        'menu_name',
        'route_name',
        'icon',
        'status',
    );

    /**
     * Get the Parent Name
     *
     * @return mixed
     */
    public function getParentNameAttribute() {
        return $this->attributes['parent_name'] = $this->parent->menu_name;
    }

    public function parent() {
        return $this->belongsTo('Anam\Dashboard\Models\Menu');
    }
}

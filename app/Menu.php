<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable=['nama_menu', 'icon', 'url', 'parent'];
    public function child() {
        return $this->hasMany(Menu::class, 'parent', 'id');
    }

    public function menu_parent() {
        return $this->where('parent', '=', '0')->with('child')->get();
    }
}

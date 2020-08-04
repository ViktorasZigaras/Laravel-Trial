<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use App\Models\RestaurantMenu;
use App\Models\Menu;

class Restaurant extends Model
{
    protected $fillable = ['title', 'customers', 'emploees', 'menu_id'];

    public function menus() {
        // return $this->hasMany(RestaurantMenu::class, 'restaurant_id', 'id');
        return $this->hasMany(Menu::class, 'restaurant_id', 'id');
    }
}
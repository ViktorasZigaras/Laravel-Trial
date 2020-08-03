<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use App\Models\RestaurantMenu;
use App\Models\Restaurant;

class Menu extends Model
{
    protected $fillable = ['title', 'price', 'wieght', 'meat'];

    // public function restaurants() {
    //     return $this->hasMany(RestaurantMenu::class, 'menu_id', 'id');
    // }

    public function restaurant() {
        return $this->belongsTo(Restaurant::class, 'restaurant_id', 'id');
    }
}

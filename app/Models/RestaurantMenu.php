<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Restaurant;
use App\Models\Menu;

class RestaurantMenu extends Model
{
    protected $fillable = ['restaurant_id', 'menu_id'];

    public function restaurant() {
        return $this->belongsTo(Restaurant::class, 'restaurant_id', 'id');
    }

    public function menu() {
        return $this->belongsTo(Menu::class, 'menu_id', 'id');
    }
}
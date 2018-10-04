<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    protected $table = 'stations';
    protected $guarded = ['id'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * Get the route record associated with the station.
     */
    public function route()
    {
        return $this->hasOne('App\Models\Route', 'id', 'route_id');
    }

}
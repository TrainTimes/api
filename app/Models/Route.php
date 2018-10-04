<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $table = 'routes';
    protected $guarded = ['id'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * Get the province record associated with the route.
     */
    public function province()
    {
        return $this->hasOne('App\Models\Province', 'id', 'province_id');
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property string $name
 * @property string $route
 * @property Request[] $requests
 */
class Route extends Model
{
    protected $table = 'route';
    public $timestamps = false;

    public function requests(): HasMany
    {
        return $this->hasMany(Request::class, 'route_id', 'id');
    }

    public function requestsWithMethod(string $method): HasMany
    {
        return $this->requests()
            ->where('active','=', true)
            ->where('method', '=', $method)
            ;
    }
}

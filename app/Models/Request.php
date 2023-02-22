<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int $id
 * @property string $body
 * @property string $method
 * @property int $route_id
 * @property string $name
 * @property boolean $active
 * @property Response $response
 * @property Route $route
 * @property RequestLog[] $requestLog
 */
class Request extends Model
{
    protected $table = 'request';
    public $timestamps = false;

    protected $casts = [
        'active' => 'boolean',
    ];

    public function response(): HasOne
    {
        return $this->hasOne(Response::class, 'request_id', 'id');
    }

    public function route(): HasOne
    {
        return $this->hasOne(Route::class, 'id', 'route_id');
    }

    public function requestLog()
    {
        return $this->hasMany(RequestLog::class, 'request_id', 'id');
    }

}

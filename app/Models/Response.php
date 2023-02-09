<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $body
 * @property int $request_id
 * @property int $http_code
 * @property Request $request
 */
class Response extends Model
{
    protected $table = 'response';
    public $timestamps = false;

    public function request()
    {
        return $this->hasOne(Request::class, 'id', 'request_id');
    }

}

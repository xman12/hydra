<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int $id
 * @property string $headers
 * @property string $body
 * @property int $request_id
 *
 * @property Request $request
 */
class RequestLog extends Model
{
    protected $table = 'request_log';

    public function request(): HasOne
    {
        return $this->hasOne(Request::class, 'id', 'request_id');
    }

}

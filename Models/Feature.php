<?php

declare(strict_types=1);

namespace Modules\User\Models;

class Feature extends BaseModel
{
    /** @var list<string> */
    protected $fillable = [
        'id',
        'name',
        'scope',
        'value',
    ];
}

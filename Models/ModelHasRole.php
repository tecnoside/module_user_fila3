<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Modules\User\Database\Factories\ModelHasRoleFactory;

/**
 * Modules\User\Models\ModelHasRole.
 *
 * @mixin IdeHelperModelHasRole
 *
 * @property int    $role_id
 * @property string $model_type
 * @property int    $model_id
 *
 * @method static ModelHasRoleFactory  factory($count = null, $state = [])
 * @method static Builder|ModelHasRole newModelQuery()
 * @method static Builder|ModelHasRole newQuery()
 * @method static Builder|ModelHasRole query()
 * @method static Builder|ModelHasRole whereModelId($value)
 * @method static Builder|ModelHasRole whereModelType($value)
 * @method static Builder|ModelHasRole whereRoleId($value)
 *
 * @mixin \Eloquent
 */
class ModelHasRole extends BaseMorphPivot
{
    use HasUuids;
    use Traits\UuidTrait;
    /**
     * @var array<string>
     *
     * @psalm-var list{'role_id', 'model_type', 'model_id'}
     */
    protected $fillable = ['id', 'role_id', 'model_type', 'model_id', 'team_id'];

    /**
     * @var bool
     */
    public $incrementing = false;

    protected $keyType = 'string';

    protected $casts = [
        'id' => 'string',
    ];

    /**
     * Create a new pivot model from raw values returned from a query.
     *
     * @param \Illuminate\Database\Eloquent\Model $parent
     * @param array                               $attributes
     * @param string                              $table
     * @param bool                                $exists
     *
     * @throws \Exception
     *
     * @return static
     */
    public static function fromRawAttributes(Model $parent, $attributes, $table, $exists = false)
    {
        // https://laracasts.com/discuss/channels/eloquent/generating-custom-id-uuid-for-many-to-many-relationship-pivot-table
        // https://www.appsloveworld.com/php/394/laravel-eloquent-uuid-in-a-pivot-table
        dddx('a');
        if (! $exists and ! array_key_exists('id', $attributes)) {
            $attributes['id'] = Uuid::generate()->string;
        }

        return parent::fromRawAttributes($parent, $attributes, $table, $exists);
    }
}

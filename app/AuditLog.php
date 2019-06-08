<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\AuditLog
 *
 * @property int $id
 * @property string $description
 * @property int|null $subject_id
 * @property string|null $subject_type
 * @property int|null $user_id
 * @property \Illuminate\Support\Collection|null $properties
 * @property string|null $host
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AuditLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AuditLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AuditLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AuditLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AuditLog whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AuditLog whereHost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AuditLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AuditLog whereProperties($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AuditLog whereSubjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AuditLog whereSubjectType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AuditLog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AuditLog whereUserId($value)
 * @mixin \Eloquent
 */
class AuditLog extends Model
{
    protected $fillable = [
        'description',
        'subject_id',
        'subject_type',
        'user_id',
        'properties',
        'host',
    ];

    protected $casts = [
        'properties' => 'collection',
    ];
}

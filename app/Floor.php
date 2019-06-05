<?php

namespace App;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Floor extends Model
{
    use SoftDeletes, Auditable;

    public $table = 'floors';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'area',
        'number',
        'ceiling',
        'created_at',
        'updated_at',
        'deleted_at',
        'building_id',
    ];

    public function building()
    {
        return $this->belongsTo(Building::class, 'building_id');
    }
}

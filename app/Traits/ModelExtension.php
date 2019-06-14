<?php

namespace App\Http\Traits;

use Arr;
use DB;
use Illuminate\Database\Eloquent\Model;

trait ModelExtension
{
    /**
     * @param string $column
     * @return array
     */
    public function getEnumValues(string $column)
    {
        /** @var Model $this */
        $type = DB::select(DB::raw("SHOW COLUMNS FROM {$this->table} WHERE Field = '$column'"))[0]->Type;
        preg_match('/^enum\((.*)\)$/', $type, $matches);
        $enum = array();
        foreach (explode(',', $matches[1]) as $value) {
            $v = trim($value, "'");
            $enum = Arr::add($enum, $v, $v);
        }
        return $enum;
    }
}

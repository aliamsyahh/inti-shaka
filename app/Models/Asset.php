<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;
    protected $fillable = ['workplaces_id', 'name', 'code', 'description', 'is_active', 'created_by', 'updated_by'];

    public function workplace()
    {
        return $this->belongsTo(Workplace::class, 'workplaces_id', 'id');
    }

    public function assetPicLink()
    {
        return $this->hasMany(AssetPicLink::class, 'assets_id', 'id');
    }

    public function getIsActiveAttribute($value)
    {
        if ($value == '1') {
            $status = 'Active';
        } else {
            $status = 'Inactive';
        }
        return $status;
    }
}

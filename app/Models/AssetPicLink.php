<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetPicLink extends Model
{
    use HasFactory;
    protected $fillable = ['assets_id', 'pic', 'is_active', 'created_by', 'updated_by'];

    public function asset()
    {
        return $this->belongsTo(Asset::class, 'assets_id', 'id');
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

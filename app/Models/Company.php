<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'npwp', 'address', 'is_active', 'created_by', 'updated_by'];

    public function workplace()
    {
        return $this->hasMany(Workplace::class);
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

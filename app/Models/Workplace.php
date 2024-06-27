<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workplace extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillbale = ['companies_id', 'name', 'contact_number', 'address', 'is_active', 'created_by', 'updated_by'];

    public function company()
    {
        return $this->belongsTo(Company::class, 'companies_id', 'id');
    }

    public function user()
    {
        return $this->hasMany(User::class, 'workplaces_id', 'id');
    }

    public function asset()
    {
        return $this->hasMany(Asset::class, 'workplaces_id', 'id');
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

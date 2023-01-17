<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters){
        if (isset($filters['search']) ? $filters['search'] : false){
            return $query->where('job_name','like', '%' . $filters['search'] . '%')
                ->orWhere('location', 'like', '%' . $filters['search']. '%')
                ->orWhere('body', 'like', '%' . $filters['search']. '%')
                ->orWhere('company', 'like', '%' . $filters['search']. '%');
        }
    }
}

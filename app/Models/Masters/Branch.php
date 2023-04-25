<?php

namespace App\Models\masters;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $table = 'companys';
    protected $fillable = [
        'name',
        'address',
    ];

    public function scopeFilter($query, array $filters) {
        $query->when($filters['search'] ?? null, function($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('name','like','%' .$search. '%')
                ->orWhere('address','like','%' .$search. '%');
            });
        });
    }
}

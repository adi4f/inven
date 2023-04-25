<?php

namespace App\Models\Masters;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companys';
    protected $fillable = [
        'initial',
        'description',
        'name',
        'address',
        'province',
        'city',
        'postal_code',
        'web',
        'email',
        'telephone',
        'fax',
    ];

    public function scopeFilter($query, array $filters) {
        $query->when($filters['search'] ?? null, function($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('initial','like','%' .$search. '%')
                ->orWhere('description','like','%' .$search. '%')
                ->orWhere('name','like','%' .$search. '%')
                ->orWhere('address','like','%' .$search. '%')
                ->orWhere('province','like','%' .$search. '%')
                ->orWhere('city','like','%' .$search. '%')
                ->orWhere('postal_code','like','%' .$search. '%')
                ->orWhere('web','like','%' .$search. '%')
                ->orWhere('email','like','%' .$search. '%')
                ->orWhere('telephone','like','%' .$search. '%')
                ->orWhere('fax','like','%' .$search. '%');
            });
        });
    }
}

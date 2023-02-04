<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role_Has_Permission extends Model
{
    use HasFactory;
    protected $table = 'role_has_permissions';

    public function permissions()
    {
        return $this->belongsTo('App\Models\Permission', 'permission_id');
    }

}

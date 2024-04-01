<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\DB;

class Role extends Model
{
    use HasRoles;
    use HasFactory;
    //
    public static function SuperAdminIDs()
    {
        return DB::table('roles')
                    ->select('id')
                    ->where('name', '=', 'SuperAdmin')->pluck('id')->toArray();
    }
}

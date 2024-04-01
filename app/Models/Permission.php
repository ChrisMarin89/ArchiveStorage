<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\DB;

class Permission extends Model
{
    use HasRoles;
    use HasFactory;
    //
    public static function AppPermissionsIDs()
    {
        return DB::table('permissions')
                    ->select('id')
                    ->where('name', 'LIKE', 'app-%')->pluck('id')->toArray();
    }
}

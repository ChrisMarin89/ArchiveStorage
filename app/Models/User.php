<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasRoles;
    use HasFactory;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'lastname', 'email', 'lang', 'password', 'created_by', 'updated_by', 'login_count', 'last_login_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function allExceptSuperAdmin()
    {
        $super_admins_ids = DB::table('users')
                                    ->select('users.id')
                                    ->leftJoin('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
                                    ->leftJoin('roles', 'model_has_roles.role_id', '=', 'roles.id')
                                    ->where('roles.name', '=', 'SuperAdmin')->pluck('users.id')->toArray();
        
        return User::whereNotIn('id', $super_admins_ids)->orderBy('users.email', 'asc') ->get();
    }
}

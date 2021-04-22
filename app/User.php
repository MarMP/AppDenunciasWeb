<?php

namespace App;

use App\Notifications\MyResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    //protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'apellidos', 'role_id', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
         'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Envio de notificación al email para restablecer contraseña en Español
     *
     * @param string $token
     * @return void
     */
    public function sendPasswordResetNotification($token) {
        $this->notify(new MyResetPassword($token));
    }

    //Enlaza la tabla Role con la tabla User
    public function role() {
        return $this->belongsTo('App\Role');
    }

    //El campo será detectado si el usuario registrado es Superadminisrador o no
    public function esSuperAdmin() {
        if ($this->role->nombre_rol == 'Superadministrador') {
            return true;
        }
        return false;
    }
    //El campo será detectado si el usuario registrado es Adminisrador o no
    public function esAdmin() {
        if ($this->role->nombre_rol == 'Administrador') {
            return true;
        }
        return false;
    }
}

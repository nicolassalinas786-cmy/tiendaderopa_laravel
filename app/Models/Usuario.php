<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use Notifiable;

    protected $table      = 'usuarios';
    protected $primaryKey = 'id_usuario';
    public    $timestamps = false;

    protected $fillable = [
        'nombre', 'apellido', 'correo', 'telefono',
        'direccion', 'ciudad', 'codigo_postal',
        'password', 'id_rol', 'fecha_registro',
    ];

    protected $hidden = ['password', 'remember_token'];

    // Laravel busca 'email' por defecto — le decimos que use 'correo'
    public function getAuthIdentifierName(): string { return 'id_usuario'; }
    public function getAuthPassword(): string       { return $this->password; }

    public function esAdmin(): bool { return (int)$this->id_rol === 2; }
    public function getNombreCompletoAttribute(): string { return $this->nombre . ' ' . $this->apellido; }
    public function getInitialAttribute(): string { return strtoupper(substr($this->nombre, 0, 1)); }
}

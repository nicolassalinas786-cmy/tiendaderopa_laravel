<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pedido extends Model
{
    protected $table = 'pedidos';

    protected $fillable = [
        'usuario_id',
        'total',
        'estado',
        'metodo_pago',
        'referencia_pago',
        'direccion_envio',
        'notas',
    ];

    protected function casts(): array
    {
        return [
            'total' => 'decimal:2',
        ];
    }

    // Relaciones
    public function usuario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    public function detalles(): HasMany
    {
        return $this->hasMany(PedidoDetalle::class, 'pedido_id');
    }

    // Helpers
    public function getEstadoBadgeAttribute(): array
    {
        return match($this->estado) {
            'pendiente'  => ['label' => 'Pendiente',   'color' => 'bg-yellow-100 text-yellow-800'],
            'pagado'     => ['label' => 'Pagado',      'color' => 'bg-blue-100 text-blue-800'],
            'enviado'    => ['label' => 'Enviado',     'color' => 'bg-purple-100 text-purple-800'],
            'entregado'  => ['label' => 'Entregado',   'color' => 'bg-green-100 text-green-800'],
            'cancelado'  => ['label' => 'Cancelado',   'color' => 'bg-red-100 text-red-800'],
            'devolucion' => ['label' => 'Devolución',  'color' => 'bg-orange-100 text-orange-800'],
            default      => ['label' => $this->estado, 'color' => 'bg-gray-100 text-gray-800'],
        };
    }
}

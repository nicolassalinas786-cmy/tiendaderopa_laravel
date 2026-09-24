<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Producto extends Model
{
    protected $table = 'productos';

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'precio_oferta',
        'stock',
        'categoria',
        'talla',
        'color',
        'imagen',
        'destacado',
        'activo',
    ];

    protected function casts(): array
    {
        return [
            'precio'       => 'decimal:2',
            'precio_oferta'=> 'decimal:2',
            'destacado'    => 'boolean',
            'activo'       => 'boolean',
        ];
    }

    // Relaciones
    public function detalles(): HasMany
    {
        return $this->hasMany(PedidoDetalle::class, 'producto_id');
    }

    public function favoritos(): BelongsToMany
    {
        return $this->belongsToMany(Usuario::class, 'favoritos', 'producto_id', 'usuario_id')
                    ->withTimestamps();
    }

    // Scopes
    public function scopeActivos($query)
    {
        return $query->where('activo', true);
    }

    public function scopeDestacados($query)
    {
        return $query->where('destacado', true)->where('activo', true);
    }

    public function scopeCategoria($query, string $categoria)
    {
        return $query->where('categoria', $categoria)->where('activo', true);
    }

    // Helpers
    public function getPrecioFinalAttribute(): float
    {
        return $this->precio_oferta ?? $this->precio;
    }

    public function tieneOferta(): bool
    {
        return !is_null($this->precio_oferta) && $this->precio_oferta < $this->precio;
    }

    public function getImagenUrlAttribute(): string
    {
        return $this->imagen
            ? asset('storage/' . $this->imagen)
            : asset('img/placeholder.png');
    }
}

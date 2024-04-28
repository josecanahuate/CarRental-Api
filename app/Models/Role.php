<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    use HasFactory;

    //relacion muchos a muchos inversa entre roles y usuarios
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'roles_asignados');
    }
}
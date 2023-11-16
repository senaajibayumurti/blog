<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Buku extends Model
{
    use HasFactory;
    protected $table = 'buku';
    protected $primaryKey = 'id';
    protected $fillable = ['judul', 'penulis', 'harga','tgl_terbit', 'created_at','updated_at','filename','filepath'];
    protected $dates = ['tgl_terbit'];

    public function gallery(): HasMany
    {
        return $this->hasMany(Galeri::class);
    }
}

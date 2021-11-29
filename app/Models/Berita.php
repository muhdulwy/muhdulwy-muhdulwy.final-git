<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;
    
    protected $table = 'beritas';
    protected $primaryKey = 'id';

    protected $fillable = [
        'Judul', 'IsiBerita', 'kategori_id'
    ];
    
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}

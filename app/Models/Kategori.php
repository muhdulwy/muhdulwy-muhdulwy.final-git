<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategoris';
    protected $primaryKey = 'id';

    protected $fillable = [
        'NamaKategori'
    ];
    public function beritas()
    {
        return $this->hasMany(Beritaa::class);
    }

}

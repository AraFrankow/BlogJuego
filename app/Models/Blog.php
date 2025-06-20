<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blogs';
    protected $primaryKey = 'blog_id';
    protected $fillable = [
        'title',
        'excerpt',
        'body',
        'published_at',
        'categoria_fk'
    ];
    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class, 'categoria_fk', 'categoria_id');
    }
}

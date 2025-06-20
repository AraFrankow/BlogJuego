<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Categoria;
use App\Models\Tag;

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
    public function tags(): BelongsToMany{
        return $this->belongsToMany(
            Tag::class,
            'blogs_has_tags',
            'blog_fk',
            'tag_fk',
            'blog_id',
            'tag_id',
        );
    }
}

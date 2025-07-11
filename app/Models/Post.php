<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model {
    use HasFactory;
    protected $fillable = [
        "title",
        "content",
        "category_id",
        "user_id",
    ];
    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
    public function comments(): HasMany {
        return $this->hasMany(Comment::class);
    }
}

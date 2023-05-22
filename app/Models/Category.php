<?php

namespace App\Models;

use App\Filters\HasFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory, HasFilter;

    protected $table = 'categories';

    protected $fillable = [
        'name'
        , 'parent_id'
        , 'abbr'
    ];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(
            __CLASS__
            , 'parent_id'
            , 'id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(
            __CLASS__
            , 'parent_id'
            , 'id');
    }
}

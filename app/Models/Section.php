<?php

namespace App\Models;

use App\Filters\HasFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Section extends Model
{
    use HasFactory, HasFilter;

    protected $table = 'sections';
    protected $fillable = [
        'name'
    ];

    public function products(): HasMany
    {
        return $this->hasMany(
            Inventory::class
            , 'section_id'
            , 'id'
        );
    }
}

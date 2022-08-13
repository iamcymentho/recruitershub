<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $primaryKey = 'listing_id';

    protected $fillable = ['title', 'company', 'location', 'website', 'email', 'logo', 'description', 'tags'];

    public function scopeFilter($query, array $filters)

    {
        // dd($filters['tag']);
        if ($filters['tag'] ?? false) {

            // using an sql like query to filter using the tags
            $query->where('tags', 'like', '%' . request('tag') . '%');
        }

        if ($filters['search'] ?? false) {

            // using an sql like query to filter using the tags
            $query->where('title', 'like', '%' . request('search') . '%')

                ->orWhere('description', 'like', '%' . request('search') . '%')

                ->orWhere('tags', 'like', '%' . request('search') . '%');
        }
    }
}

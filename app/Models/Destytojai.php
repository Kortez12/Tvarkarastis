<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tvarkarastis;
use Illuminate\Support\Str;

class Destytojai extends Model
{
    use HasFactory;

    protected $table = 'destytojai';

    protected $fillable = [
        'vardas',
        'pavarde',
        'pareigos',
        'email',
        'slug'
    ];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($post) {
            $pavarde = Str::slug($post->vardas);
            $vardas = Str::slug($post->pavarde);
            $slug = $vardas . '-' . $pavarde;
            $post->update(['slug' => $slug]);
            // $post->update(['slug' => $post->title]);
        });
    }

    public function setSlugAttribute($value)
    {
        if ((static::whereSlug($slug = Str::slug($value, '-')))->exists()) {
            $slug = $this->incrementSlug($slug);
        }
        $this->attributes['slug'] = $slug;
    }


    public function incrementSlug($slug)
    {
        // get the slug of the latest created post

        $orginalus = $slug;

        $count = 2;

        while (static::whereSlug($slug)->exists()) {
            $slug = "{$orginalus}-" . $count++;
        }
        return $slug;
    }
}

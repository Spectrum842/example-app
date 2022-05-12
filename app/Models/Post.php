<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Protect values from modification and allow EVERY ELSE VARIBALE
    protected $guarded = ['id'];
    protected $with = ['category', 'author'];

    // Autorize values from modification and forbidden EVERY ELSE VARIBALE
    // protected $fillable = ['title', 'excerpt', 'body'];

    // public function getRouteKeyName(){
    //     return 'slug';
    // }

    public function scopeFilter($query, array $filters){
        $query->when($filters['search'] ?? false, function($query, $search){
            $query->where(fn($query) =>  
                $query->where('title', 'like', '%'. $search .'%')
                ->orWhere('body', 'like', '%'. $search .'%' )
            );
        });

        $query->when($filters['category'] ?? false, fn($query, $category)=>
            $query->whereHas('category', fn($query) => 
                $query->where('slug', $category)
            )
        );

        $query->when($filters['author'] ?? false, fn($query, $author)=>
            $query->whereHas('author', fn($query) => 
                $query->where('username', $author)
            )
        );
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function category(){
        //hasOne, hasMany, belongsTo, belongsToMany
        //Eloquent relationship
        return $this->belongsTo(Category::class);
    }

    public function author(){
        //hasOne, hasMany, belongsTo, belongsToMany
        //Eloquent relationship

        // We change the name of the function ( precedently USER) so if we want the system 
        // to retrieve the good name, we have to pass as a parameter
        return $this->belongsTo(User::class, 'user_id');
    }
}

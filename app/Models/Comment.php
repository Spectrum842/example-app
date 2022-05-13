<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    //protected $guarded = [];

    public function post(){
        return $this->belongsTo(Post::class); // We dont preciser "post_id" here because of the name of thefunction
                                              // Laravel is gonna look for the column in DB with "FUNCTIONAME_id"
    }

    public function author(){
        return $this->belongsTo(User::class, 'user_id'); // That's why we precise here : author_id doesn't
    }
    public function definition()
    {
        return [
            'post_id'=> Post::factory(),
            'user_id'=> Post::factory(),
            'body' => $this->faker->paragraph
        ];
    }
}

<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Post extends Model
{
    use HasFactory;
    // protected $table = 'posts';
    protected $fillable = [
        'title',
        'author_id',
        'content',
    ];
    public $timestamps = true;

    public static $rules = [
        'title'      => 'required',
        'content'    => 'required|min:10',
        'author_id'  => 'required|int'
    ];

    public function Author(){
        return $this->belongsTo(User::class, 'author_id');
    }
}

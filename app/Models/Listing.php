<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Listing extends Model
{
    use HasFactory;
    // i will add a line of code in appServiceProvider that will make me dont write fillable again because it allows me to submit mass assignemet
    /**
     * this is the code 
     * public function boot(): void
    *{
    *Model::unguard();
    *}
     */
    // protected $fillable = [
    //     'title','company','location','website','email','description','tags'
    // ];
    public function scopeFilter($query,array $filters){
        // dd($filters['tag']);
        if($filters['tag'] ?? false){
            $query->where('tags','like','%' . request('tag') . '%');
        }

        if($filters['search'] ?? false){
            $query->where('title','like','%' . request('search') . '%')
            ->orWhere('description','like','%' . request('search') . '%')
            ->orWhere('tags','like','%' . request('search') . '%')
            ->orWhere('location','like','%' . request('search') . '%');
        }
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}

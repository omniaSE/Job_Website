<?php

namespace App\Models;
use Illuminate\Support\Arr;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; 

class Job extends Model{
    use HasFactory;
    //this becuase my table name job_listing and my model name is job
     protected $table = 'job_listings';
   // protected $fillable = ['employee_id','title','salary']; i can use this way or the guarded way 
     protected $guarded = [];
    
    public function employee(){
        return $this->belongsTo(Employee::class);
    }
    public function tags(){
        return $this->belongsToMany(Tag::class,foreignPivotKey:"job_listing_id");
    }
}
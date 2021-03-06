<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['user_name','user_id','sample_id','course_id','tip_id','email','creative_id','description','approved'];


    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function sample()
    {
        return $this->belongsTo(Sample::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tip()
    {
        return $this->belongsTo(Tip::class);
    }

    public function creative()
    {
        return $this->belongsTo(Creative::class);
    }
}

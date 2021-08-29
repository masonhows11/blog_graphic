<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $fillable =
        ['user_id',
            'sample_id',
            'courses_id',
            'create_design_id',
            'like'];


    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    public function sample()
    {
        return $this->belongsToMany(Sample::class);
    }
}

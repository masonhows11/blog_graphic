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
            'creative_id',
            'like'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sample()
    {
        return $this->belongsTo(Sample::class);
    }

    public function creative()
    {
        return $this->belongsTo(Creative::class);
    }
}

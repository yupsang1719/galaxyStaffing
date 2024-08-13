<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'title',
        'description',
        'location',
        'category',
        'salary',
    ];

    public function applications()
    {
        return $this->hasMany(Application::class, 'job_id');
    }
}

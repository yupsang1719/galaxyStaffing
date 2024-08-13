<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_id',
        'applicant_name',
        'email',
        'resume',  // Assuming this stores a file path or text content
        'status',
    ];

    public function vacancy()
    {
        return $this->belongsTo(Vacancy::class, 'job_id');
    }
}

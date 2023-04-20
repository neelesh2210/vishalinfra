<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phase extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'name',
        'number_of_plot',
        'is_delete',
    ];

    public function project(){
        return $this->belongsTo(Project::class);
    }
}

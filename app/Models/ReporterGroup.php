<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReporterGroup extends Model
{
    use HasFactory;

    protected $table = 'reporter_group';
    protected $fillable = ['emp_id', 'group_code'];
}

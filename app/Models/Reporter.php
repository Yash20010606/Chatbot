<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reporter extends Model
{
    use HasFactory;
    

    // Specify the table if it's not the default "reporters"
    protected $table = 'reporter_group';

    // Primary key
    protected $primaryKey = 'emp_id';

    // Define fillable attributes (fields that are mass assignable)
    protected $fillable = ['emp_id', 'group_code'];

    // Relationship to Group model (assuming 'group_code' is in the 'groups' table)
    public function group()
    {
        return $this->belongsTo(Group::class, 'group_code', 'group_code');
    }
    

    public function user()
    {
        return $this->belongsTo(User::class, 'emp_id', 'emp_id'); // Adjust foreign key if needed
    }
}

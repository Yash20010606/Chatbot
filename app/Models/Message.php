<?php

namespace App\Models;

use Mongodb\Laravel\Eloquent\Model;

class Message extends Model
{
    protected $connection = 'mongodb'; // Ensure the MongoDB connection is specified
    protected $collection = 'messages'; // Specify the MongoDB collection

    protected $fillable = ['from', 'to', 'message', 'timestamp'];

    // Enable automatic timestamps for created_at and updated_at
    public $timestamps = true;

    // Define the format for timestamps if needed (optional)
    protected $dates = ['timestamp', 'created_at', 'updated_at'];
}

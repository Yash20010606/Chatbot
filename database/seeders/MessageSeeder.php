<?php

namespace Database\Seeders;

use App\Events\MessageSent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Message;
use Illuminate\Support\Facades\DB;


class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        DB::connection('mongodb')->table('messages')->insert([
            'from' => '0712341767',
            'to' => '123456',
            'message' => 'Hello..Good mornning!',
            'timestamp' => now(),
            'is_read' => false,
        ]);
        $this->command->info('Message inserted successfully!');



}}

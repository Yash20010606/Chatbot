<?php

namespace Database\Seeders;

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
            'from' => '0719667029',
            'to' => '123456',
            'message' => 'Good mornning!',
            'timestamp' => now(),
        ]);
        $this->command->info('Message inserted successfully!');
    }
}

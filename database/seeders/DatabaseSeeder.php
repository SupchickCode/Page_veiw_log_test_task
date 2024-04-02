<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $startDate = now()->subMonths(6);
        $endDate = now();

        while ($startDate <= $endDate) {
            $numberOfViews = rand(1, 10);
            $logs = [];

            for ($i = 0; $i < $numberOfViews; $i++) {
                $logs[] = [
                    'id' => Str::uuid(),
                    'url' => 'example.com/page',
                    'user_id' => rand(1, 10) <= 5 ? null : rand(1, 100),
                    'created_at' => $startDate,
                    'updated_at' => $startDate,
                ];
            }

            \DB::table('page_view_logs')->insert($logs);

            $startDate->addDay();
        }
    }
}

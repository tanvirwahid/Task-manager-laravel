<?php

namespace Database\Seeders;

use App\Enums\StatusEnum;
use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Status::truncate();

        $statuses = [
            StatusEnum::PENDING,
            StatusEnum::WORKING,
            StatusEnum::DONE,
        ];

        foreach ($statuses as $status) {
            Status::create(
                [
                    'name' => $status,
                ]
            );
        }
    }
}

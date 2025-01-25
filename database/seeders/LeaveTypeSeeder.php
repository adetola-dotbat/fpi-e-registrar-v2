<?php

namespace Database\Seeders;

use App\Models\LeaveType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LeaveTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $leaveTypes = [
            ['type' => 'annual', 'days' => 30],
            ['type' => 'casual', 'days' => 7],
            ['type' => 'maternity', 'days' => 120],
            ['type' => 'leave of absence', 'days' => 365],
            ['type' => 'sabbatical leave', 'days' => 365],

        ];

        foreach ($leaveTypes as $type) {
            LeaveType::create($type);
        }
    }
}

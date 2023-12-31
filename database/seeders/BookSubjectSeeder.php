<?php

namespace Database\Seeders;

use App\Models\BookSubject;
use Illuminate\Database\Seeder;

class BookSubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BookSubject::factory()->count(20)->create();
    }
}

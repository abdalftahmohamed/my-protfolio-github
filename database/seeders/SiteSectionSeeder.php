<?php

namespace Database\Seeders;

use App\Models\SiteSection;
use Illuminate\Database\Seeder;

class SiteSectionSeeder extends Seeder
{
    public function run(): void
    {
        foreach (['skills', 'projects', 'experiences', 'educations', 'testimonials'] as $key) {
            SiteSection::firstOrCreate(
                ['key' => $key],
                ['is_visible' => true]
            );
        }
    }
}

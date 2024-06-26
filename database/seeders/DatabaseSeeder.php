<?php

namespace Database\Seeders;

use App\Models\Asset;
use App\Models\AssetPicLink;
use App\Models\Company;
use App\Models\User;
use App\Models\Workplace;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $company = Company::factory()->create();
        $workplace = Workplace::factory()->count(3)->for($company)->has(User::factory())->has(Asset::factory()->count(3)->has(AssetPicLink::factory()))->create();
        // User::factory()->has($workplace)->create();
        // $asset = Asset::factory()->count(3)->for($workplace)->create();
    }
}

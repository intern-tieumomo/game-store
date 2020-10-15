<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(GenreSeeder::class);
    }
}

class GenreSeeder extends Seeder {
	public function run() {
		DB::table('genres')->insert([
			[
				'name' => 'Point-and-click',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'Fighting',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'Shooter',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'Music',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'Platform',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'Puzzle',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'Racing',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'Real Time Strategy (RTS)',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'Role-playing (RPG)',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'Simulator',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'Sport',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'Strategy',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'Turn-base Strategy (TBS)',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'Tactical',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'Quiz/Trivia',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'Hack and Slash/Beat\'em up',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'Pinball',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'Adventure',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'Arcade',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'Visual Novel',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'Indie',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'Card & Board Game',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'MOBA',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
		]);
	}
}

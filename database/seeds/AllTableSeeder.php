<?php

use Illuminate\Database\Seeder;

class AllTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 3)->create();
        factory(App\ContentState::class, 5)->create();
        factory(App\Role::class, 3)->create();
        factory(App\PostType::class, 3)->create();
        factory(App\Permission::class, 8)->create();
        factory(App\Category::class, 8)->create();

    }
}

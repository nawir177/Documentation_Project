<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Icon;
use App\Models\User;
use App\Models\Folder;
use Illuminate\Database\Seeder;
use PhpParser\Node\Stmt\Catch_;
use Spatie\Permission\Contracts\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(PermissionSeeder::class);
        $this->call(RollSeeder::class);
        $admin = User::create([
            'name' => 'admin',
            'status' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => '$2y$10$sEzOoNdoJxP/q27MNvCi9eS6yiv8wApZ3PM5UQd6T2BpVkckfDC06',
            'image' => 'user-images/XEDbi3YuxZLg5zFaKwyovmW7HzuPArZwXnbUk3z9.jpg',
            'verified' => 1,
        ]);
        $admin->assignRole('admin');

        $user = User::create([  
            'name' => 'saadam',
            'status' => 'admin',
            'email' => 'sadam@gmail.com',
            'password' => '$2y$10$sEzOoNdoJxP/q27MNvCi9eS6yiv8wApZ3PM5UQd6T2BpVkckfDC06',
            'image' => 'user-images/guox9Y647CU1bI1ULaR3KBdFLKflHSNgdO7G9VE2.jpg',
            'verified' => 1,
        ]);
        $user->assignRole('magang');

        Icon::create([
            'user_id' => 1,
            'name' => 'icon1',
            'value' => ' <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 m-auto group-hover:text-white">
                        <path stroke-linecap="round"  stroke-linejoin="round" d="M12.75 19.5v-.75a7.5 7.5 0 00-7.5-7.5H4.5m0-6.75h.75c7.87 0 14.25 6.38 14.25 14.25v.75M6 18.75a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                        </svg>'
        ]);

        Icon::create([
            'user_id' => 1,
            'name' => 'icon2',
            'value' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="w-6 h-6 m-auto group-hover:text-white">
                        <path strokeLinecap="round" strokeLinejoin="round" d="M9.348 14.651a3.75 3.75 0 010-5.303m5.304 0a3.75 3.75 0 010 5.303m-7.425 2.122a6.75 6.75 0 010-9.546m9.546 0a6.75 6.75 0 010 9.546M5.106 18.894c-3.808-3.808-3.808-9.98 0-13.789m13.788 0c3.808 3.808 3.808 9.981 0 13.79M12 12h.008v.007H12V12zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                        </svg>'
        ]);

        Icon::create([
            'user_id' => 1,
            'name' => 'icon3',
            'value' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 m-auto group-hover:text-white">
                      <path stroke-linecap="round" d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25h-9A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z" />
                    </svg>'
        ]);

        Category::create([
            'icon_id' => 1,
            'color' => "yellow",
            'user_id' => 1,
            'name' => 'Documentation'
        ]);

        Category::create([
            'icon_id' => 2,
            'color' => "blue",
            'user_id' => 1,
            'name' => 'Network'
        ]);

        Category::create([
            'icon_id' => 3,
            'color' => "red",
            'user_id' => 1,
            'name' => 'Jobdess'
        ]);



        Folder::create([
            'category_id' => 1,
            'name' => 'Folder1'
        ]);
        Folder::create([
            'category_id' => 1,
            'name' => 'Folder2'
        ]);
        Folder::create([
            'category_id' => 1,
            'name' => 'Folder3'
        ]);
        Folder::create([
            'category_id' => 2,
            'name' => 'Folder1'
        ]);

        Folder::create([
            'category_id' => 2,
            'name' => 'Folder2'
        ]);
        Folder::create([
            'category_id' => 2,
            'name' => 'Folder3'
        ]);
    }
}

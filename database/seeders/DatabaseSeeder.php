<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Position;
use App\Models\Bio;
use App\Models\Post;
use App\Models\Category;
use App\Models\Building;
use App\Models\Room;
use App\Models\Ticket;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::create([
        //     'name' => 'Abdul Mannan',
        //     'email' => 'abdul.saipi@stduent.president.ac.id',
        //     'password' => bcrypt('12345')
        // ]);
        User::factory(10)->create();

        Position::create([
            'name' => 'CEO',

        ]);

        Position::create([
            'name' => 'IT Employee',

        ]);

        Position::create([
            'name' => 'Employee',
        ]);
        Ticket::factory(20)->create();

        // Room::factory(20)->create();

        // Post::factory(20)->create();





        // Post::create([
        //     'title' => 'First',
        //     'slug' => 'first',
        //     'excerpt' => 'jasjkldflkasjdf aksl;djf ;alksjdf',
        //     'body' => 'JSdhauiskghf oaiudshfuasdhgf ucasngdvfcuayseihfcvgbasdyifgv aouisdhf cnuyiasgf asdf uashdfikgasbd kjfgvaskduhjf g',
        //     'category_id' => 1,
        //     'user_id' => 1,
        // ]);

        // Post::create([
        //     'title' => 'SECOND',
        //     'slug' => 'SECOND',
        //     'excerpt' => 'jasjkldflkasjdf aksl;djf ;alksjdf',
        //     'body' => 'JSdhauiskghf oaiudshfuasdhgf ucasngdvfcuayseihfcvgbasdyifgv aouisdhf cnuyiasgf asdf uashdfikgasbd kjfgvaskduhjf g',
        //     'category_id' => 1,
        //     'user_id' => 1,
        // ]);
        // Post::create([
        //     'title' => 'THIRD',
        //     'slug' => 'THIRD',
        //     'excerpt' => 'jasjkldflkasjdf aksl;djf ;alksjdf',
        //     'body' => 'JSdhauiskghf oaiudshfuasdhgf ucasngdvfcuayseihfcvgbasdyifgv aouisdhf cnuyiasgf asdf uashdfikgasbd kjfgvaskduhjf g',
        //     'category_id' => 2,
        //     'user_id' => 1,
        // ]);
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

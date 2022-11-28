<?php

namespace Database\Seeders;

use App\Models\Data;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Data::create([
            "user_id"=>1,
            "folder_id"=>1,
            "name"=>"Youtebe",
            "link"=>"https://www.youtube.com/watch?v=wLXFynJCoF4",
            "description"=> "Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui commodi aperiam libero eum voluptate explicabo. Animi optio quam laboriosam, omnis minima laborum corrupti totam alias odit unde nam est, fugit modi explicabo mollitia? Asperiores ipsa adipisci saepe, facere, minus maiores officia repellendus fugit et dolor est similique dolore porro cum?"
        ]);

        Data::create([
            "user_id"=>1,
            "folder_id"=>2,
            "name"=>"Youtube",
            "link"=>"https://www.youtube.com/watch?v=wLXFynJCoF4",
            "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui commodi aperiam libero eum voluptate explicabo. Animi optio quam laboriosam, omnis minima laborum corrupti totam alias odit unde nam est, fugit modi explicabo mollitia? Asperiores ipsa adipisci saepe, facere, minus maiores officia repellendus fugit et dolor est similique dolore porro cum?"
        ]);

        Data::create([
            "user_id"=>1,
            "folder_id"=>3,
            "name"=>"Youtebe",
            "link"=>"https://www.youtube.com/watch?v=wLXFynJCoF4",
            "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui commodi aperiam libero eum voluptate explicabo. Animi optio quam laboriosam, omnis minima laborum corrupti totam alias odit unde nam est, fugit modi explicabo mollitia? Asperiores ipsa adipisci saepe, facere, minus maiores officia repellendus fugit et dolor est similique dolore porro cum?"
        ]);
}
    }


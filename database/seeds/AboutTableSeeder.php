<?php

use Illuminate\Database\Seeder;

use App\About;

class AboutTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        $about = new About();
        $about->title = "Header title";
        $about->description = "Short description about your company";
        $about->text = "Big description about your company";
        $about->email = "yor_email@gmail.com";
        $about->num = "(+995) 598 76 54 32";
        $about->site_url = "http://localhost/";

        $about->save();
    }
}

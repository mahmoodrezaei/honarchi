<?php

namespace Tests\Unit;

use App\Info;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InfoModelTest extends TestCase
{
    use RefreshDatabase;


    private $faker;
    private $about;

    public function setUp()
    {
        parent::setUp();
        $this->faker = $facer = factory(Info::class)->make();
        $this->about = new Info;


        //tested create
        $this->about->cover_title = $this->faker->cover_title;
        $this->about->cover_body = $this->faker->cover_body;
        $this->about->cover_img = $this->faker->cover_img;
        $this->about->title = $this->faker->title;
        $this->about->body = $this->faker->body;
        $this->about->img = $this->faker->img;
        $this->about->address = $this->faker->address;
        $this->about->phone = $this->faker->phone;
        $this->about->cell_phone = $this->faker->cell_phone;
        $this->about->email = $this->faker->email;
        $this->about->instagram = $this->faker->instagram;
        $this->about->telegram = $this->faker->telegram;
        $this->about->save();

        $this->assertEquals($this->faker->cover_title, $this->about->cover_title);

         // dd($this->facer->cover_img, $this->about->cover_img);
    }

    /**
     * A basic test example.
     *
     * @return void
     * @test
     */

    //TESTED OF UPDATE
    public function about_update()
    {

        $facer = factory(Info::class)->make();

        $about_update = Info::find($this->about->id);

        $about_update->cover_title = $this->faker->cover_title;
        $about_update->cover_body = $this->faker->cover_body;
        $about_update->cover_img = $this->faker->cover_img;
        $about_update->title = $this->faker->title;
        $about_update->body = $this->faker->body;
        $about_update->img = $this->faker->img;
        $about_update->address = $this->faker->address;
        $about_update->phone = $this->faker->phone;
        $about_update->cell_phone = $this->faker->cell_phone;
        $about_update->email = $this->faker->email;
        $about_update->instagram = $this->faker->instagram;
        $about_update->telegram = $this->faker->telegram;
        $about_update->save();

        $this->assertNotEmpty($about_update->telegram);

//        dd( $request_updatee,$request_update);

    }
    /**
     * A basic test example.
     *
     * @return void
     * @test
     */

    //TESTED OF DESTROY
    public function about_delete()
    {
        $about_delete = Info::find($this->about->id)->delete();

        $this->assertNotEmpty($about_delete);

        //dd($about_delete);
    }


}

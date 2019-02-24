<?php

namespace Tests\Unit;

use App\About;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AboutModelTest extends TestCase
{
    use RefreshDatabase;


    private $facer;
    private $about;

    public function setUp()
    {
        parent::setUp();
        $this->facer = $facer = factory(About::class)->make();
        $this->about = new About;


        //tested create
        $this->about->cover_title = $this->facer->cover_title;
        $this->about->cover_body = $this->facer->cover_body;
        $this->about->cover_img = $this->facer->cover_img;
        $this->about->title = $this->facer->title;
        $this->about->body = $this->facer->body;
        $this->about->img = $this->facer->img;
        $this->about->address = $this->facer->address;
        $this->about->phone = $this->facer->phone;
        $this->about->cell_phone = $this->facer->cell_phone;
        $this->about->email = $this->facer->email;
        $this->about->instagram = $this->facer->instagram;
        $this->about->telegram = $this->facer->telegram;
        $this->about->save();

        $this->assertEquals($this->facer->cover_title, $this->about->cover_title);

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

        $facer = factory(About::class)->make();

        $about_update = About::find($this->about->id);

        $about_update->cover_title = $this->facer->cover_title;
        $about_update->cover_body = $this->facer->cover_body;
        $about_update->cover_img = $this->facer->cover_img;
        $about_update->title = $this->facer->title;
        $about_update->body = $this->facer->body;
        $about_update->img = $this->facer->img;
        $about_update->address = $this->facer->address;
        $about_update->phone = $this->facer->phone;
        $about_update->cell_phone = $this->facer->cell_phone;
        $about_update->email = $this->facer->email;
        $about_update->instagram = $this->facer->instagram;
        $about_update->telegram = $this->facer->telegram;
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
        $about_delete = About::find($this->about->id)->delete();

        $this->assertNotEmpty($about_delete);

        //dd($about_delete);
    }


}

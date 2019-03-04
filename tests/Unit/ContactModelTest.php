<?php

namespace Tests\Unit;

use App\Contact;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ContactModelTest extends TestCase
{
    use RefreshDatabase;

    private $facer;
    private $request;

    public function setUp()
    {
        parent::setUp();
        $this->facer = $facer = factory(Contact::class)->make();
        $this->request = new Contact;


        //tested create
        $this->request->first_name = $this->facer->first_name;
        $this->request->last_name = $this->facer->last_name;
        $this->request->email = $this->facer->email;
        $this->request->subject = $this->facer->subject;
        $this->request->description = $this->facer->description;
        $this->request->save();

        $this->assertEquals($this->facer->first_name, $this->request->first_name);

    }

    /**
     * A basic test example.
     *
     * @return void
     * @test
     */

    public function update_request()
    {
        $facer = factory(Contact::class)->make();

        $request_updatee = Contact::find($this->request->id);

        $request_update = Contact::find($this->request->id);
        $request_update->first_name = $facer->first_name;
        $request_update->last_name = $facer->last_name;
        $request_update->email = $facer->email;
        $request_update->subject = $facer->subject;
        $request_update->description = $facer->description;
        $request_update->save();

        $this->assertNotEmpty( $request_update->first_name);

       // dd( $request_updatee,$request_update);

    }

    /**
     * @test
     */

    public function delete_request()
    {
        $request_delete =Contact::find($this->request->id)->delete();

        $this->assertNotEmpty( $request_delete);

        //dd($request_delete);

    }
}

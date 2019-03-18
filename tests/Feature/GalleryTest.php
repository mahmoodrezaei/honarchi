<?php

namespace Tests\Feature;

use App\Gallery;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GalleryTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    /*public function a_user_may_request_for_gallery()
    {

    }*/

    /** @test */
    public function a_superadmin_can_approve_gallery_requests()
    {
        $gallery = create('App\Gallery');

        $this->assertDatabaseHas('galleries', ['state' => 0]);

        $this->json('patch', 'api/admin/galleries/' . $gallery->id . '/approve')
            ->assertStatus(200)
            ->assertJsonStructure(['message', 'status_code'])
            ->assertJson(['message' => 'Gallery approved']);

        $this->assertDatabaseHas('galleries', ['state' => 1]);
    }

    /** @test */
    public function a_super_admin_can_block_a_gallery()
    {
        $gallery = create('App\Gallery');

        $this->json('patch', 'api/admin/galleries/' . $gallery->id . '/block')
            ->assertStatus(200)
            ->assertJsonStructure(['message', 'status_code'])
            ->assertJson(['message' => 'Gallery is blocked']);
    }

    /** @test */
    public function a_superadmin_can_unblock_a_gallery()
    {
        $gallery = create('App\Gallery');

        $this->json('patch', 'api/admin/galleries/' . $gallery->id . '/unblock')
            ->assertStatus(200)
            ->assertJsonStructure(['message', 'status_code'])
            ->assertJson(['message' => 'Gallery is unblocked']);
    }

    /** @test */
    public function a_superadmin_can_create_gallery()
    {
        $this->withExceptionHandling();
        $gallery = make('App\Gallery');


        $this->json('POST', 'api/admin/galleries', $gallery->toArray())
            ->assertStatus(201)
            ->assertJsonStructure(['message', 'status_code', 'gallery'])
            ->assertJson(['gallery' => $gallery->toArray()]);


        $this->assertDatabaseHas('galleries', [
            'gallery_name' => $gallery->gallery_name,
            'location' => $gallery->location,
            'state' => 1
        ]);
    }

    /** @test */
    public function a_super_admin_can_update_gallery_info()
    {
        $this->withExceptionHandling();
        $gallery = create('App\Gallery');

        $gallery->owner_id = 10;
        $gallery->gallery_name = 'updated name';
        $gallery->location = 'updated location';


        $this->patch('api/admin/galleries/' . $gallery->id, $gallery->toArray())
            ->assertStatus(200)
            ->assertJson(['gallery' => $gallery->refresh()->toArray()]);

        $this->assertDatabaseHas('galleries', [
            'owner_id' => 10,
            'gallery_name' => 'updated name',
            'location' => 'updated location'
        ]);
    }

    /** @test */
    public function a_superadmin_can_see_a_single_gallery()
    {
        $gallery = create('App\Gallery');

        $this->json('get', 'api/admin/galleries/' . $gallery->id)
            ->assertStatus(200)
            ->assertJson(['gallery' => $gallery->toArray()])
            ->assertSee($gallery->gallery_name);
    }

    /** @test */
    public function a_superadmin_can_see_gallery_list()
    {
        $galleries = factory('App\Gallery', 5)->create();

        $this->json('GET', 'api/admin/galleries')
            ->assertStatus(200)
            ->assertJson(['galleries' => $galleries->toArray()]);
    }

    /** @test */
    public function a_superadmin_can_see_blocked_gallery_list()
    {
        $blockedGalleries = factory('App\Gallery', 3)->create(['state' => -1]);
        $blockedGalleries[] = factory('App\Gallery')->create(['state' => 1]);
        $blockedGalleries[] = factory('App\Gallery')->create();

        $this->json('GET', 'api/admin/galleries?blocked=1')
            ->assertStatus(200)
            ->assertJsonCount(3, 'galleries');
//            ->assertJson(['galleries' => $blockedGalleries->toArray()]);
            /*->assertJsonCount(4, ['galleries' => $blockedGalleries->toArray()]);*/
    }

    /** @test */
    public function a_superadmin_can_see_unapproved_gallery_list()
    {
        $unapprovedGalleries = factory('App\Gallery', 3)->create();
        $unapprovedGalleries[] = factory('App\Gallery')->create(['state' => 1]);
        $unapprovedGalleries[] = factory('App\Gallery')->create(['state' => -1]);

        $this->json('GET', 'api/admin/galleries?unapproved=1')
            ->assertStatus(200)
            ->assertJsonCount(3, 'galleries');
    }


    // Validation Tests

    /** @test */
    public function it_requires_gallery_name()
    {
        $gallery = make('App\Gallery', ['gallery_name' => '']);

        $this->json('POST', 'api/admin/galleries', $gallery->toArray())
            ->assertStatus(422)
            ->assertJson(['message' => 'The given data was invalid.']);
    }

    /** @test */
    public function it_requires_location()
    {
        $gallery = make('App\Gallery', ['location' => '']);

        $this->json('POST', 'api/admin/galleries', $gallery->toArray())
            ->assertStatus(422)
            ->assertJson(['message' => 'The given data was invalid.']);
    }

    /** @test */
    public function it_requires_type()
    {
        $gallery = make('App\Gallery', ['type' => '']);

        $this->json('POST', 'api/admin/galleries', $gallery->toArray())
            ->assertStatus(422)
            ->assertJson(['message' => 'The given data was invalid.']);
    }

}
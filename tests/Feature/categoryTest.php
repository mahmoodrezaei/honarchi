<?php

namespace Tests\Feature;

use App\Category;
use Symfony\Component\HttpFoundation\Session\Session;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class categoryTest extends TestCase
{
    private $table = "categories";

    use RefreshDatabase;


    /**
     * @test
     */
    public function get_all_categories()
    {
        $categories[] = factory(Category::class)->create()->toArray();
        $categories[] = factory(Category::class)->create()->toArray();
        $categoriesNames =  array_map(function ($arr) {
            return $arr['name'];
        }, $categories);

        $response = $this->json('GET', route('categories.index'));

        $response->assertStatus(200);
        $response->assertJsonStructure([
            '*' => ['id', 'name', 'parent_id']
        ]);
    }

    /**
     * @test
     */
    public function will_fail_with_validation_errors_when_creating_a_category_with_wrong_inputs()
    {
        $category1 = factory(Category::class)->make();
        $category2 = factory(Category::class)->create();


        $response = $this->json('POST', route('categories.store'), [
            'name' => null,
            'parent_id' => null
        ]);
        $response->assertStatus(422)
            ->assertExactJson([
                'message' => 'The given data was invalid.',
                'errors' => [
                    'name' => [
                        'The name field is required.'
                    ]
                ]
            ]);


        $response = $this->json('POST', route('categories.store'), [
            'name' => str_random(31),
            'parent_id' => null
        ]);

        $response->assertStatus(422)
            ->assertExactJson([
                'message' => 'The given data was invalid.',
                'errors' => [
                    'name' => ['The name may not be greater than 30 characters.']
                ]
            ]);


        $response = $this->json('POST', route('categories.store'), [
            'name' => $category2->name,
            'parent_id' => null
        ]);

        $response->assertStatus(422)
            ->assertExactJson([
                'message' => 'The given data was invalid.',
                'errors' => [
                    'name' => ['The name has already been taken.']
                ]
            ]);


        $response = $this->json('POST', route('categories.store'), [
            'name' => $category1->name,
            'parent_id' => -1
        ]);

        $response->assertStatus(422)
            ->assertExactJson([
                'message' => 'The given data was invalid.',
                'errors' => [
                    'parent_id' => ['The parent id must be at least 1.']
                ]
            ]);


        $response = $this->json('POST', route('categories.store'), [
            'name' => $category1->name,
            'parent_id' => 'string'
        ]);

        $response->assertStatus(422)
            ->assertExactJson([
                'message' => 'The given data was invalid.',
                'errors' => [
                    'parent_id' => ['The parent id must be an integer.']
                ]
            ]);
    }

    /**
     * @test
     */
    public function store_a_category()
    {
        $category = factory(Category::class)->make();

        $response = $this->json('POST', route('categories.store'), $category->toArray());

        $response->assertStatus(201);
        $response->assertJsonStructure([
            'id', 'name', 'parent_id'
        ]);
        $response->assertJson([
            'name' => $category->name,
            'parent_id' => $category->parent_id
        ]);

        $this->assertDatabaseHas($this->table, $category->toArray());
    }

    /**
     * @test
     */
    public function will_fail_with_validation_errors_when_updating_a_category_with_wrong_inputs()
    {
        $category1 = factory(Category::class)->make();
        $category2 = factory(Category::class)->create();
        $category3 = factory(Category::class)->create();


        $response = $this->json('PUT', route('categories.update', ['category' => $category2->id]), [
            'name' => null,
            'parent_id' => null
        ]);

        $response->assertStatus(422)
            ->assertExactJson([
                'message' => 'The given data was invalid.',
                'errors' => [
                    'name' => [
                        'The name field is required.'
                    ]
                ]
            ]);


        $response = $this->json('PUT', route('categories.update', ['category' => $category2->id]), [
            'name' => str_random(31),
            'parent_id' => null
        ]);

        $response->assertStatus(422)
            ->assertExactJson([
                'message' => 'The given data was invalid.',
                'errors' => [
                    'name' => ['The name may not be greater than 30 characters.']
                ]
            ]);


        $response = $this->json('PUT', route('categories.update', ['category' => $category2->id]), [
            'name' => $category3->name,
            'parent_id' => null
        ]);

        $response->assertStatus(422)
            ->assertExactJson([
                'message' => 'The given data was invalid.',
                'errors' => [
                    'name' => ['The name has already been taken.']
                ]
            ]);


        $response = $this->json('PUT', route('categories.update', ['category' => $category2->id]), [
            'name' => $category1->name,
            'parent_id' => -1
        ]);

        $response->assertStatus(422)
            ->assertExactJson([
                'message' => 'The given data was invalid.',
                'errors' => [
                    'parent_id' => ['The parent id must be at least 1.']
                ]
            ]);


        $response = $this->json('PUT', route('categories.update', ['category' => $category2->id]), [
            'name' => $category1->name,
            'parent_id' => 'string'
        ]);

        $response->assertStatus(422)
            ->assertExactJson([
                'message' => 'The given data was invalid.',
                'errors' => [
                    'parent_id' => ['The parent id must be an integer.']
                ]
            ]);

        $response = $this->json('PUT', route('categories.update', ['category' => $category2->id]), [
            'name' => $category2->name,
            'parent_id' => null
        ]);

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function will_fail_with_a_404_if_category_we_want_to_update_not_found()
    {
        $response = $this->put(route('categories.update', ['category' => -1]));

        $response->assertStatus(404);
    }

    /**
     * @test
     */
    public function update_a_category()
    {
        $category = factory(Category::class)->create();
        $category->name = $category->name . '_updated';

        $response = $this->json('PUT', route('categories.update', ['category' => $category->id]), $category->toArray());

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'id', 'name', 'parent_id'
        ]);
        $response->assertJson([
            'name' => $category->name,
            'parent_id' => $category->parent_id
        ]);
    }

    /**
     * @test
     */
    public function will_fail_with_a_404_if_category_we_want_to_delete_not_found()
    {
        $response = $this->json('DELETE', route('categories.destroy', ['category' => -1]));

        $response->assertStatus(404);
    }

    /**
     * @test
     */
    public function delete_a_category()
    {
        $category = factory(Category::class)->create();

        $response = $this->delete(route('categories.destroy', ['category' => $category->id]));

        $response->assertStatus(204)
            ->assertSee(null);

        $this->assertDatabaseMissing($this->table, $category->toArray());
    }
}

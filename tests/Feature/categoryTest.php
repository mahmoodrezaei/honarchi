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
        $categoriesNames =  array_map(function($arr) {
            return $arr['name'];
            }, $categories);

        $response = $this->get(route('categories.index'));

        $response->assertViewIs('panel.category.index');
        $response->assertViewHas('categories');
        $response->assertSeeInOrder($categoriesNames);
        $response->assertStatus(200);

    }

    /**
     * @test
     */
    public function will_fail_with_validation_errors_when_creating_a_category_with_wrong_inputs()
    {
        $category1 = factory(Category::class)->make();
        $category2 = factory(Category::class)->create();


        $response = $this->post(route('categories.store'), [
            'name' => null,
            'parent_id' => null
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors([
            'name' => 'The name field is required.'
        ]);


        $response = $this->post(route('categories.store'), [
            'name' => str_random(31),
            'parent_id' => null
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors([
            'name' => 'The name may not be greater than 30 characters.'
        ]);


        $response = $this->post(route('categories.store'), [
            'name' => $category2->name,
            'parent_id' => null
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors([
            'name' => 'The name has already been taken.'
        ]);


        $response = $this->post(route('categories.store'), [
            'name' => $category1->name,
            'parent_id' => -1
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors([
            'parent_id' => 'The parent id must be at least 1.'
        ]);


        $response = $this->post(route('categories.store'), [
            'name' => $category1->name,
            'parent_id' => 'string'
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors([
            'parent_id' => 'The parent id must be an integer.'
        ]);
    }
    
    /**
     * @test
     */
    public function store_a_category()
    {
        $category = factory(Category::class)->make();

        $response = $this->post(route('categories.store'), $category->toArray());

        $response->assertStatus(302);
        $response->assertSessionHas('message', 'Successful');

        $this->assertDatabaseHas($this->table, $category->toArray());
    }

    /**
     * @test
     */
    public function create_a_category()
    {

        $response = $this->get(route('categories.create'));
        $response->assertStatus(200);


    }

    /**
     * @test
     */
    public function will_fail_with_validation_errors_when_updating_a_category_with_wrong_inputs()
    {
        $category1 = factory(Category::class)->make();
        $category2 = factory(Category::class)->create();
        $category3 = factory(Category::class)->create();


        $response = $this->put(route('categories.update', ['category' => $category2->id]), [
            'name' => null,
            'parent_id' => null
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors([
            'name' => 'The name field is required.'
        ]);


        $response = $this->put(route('categories.update', ['category' => $category2->id]), [
            'name' => str_random(31),
            'parent_id' => null
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors([
            'name' => 'The name may not be greater than 30 characters.'
        ]);


        $response = $this->put(route('categories.update', ['category' => $category2->id]), [
            'name' => $category3->name,
            'parent_id' => null
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors([
            'name' => 'The name has already been taken.'
        ]);


        $response = $this->put(route('categories.update', ['category' => $category2->id]), [
            'name' => $category1->name,
            'parent_id' => -1
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors([
            'parent_id' => 'The parent id must be at least 1.'
        ]);


        $response = $this->put(route('categories.update', ['category' => $category2->id]), [
            'name' => $category1->name,
            'parent_id' => 'string'
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors([
            'parent_id' => 'The parent id must be an integer.'
        ]);

        $response = $this->put(route('categories.update', ['category' => $category2->id]), [
            'name' => $category2->name,
            'parent_id' => null
        ]);

        $response->assertStatus(302);
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
        $category->name = $category->name.'_updated';

        $response = $this->put(route('categories.update', ['category' => $category->id]), $category->toArray());

        $response->assertStatus(302);
        $response->assertSessionHas('message', 'Successful');

        $this->assertDatabaseHas($this->table, $category->toArray());
    }

    /**
     * @test
     */
    public function edit_a_category()
    {
        $category = factory(Category::class)->create();

        $response = $this->get(route('categories.edit', ['category' => $category->id]));

        $response->assertStatus(200);
        $response->assertViewHas('categories');
        $response->assertViewHas('category');

    }

    /**
     * @test
     */
    public function will_fail_with_a_404_if_category_we_want_to_delete_not_found()
    {
        $response = $this->delete(route('categories.destroy', ['category' => -1]));

        $response->assertStatus(404);
    }

    /**
     * @test
     */
    public function delete_a_category()
    {
        $category = factory(Category::class)->create();

        $response = $this->delete(route('categories.destroy', ['category' => $category->id]));

        $response->assertStatus(302);
        $response->assertSessionHas('message', 'Successful');

        $this->assertDatabaseMissing($this->table, $category->toArray());

    }
}

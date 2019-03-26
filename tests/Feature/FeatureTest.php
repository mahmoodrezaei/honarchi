<?php

namespace Tests\Feature;

use App\Feature;
use Symfony\Component\HttpFoundation\Session\Session;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FeatureTest extends TestCase
{
    private $table = "features";

    use RefreshDatabase;


    /**
     * @test
     */
    public function get_all_features()
    {
        $features[] = factory(Feature::class)->create()->toArray();
        $features[] = factory(Feature::class)->create()->toArray();

        $response = $this->json('GET', route('features.index'));

        $response->assertStatus(200);
        $response->assertJsonStructure([
            '*' => ['id', 'name', 'key_id']
        ]);
    }

    /**
     * @test
     */
    public function will_fail_with_validation_errors_when_creating_a_feature_with_wrong_inputs()
    {
        $feature1 = factory(feature::class)->make();
        $feature2 = factory(feature::class)->create();


        $response = $this->json('POST', route('features.store'), [
            'name' => null,
            'key_id' => null
        ]);
        $response->assertStatus(422)
            ->assertExactJson([
                'message' => 'The given data was invalid.',
                'errors' => [
                    'name' => [
                        trans('validation.required', ['attribute' => trans('validation.attributes.name')])
                    ]
                ]
            ]);


        $response = $this->json('POST', route('features.store'), [
            'name' => str_random(31),
            'key_id' => null
        ]);

        $response->assertStatus(422)
            ->assertExactJson([
                'message' => 'The given data was invalid.',
                'errors' => [
                    'name' => [trans('validation.max.string',['attribute' => trans('validation.attributes.name'), 'max' => '30'])]
                ]
            ]);


        $response = $this->json('POST', route('features.store'), [
            'name' => $feature2->name,
            'key_id' => null
        ]);

        $response->assertStatus(422)
            ->assertExactJson([
                'message' => 'The given data was invalid.',
                'errors' => [
                    'name' => [trans('validation.unique',['attribute' => trans('validation.attributes.name')])]
                ]
            ]);


        $response = $this->json('POST', route('features.store'), [
            'name' => $feature1->name,
            'key_id' => -1
        ]);

        $response->assertStatus(422)
            ->assertExactJson([
                'message' => 'The given data was invalid.',
                'errors' => [
                    'key_id' => [trans('validation.min.numeric', ['attribute' => 'key id', 'min' => 1])]
                ]
            ]);


        $response = $this->json('POST', route('features.store'), [
            'name' => $feature1->name,
            'key_id' => 'string'
        ]);

        $response->assertStatus(422)
            ->assertExactJson([
                'message' => 'The given data was invalid.',
                'errors' => [
                    'key_id' => [trans('validation.integer', ['attribute' => 'key id'])]
                ]
            ]);
    }

    /**
     * @test
     */
    public function store_a_feature()
    {
        $feature = factory(Feature::class)->make();

        $response = $this->json('POST', route('features.store'), $feature->toArray());

        $response->assertStatus(201);
        $response->assertJsonStructure([
            'id', 'name', 'slug', 'key_id',
        ]);
        $response->assertJson([
            'name' => $feature->name,
            'slug' => str_slug($feature->name),
            'key_id' => $feature->key_id
        ]);

        $this->assertDatabaseHas($this->table, $feature->toArray());
    }

    /**
     * @test
     */
    public function will_fail_with_validation_errors_when_updating_a_feature_with_wrong_inputs()
    {
        $feature1 = factory(Feature::class)->make();
        $feature2 = factory(Feature::class)->create();
        $feature3 = factory(Feature::class)->create();


        $response = $this->json('PUT', route('features.update', ['feature' => $feature2->id]), [
            'name' => null,
            'key_id' => null
        ]);

        $response->assertStatus(422)
            ->assertExactJson([
                'message' => 'The given data was invalid.',
                'errors' => [
                    'name' => [
                        trans('validation.required', ['attribute' => trans('validation.attributes.name')])
                    ]
                ]
            ]);


        $response = $this->json('PUT', route('features.update', ['feature' => $feature2->id]), [
            'name' => str_random(31),
            'key_id' => null
        ]);

        $response->assertStatus(422)
            ->assertExactJson([
                'message' => 'The given data was invalid.',
                'errors' => [
                    'name' => [trans('validation.max.string', ['attribute' => trans('validation.attributes.name'), 'max' => '30'])]
                ]
            ]);


        $response = $this->json('PUT', route('features.update', ['feature' => $feature2->id]), [
            'name' => $feature3->name,
            'key_id' => null
        ]);

        $response->assertStatus(422)
            ->assertExactJson([
                'message' => 'The given data was invalid.',
                'errors' => [
                    'name' => [trans('validation.unique', ['attribute' => trans('validation.attributes.name')])]
                ]
            ]);


        $response = $this->json('PUT', route('features.update', ['feature' => $feature2->id]), [
            'name' => $feature1->name,
            'key_id' => -1
        ]);

        $response->assertStatus(422)
            ->assertExactJson([
                'message' => 'The given data was invalid.',
                'errors' => [
                    'key_id' => [trans('validation.min.numeric', ['attribute' => 'key id', 'min' => 1])]
                ]
            ]);


        $response = $this->json('PUT', route('features.update', ['feature' => $feature2->id]), [
            'name' => $feature1->name,
            'key_id' => 'string'
        ]);

        $response->assertStatus(422)
            ->assertExactJson([
                'message' => 'The given data was invalid.',
                'errors' => [
                    'key_id' => [trans('validation.integer', ['attribute' => 'key id'])]
                ]
            ]);

        $response = $this->json('PUT', route('features.update', ['feature' => $feature2->id]), [
            'name' => $feature2->name,
            'key_id' => null
        ]);

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function will_fail_with_a_404_if_feature_we_want_to_update_not_found()
    {
        $response = $this->put(route('features.update', ['feature' => -1]));

        $response->assertStatus(404);
    }

    /**
     * @test
     */
    public function update_a_feature()
    {
        $feature = factory(Feature::class)->create();
        $feature->name = $feature->name . '_updated';

        $response = $this->json('PUT', route('features.update', ['feature' => $feature->id]), $feature->toArray());

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'id', 'name', 'slug', 'key_id'
        ]);
        $response->assertJson([
            'name' => $feature->name,
            'slug' => str_slug($feature->name),
            'key_id' => $feature->key_id
        ]);
    }

    /**
     * @test
     */
    public function will_fail_with_a_404_if_feature_we_want_to_delete_not_found()
    {
        $response = $this->json('DELETE', route('features.destroy', ['feature' => -1]));

        $response->assertStatus(404);
    }

    /**
     * @test
     */
    public function delete_a_feature()
    {
        $feature = factory(Feature::class)->create();

        $response = $this->delete(route('features.destroy', ['feature' => $feature->id]));

        $response->assertStatus(204)
            ->assertSee(null);

        $this->assertDatabaseMissing($this->table, $feature->toArray());
    }
}

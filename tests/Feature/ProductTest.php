<?php

namespace Tests\Feature;

use Faker\Factory as Faker;
use App\Product;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    private $table  = 'products';

    /**
     * data provider
     */
    public function productProvider()
    {

        $product = function() {
            $faker = Faker::create();

            return [
                        'category_id' => null,
                        'gallery_id' => null,
                        'name' => $faker->name,
                        'intro' => $faker->sentence,
                        'description' => $faker->text,
                        'purchase_price' => (string) $faker->numberBetween(1000, 90000),
                        'price' => (string) $faker->numberBetween(1000, 9000000),
                        'special_price' => (string) $faker->numberBetween(1000, 9000),
                        'major_price' => (string) $faker->numberBetween(1000, 9000),
                        'no' => $faker->randomNumber(),
                        'major_no' => $faker->randomNumber(2),
                        'features' => [
                            'color' => $faker->colorName,
                            'material' => $faker->firstName
                        ],
                        'location' => $faker->city,
                        'pics' => [
                            UploadedFile::fake()->image('image1.jpg'),
                            UploadedFile::fake()->image('image2.jpg'),
                        ],
                        'max_purchase_per_rate' => 10,
            ];
        };

        return [
            [$product(), $product()]
        ];
    }


    /**
     * @test
     * @dataProvider productProvider
     */
    public function get_all_products($product1 , $product2)
    {
       Product::create($product1);
       Product::create($product2);

        $response = $this->json('GET', route('products.index'));

        $response->assertStatus(200);
        $response->assertJsonStructure([
            '*' => [
                'id',
                'category_id',
                'gallery_id',
                'code',
                'name',
                'intro',
                'description',
                'purchase_price',
                'price',
                'special_price',
                'major_price',
                'no',
                'major_no',
                'features',
                'location',
                'rate',
                'max_purchase_per_rate',
                'pics'
            ]
        ]);
    }

    /**
     * @test
     * @dataProvider productProvider
     */
    public function store_a_product($product)
    {

        $response = $this->json('POST', route('products.store'), $product);

        $product['pics'] = json_decode($response->content())->pics;

        $response->assertStatus(201);
        $response->assertJsonStructure([
            'id', 
            'category_id',
            'gallery_id',
            'code',
            'name',
            'intro',
            'description',
            'purchase_price',
            'price',
            'special_price',
            'major_price',
            'no',
            'major_no',
            'features',
            'location',
            'rate',
            'max_purchase_per_rate',
            'pics'
        ]);
        $response->assertJson([
            'category_id' => $product['category_id'],
            'gallery_id' => $product['gallery_id'],
            'name' => $product['name'],
            'intro' => $product['intro'],
            'description' => $product['description'],
            'purchase_price' => $product['purchase_price'],
            'price' => $product['price'],
            'special_price' => $product['special_price'],
            'major_price' => $product['major_price'],
            'no' => $product['no'],
            'major_no' => $product['major_no'],
            'features' => $product['features'],
            'location' => $product['location'],
            'max_purchase_per_rate' => $product['max_purchase_per_rate'],
            'pics' => $product['pics']
        ]);

        foreach ($product['pics'] as $pic){
            $this->assertFileExists(storage_path('app/public/products/').$pic);
        }

        $product['pics'] = json_encode($product['pics']);
        $product['features'] =  json_encode($product['features']);
        $product['rate'] = json_decode($response->content())->rate = 0;
        $product['code'] = json_decode($response->content())->code;

        $this->assertDatabaseHas($this->table, $product);
    }

    /**
     * @test
     * @dataProvider productProvider
     */
    public function update_a_product($oldProduct, $updatedProduct)
    {

        $oldProduct = Product::create($oldProduct);

        // Delete first image
        $deletePics = [
            $oldProduct->pics[0]
        ];
        $updatedProduct['pics'] = array_merge($updatedProduct['pics'], $deletePics);

        $response = $this->json('PUT', route('products.update', ['category' => $oldProduct->id]), $updatedProduct);

        $updatedProduct['pics'] = json_decode($response->content())->pics;


        $response->assertStatus(200);
        $response->assertJsonStructure([
            'id',
            'category_id',
            'gallery_id',
            'code',
            'name',
            'intro',
            'description',
            'purchase_price',
            'price',
            'special_price',
            'major_price',
            'no',
            'major_no',
            'features',
            'location',
            'rate',
            'max_purchase_per_rate',
            'pics'
        ]);
        $response->assertJson([
            'category_id' => $updatedProduct['category_id'],
            'gallery_id' => $updatedProduct['gallery_id'],
            'name' => $updatedProduct['name'],
            'intro' => $updatedProduct['intro'],
            'description' => $updatedProduct['description'],
            'purchase_price' => $updatedProduct['purchase_price'],
            'price' => $updatedProduct['price'],
            'special_price' => $updatedProduct['special_price'],
            'major_price' => $updatedProduct['major_price'],
            'no' => $updatedProduct['no'],
            'major_no' => $updatedProduct['major_no'],
            'features' => $updatedProduct['features'],
            'location' => $updatedProduct['location'],
            'max_purchase_per_rate' => $updatedProduct['max_purchase_per_rate'],
            'pics' => $updatedProduct['pics']
        ]);

        foreach ($updatedProduct['pics'] as $pic){
            $this->assertFileExists(storage_path('app/public/products/').$pic);
        }
        foreach ($deletePics as $pic){
            $this->assertFileNotExists(storage_path('app/public/products/').$pic);

        }

        $updatedProduct['pics'] = json_encode($updatedProduct['pics']);
        $updatedProduct['features'] =  json_encode($updatedProduct['features']);
        $updatedProduct['rate'] = json_decode($response->content())->rate = 0;
        $updatedProduct['code'] = json_decode($response->content())->code;

        $this->assertDatabaseHas($this->table, $updatedProduct);
    }

    /**
     * @test
     * @dataProvider productProvider
     */
    public function delete_a_product($product)
    {
        $product = Product::create($product);

        $response = $this->delete(route('products.destroy', ['product' => $product->id]));

        $response->assertStatus(204)
            ->assertSee(null);


        foreach ($product->pics as $pic){
            $this->assertFileNotExists(storage_path('app/public/products/').$pic);
        }


        $product->pics = json_encode($product['pics']);
        $product->features =  json_encode($product['features']);

        $this->assertDatabaseMissing($this->table, $product->toArray());
    }


}

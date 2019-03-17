<?php

namespace Tests\Unit;

use App\Category;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;


class categoryTest extends TestCase
{
    use RefreshDatabase;


    /**
     * @test
     */
    public function has_children_test()
    {
        $category1 = factory(Category::class)->create();
        $category2 = factory(Category::class)->make();
        $category2->parent_id = $category1->id;
        $category2->save();

        $this->assertTrue($category1->hasChildren());

    }

    /**
     * @test
     */
    public function has_parent_test()
    {
        $category1 = factory(Category::class)->create();
        $category2 = factory(Category::class)->make();
        $category2->parent_id = $category1->id;
        $category2->save();

        $this->assertTrue($category2->hasParent());

    }


}

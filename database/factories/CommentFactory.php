<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Blog;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'blog_id'=>Blog::factory(),
            'name'=>$this->faker->name,
            'body'=>$this->faker->realText(100),
            'created_at'=> $this->faker->dateTimeBetween('-10days', '0days')
        ];
    }
}

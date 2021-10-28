<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'types' =>  $this->faker->randomElement(['CURSOS', 'REVISAO_TRABALHO', 'SEGUNDA_CHAMADA']),
            'description' => $this->faker->text(),
            'price_anchor' => $this->faker->randomNumber(2),
            'price_promotional'=> $this->faker->randomNumber(2)
        ];
    }
}

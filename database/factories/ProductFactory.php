<?php

namespace Database\Factories;

use App\Models\product;
use Illuminate\Database\Eloquent\Factories\Factory;

class productFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $userid = rand(1,30);
        $name = $this->faker->sentence();
        $price  = rand(500000,7000000);
        $discount = rand(0,100000);
        return [
            'user_id'=>$userid,
            'codeProduct'=>$this->RandomString(),
            'name'=>$name,
            'slug'=>str_slug($name),
            'thumbnail'=>$this->faker->imageUrl(),
            'price'=>$price,
            'discount'=>$discount,

        ];
    }
    public function RandomString()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 6; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}

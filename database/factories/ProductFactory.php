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
        $userid = rand(1,20);
        $name = $this->faker->sentence();
        $price  = rand(500000,7000000);
        $discount = rand(0,100000);
        $nation = ['Việt Nam','America','Japan','China'];
        $view = rand(0,1000);
        $bought = rand(0,1000);
        $enum = ['0','1'];

        return [
            'user_id'=>$userid,
            'codeProduct'=>$this->RandomString(),
            'name'=>$name,
            'slug'=>str_slug($name),
            'thumbnail'=>$this->faker->imageUrl(),
            'price'=>$price,
            'discount'=>$discount,
            'nation'=> $nation[array_rand($nation,1)],
            'description'=>$this->faker->paragraph($maxNbChars = 50),
            'view'=> $view,
            'bought'=> $bought,
            'language_id'=> rand(1,2),
            'is_published'=> $enum[rand(0,1)],
            'especially'=> $enum[rand(0,1)],
            'created_at' => now(),
            'updated_at' => now(),
            
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

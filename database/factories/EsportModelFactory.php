<?php

namespace Database\Factories;

use App\Models\EsportModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EsportModel>
 */
class EsportModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name_team'     =>$this -> faker -> name(),
            'country_team'  =>$this -> faker -> country(),
            'totalPoint_team'    =>$this -> faker -> numberBetween(0,11),
        ];
    }
}

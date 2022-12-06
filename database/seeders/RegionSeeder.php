<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $regions = [
            ['region_name' => 'Ahafo', 'zipcode' => '00233','country_id' => 84],
            ['region_name' => 'Ashanti', 'zipcode' => '00233', 'country_id' => 84],
            ['region_name' => 'Bono', 'zipcode' => '00233', 'country_id' => 84],
            ['region_name' => 'Bono East', 'zipcode' => '00233', 'country_id' => 84],
            ['region_name' => 'Central', 'zipcode' => '00233', 'country_id' => 84],
            ['region_name' => 'Eastern', 'zipcode' => '00233', 'country_id' => 84],
            ['region_name' => 'Greater Accra', 'zipcode' => '00233', 'country_id' => 84],
            ['region_name' => 'North East', 'zipcode' => '00233', 'country_id' => 84],
            ['region_name' => 'Northern', 'zipcode' => '00233', 'country_id' => 84],
            ['region_name' => 'Oti', 'zipcode' => '00233', 'country_id' => 84],
            ['region_name' => 'Savannah', 'zipcode' => '00233', 'country_id' => 84],
            ['region_name' => 'Upper East', 'zipcode' => '00233', 'country_id' => 84],
            ['region_name' => 'Upper West', 'zipcode' => '00233', 'country_id' => 84],
            ['region_name' => 'Volta', 'zipcode' => '00233', 'country_id' => 84],
            ['region_name' => 'Western', 'zipcode' => '00233', 'country_id' => 84],
            ['region_name' => 'Western North', 'zipcode' => '00233', 'country_id' => 84],

            ['region_name' => 'Abia', 'zipcode' => '00234', 'country_id' => 162],
            ['region_name' => 'Adamawa', 'zipcode' => '00234', 'country_id' => 162],
            ['region_name' => 'Akwa Ibom', 'zipcode' => '00234', 'country_id' => 162],
            ['region_name' => 'Anambra', 'zipcode' => '00234', 'country_id' => 162],
            ['region_name' => 'Bauchi', 'zipcode' => '00234', 'country_id' => 162],
            ['region_name' => 'Bayelsa', 'zipcode' => '00234', 'country_id' => 162],
            ['region_name' => 'Benue', 'zipcode' => '00234', 'country_id' => 162],
            ['region_name' => 'Borno', 'zipcode' => '00234', 'country_id' => 162],
            ['region_name' => 'Cross River', 'zipcode' => '00234', 'country_id' => 162],
            ['region_name' => 'Delta', 'zipcode' => '00234', 'country_id' => 162],
            ['region_name' => 'Ebonyi', 'zipcode' => '00234', 'country_id' => 162],
            ['region_name' => 'Edo', 'zipcode' => '00234', 'country_id' => 162],
            ['region_name' => 'Ekiti', 'zipcode' => '00234', 'country_id' => 162],
            ['region_name' => 'Enugu', 'zipcode' => '00234', 'country_id' => 162],
            ['region_name' => 'Gombe', 'zipcode' => '00234', 'country_id' => 162],
            ['region_name' => 'Imo', 'zipcode' => '00234', 'country_id' => 162],
            ['region_name' => 'Jigawa', 'zipcode' => '00234', 'country_id' => 162],
            ['region_name' => 'Kaduna', 'zipcode' => '00234', 'country_id' => 162],
            ['region_name' => 'Kano', 'zipcode' => '00234', 'country_id' => 162],
            ['region_name' => 'Katsina', 'zipcode' => '00234', 'country_id' => 162],
            ['region_name' => 'Kebbi', 'zipcode' => '00234', 'country_id' => 162],
            ['region_name' => 'Kogi', 'zipcode' => '00234', 'country_id' => 162],
            ['region_name' => 'Kwara', 'zipcode' => '00234', 'country_id' => 162],
            ['region_name' => 'Lagos', 'zipcode' => '00234', 'country_id' => 162],
            ['region_name' => 'Nasarawa', 'zipcode' => '00234', 'country_id' => 162],
            ['region_name' => 'Niger', 'zipcode' => '00234', 'country_id' => 162],
            ['region_name' => 'Ogun', 'zipcode' => '00234', 'country_id' => 162],
            ['region_name' => 'Ondo', 'zipcode' => '00234', 'country_id' => 162],
            ['region_name' => 'Osun', 'zipcode' => '00234', 'country_id' => 162],
            ['region_name' => 'Oyo', 'zipcode' => '00234', 'country_id' => 162],
            ['region_name' => 'Plateau', 'zipcode' => '00234', 'country_id' => 162],
            ['region_name' => 'Rivers', 'zipcode' => '00234', 'country_id' => 162],
            ['region_name' => 'Sokoto', 'zipcode' => '00234', 'country_id' => 162],
            ['region_name' => 'Taraba', 'zipcode' => '00234', 'country_id' => 162],
            ['region_name' => 'Yobe', 'zipcode' => '00234', 'country_id' => 162],
            ['region_name' => 'Zamfara', 'zipcode' => '00234', 'country_id' => 162],
        ];

        foreach ($regions as $region) {
            Region::create($region);
        }
    }
}

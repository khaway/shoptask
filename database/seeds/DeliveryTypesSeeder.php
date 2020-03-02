<?php

use App\Models\DeliveryType;
use Illuminate\Database\Seeder;

class DeliveryTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->deliveryTypes() as $deliveryType) {
            DeliveryType::create($deliveryType);
        }
    }

    /**
     * @return array
     */
    public function deliveryTypes(): array
    {
        return [
            ['name' => 'Pickup'],
            ['name' => 'Free'],
            ['name' => 'Paid delivery']
        ];
    }
}

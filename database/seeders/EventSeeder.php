<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Event;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events = [
            [
                'title' => 'Brancion',
                'date_start' => Carbon::create(2020, 1, 30, 18, 00, 00),
                'date_end' => Carbon::create(2020, 1, 30, 19, 00, 00),
                'address_street' => '1 rue de la Paix',
                'address_name' => 'Insérer ici le nom de l\'adresse',
                'address_city' => 'Paris',
                'address_zipcode'=> '75015',
                'latitude' => 48.832009,
                'longitude' => 2.303149,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus elementum condimentum ante, porttitor hendrerit lorem. Nam vehicula a libero et blandit. Phasellus mollis ex id porta rutrum. Integer ullamcorper urna a tincidunt finibus. Mauris accumsan massa urna, non feugiat erat auctor sit amet. Aenean at ligula sit amet dui semper eleifend vel pretium leo. Ut nec ante hendrerit, tristique mauris id, laoreet augue. Aliquam aliquet bibendum enim, in volutpat risus gravida at. Curabitur vitae fermentum mauris. ',
                'lead_text' => 'Suspendisse a scelerisque libero. Aliquam cursus nulla turpis, vel lobortis nibh ultricies eu.'
            ],
            [
                'title' => 'Varenne',
                'date_start' => Carbon::create(2020, 1, 31, 23, 30, 00),
                'date_end' => Carbon::create(2020, 2, 1, 6, 00, 00),
                'address_street' => '2 rue de la Paix',
                'address_name' => 'Insérer ici le nom de l\'adresse',
                'address_city' => 'Paris',
                'address_zipcode'=> '75007',
                'latitude' => 48.85664, 
                'longitude' => 2.314891, 
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus elementum condimentum ante, porttitor hendrerit lorem. Nam vehicula a libero et blandit. Phasellus mollis ex id porta rutrum. Integer ullamcorper urna a tincidunt finibus. Mauris accumsan massa urna, non feugiat erat auctor sit amet. Aenean at ligula sit amet dui semper eleifend vel pretium leo. Ut nec ante hendrerit, tristique mauris id, laoreet augue. Aliquam aliquet bibendum enim, in volutpat risus gravida at. Curabitur vitae fermentum mauris. ',
                'lead_text' => 'Suspendisse a scelerisque libero. Aliquam cursus nulla turpis, vel lobortis nibh ultricies eu.'
            ],
            [
                'title' => 'Montmartre',
                'date_start' => Carbon::create(2020, 2, 15, 20, 00, 00),
                'date_end' => Carbon::create(2020, 2, 15, 21, 00, 00),
                'address_street' => '3 rue de la Paix',
                'address_name' => 'Insérer ici le nom de l\'adresse',
                'address_city' => 'Paris',
                'address_zipcode'=> '75008',
                'latitude' => 48.886759,
                'longitude' => 2.343001,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus elementum condimentum ante, porttitor hendrerit lorem. Nam vehicula a libero et blandit. Phasellus mollis ex id porta rutrum. Integer ullamcorper urna a tincidunt finibus. Mauris accumsan massa urna, non feugiat erat auctor sit amet. Aenean at ligula sit amet dui semper eleifend vel pretium leo. Ut nec ante hendrerit, tristique mauris id, laoreet augue. Aliquam aliquet bibendum enim, in volutpat risus gravida at. Curabitur vitae fermentum mauris. ',
                'lead_text' => 'Suspendisse a scelerisque libero. Aliquam cursus nulla turpis, vel lobortis nibh ultricies eu.'
            ],
            [
                'title' => 'Chatelet',
                'date_start' => Carbon::create(2020, 2, 7, 10, 00, 00),
                'date_end' => Carbon::create(2020, 2, 7, 11, 30, 00),
                'address_street' => '4 rue de la Paix',
                'address_name' => 'Insérer ici le nom de l\'adresse',
                'address_city' => 'Paris',
                'address_zipcode'=> '75007',
                'latitude' => 48.861997,
                'longitude' => 2.347609,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus elementum condimentum ante, porttitor hendrerit lorem. Nam vehicula a libero et blandit. Phasellus mollis ex id porta rutrum. Integer ullamcorper urna a tincidunt finibus. Mauris accumsan massa urna, non feugiat erat auctor sit amet. Aenean at ligula sit amet dui semper eleifend vel pretium leo. Ut nec ante hendrerit, tristique mauris id, laoreet augue. Aliquam aliquet bibendum enim, in volutpat risus gravida at. Curabitur vitae fermentum mauris. ',
                'lead_text' => 'Suspendisse a scelerisque libero. Aliquam cursus nulla turpis, vel lobortis nibh ultricies eu.'
            ],
            [
                'title' => 'La Défense',
                'date_start' => Carbon::create(2020, 2, 17, 14, 00, 00),
                'date_end' => Carbon::create(2020, 2, 17, 15, 00, 00),
                'address_street' => '5 rue de la Paix',
                'address_name' => 'Insérer ici le nom de l\'adresse',
                'address_city' => 'Paris',
                'address_zipcode'=> '75005',
                'latitude' => 48.890558,
                'longitude' => 2.241611,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus elementum condimentum ante, porttitor hendrerit lorem. Nam vehicula a libero et blandit. Phasellus mollis ex id porta rutrum. Integer ullamcorper urna a tincidunt finibus. Mauris accumsan massa urna, non feugiat erat auctor sit amet. Aenean at ligula sit amet dui semper eleifend vel pretium leo. Ut nec ante hendrerit, tristique mauris id, laoreet augue. Aliquam aliquet bibendum enim, in volutpat risus gravida at. Curabitur vitae fermentum mauris. ',
                'lead_text' => 'Suspendisse a scelerisque libero. Aliquam cursus nulla turpis, vel lobortis nibh ultricies eu.'
            ],
            [
                'title' => 'Bercy',
                'date_start' => Carbon::create(2020, 2, 28, 18, 00, 00),
                'date_end' => Carbon::create(2020, 2, 28, 19, 00, 00),
                'address_street' => '6 rue de la Paix',
                'address_name' => 'Insérer ici le nom de l\'adresse',
                'address_city' => 'Paris',
                'address_zipcode'=> '75001',
                'latitude' => 48.836836,
                'longitude' => 2.382062,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus elementum condimentum ante, porttitor hendrerit lorem. Nam vehicula a libero et blandit. Phasellus mollis ex id porta rutrum. Integer ullamcorper urna a tincidunt finibus. Mauris accumsan massa urna, non feugiat erat auctor sit amet. Aenean at ligula sit amet dui semper eleifend vel pretium leo. Ut nec ante hendrerit, tristique mauris id, laoreet augue. Aliquam aliquet bibendum enim, in volutpat risus gravida at. Curabitur vitae fermentum mauris. ',
                'lead_text' => 'Suspendisse a scelerisque libero. Aliquam cursus nulla turpis, vel lobortis nibh ultricies eu.'
            ],
        ];

        foreach ($events as $event) {
            Event::create($event);
        }
    }
}

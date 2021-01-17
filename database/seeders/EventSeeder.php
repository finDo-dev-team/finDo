<?php

namespace Database\Seeders;

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
                'date' => '2021-01-20',
                'location' => '1 rue de la Paix',
                'latitude' => 48.832009,
                'longitude' => 2.303149,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus elementum condimentum ante, porttitor hendrerit lorem. Nam vehicula a libero et blandit. Phasellus mollis ex id porta rutrum. Integer ullamcorper urna a tincidunt finibus. Mauris accumsan massa urna, non feugiat erat auctor sit amet. Aenean at ligula sit amet dui semper eleifend vel pretium leo. Ut nec ante hendrerit, tristique mauris id, laoreet augue. Aliquam aliquet bibendum enim, in volutpat risus gravida at. Curabitur vitae fermentum mauris. ',
                'detailled_description' => 'Suspendisse a scelerisque libero. Aliquam cursus nulla turpis, vel lobortis nibh ultricies eu. Proin nec dignissim odio. Curabitur orci turpis, malesuada et lorem tempus, dignissim interdum nibh. Suspendisse et felis erat. Morbi magna sapien, faucibus eget urna a, interdum bibendum neque. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Quisque a elementum turpis. Donec elementum ipsum et nisi pulvinar, quis pulvinar arcu interdum. Suspendisse ac facilisis risus. Mauris eget nisi at lorem accumsan aliquet. Praesent lacinia massa sit amet placerat tincidunt. Vivamus vulputate egestas leo at gravida. Nunc feugiat lobortis convallis. Phasellus ut ex congue, placerat nulla eu, ultricies est.'
            ],
            [
                'title' => 'Varenne',
                'date' => '2021-01-21',
                'location' => '2 rue de la Paix',
                'latitude' => 48.85664, 
                'longitude' => 2.314891, 
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus elementum condimentum ante, porttitor hendrerit lorem. Nam vehicula a libero et blandit. Phasellus mollis ex id porta rutrum. Integer ullamcorper urna a tincidunt finibus. Mauris accumsan massa urna, non feugiat erat auctor sit amet. Aenean at ligula sit amet dui semper eleifend vel pretium leo. Ut nec ante hendrerit, tristique mauris id, laoreet augue. Aliquam aliquet bibendum enim, in volutpat risus gravida at. Curabitur vitae fermentum mauris. ',
                'detailled_description' => 'Suspendisse a scelerisque libero. Aliquam cursus nulla turpis, vel lobortis nibh ultricies eu. Proin nec dignissim odio. Curabitur orci turpis, malesuada et lorem tempus, dignissim interdum nibh. Suspendisse et felis erat. Morbi magna sapien, faucibus eget urna a, interdum bibendum neque. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Quisque a elementum turpis. Donec elementum ipsum et nisi pulvinar, quis pulvinar arcu interdum. Suspendisse ac facilisis risus. Mauris eget nisi at lorem accumsan aliquet. Praesent lacinia massa sit amet placerat tincidunt. Vivamus vulputate egestas leo at gravida. Nunc feugiat lobortis convallis. Phasellus ut ex congue, placerat nulla eu, ultricies est.'
            ],
            [
                'title' => 'Montmartre',
                'date' => '2021-01-22',
                'location' => '3 rue de la Paix',
                'latitude' => 48.886759,
                'longitude' => 2.343001,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus elementum condimentum ante, porttitor hendrerit lorem. Nam vehicula a libero et blandit. Phasellus mollis ex id porta rutrum. Integer ullamcorper urna a tincidunt finibus. Mauris accumsan massa urna, non feugiat erat auctor sit amet. Aenean at ligula sit amet dui semper eleifend vel pretium leo. Ut nec ante hendrerit, tristique mauris id, laoreet augue. Aliquam aliquet bibendum enim, in volutpat risus gravida at. Curabitur vitae fermentum mauris. ',
                'detailled_description' => 'Suspendisse a scelerisque libero. Aliquam cursus nulla turpis, vel lobortis nibh ultricies eu. Proin nec dignissim odio. Curabitur orci turpis, malesuada et lorem tempus, dignissim interdum nibh. Suspendisse et felis erat. Morbi magna sapien, faucibus eget urna a, interdum bibendum neque. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Quisque a elementum turpis. Donec elementum ipsum et nisi pulvinar, quis pulvinar arcu interdum. Suspendisse ac facilisis risus. Mauris eget nisi at lorem accumsan aliquet. Praesent lacinia massa sit amet placerat tincidunt. Vivamus vulputate egestas leo at gravida. Nunc feugiat lobortis convallis. Phasellus ut ex congue, placerat nulla eu, ultricies est.'
            ],
            [
                'title' => 'Chatelet',
                'date' => '2021-01-23',
                'location' => '4 rue de la Paix',
                'latitude' => 48.861997,
                'longitude' => 2.347609,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus elementum condimentum ante, porttitor hendrerit lorem. Nam vehicula a libero et blandit. Phasellus mollis ex id porta rutrum. Integer ullamcorper urna a tincidunt finibus. Mauris accumsan massa urna, non feugiat erat auctor sit amet. Aenean at ligula sit amet dui semper eleifend vel pretium leo. Ut nec ante hendrerit, tristique mauris id, laoreet augue. Aliquam aliquet bibendum enim, in volutpat risus gravida at. Curabitur vitae fermentum mauris. ',
                'detailled_description' => 'Suspendisse a scelerisque libero. Aliquam cursus nulla turpis, vel lobortis nibh ultricies eu. Proin nec dignissim odio. Curabitur orci turpis, malesuada et lorem tempus, dignissim interdum nibh. Suspendisse et felis erat. Morbi magna sapien, faucibus eget urna a, interdum bibendum neque. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Quisque a elementum turpis. Donec elementum ipsum et nisi pulvinar, quis pulvinar arcu interdum. Suspendisse ac facilisis risus. Mauris eget nisi at lorem accumsan aliquet. Praesent lacinia massa sit amet placerat tincidunt. Vivamus vulputate egestas leo at gravida. Nunc feugiat lobortis convallis. Phasellus ut ex congue, placerat nulla eu, ultricies est.'
            ],
            [
                'title' => 'La Défense',
                'date' => '2021-01-24',
                'location' => '5 rue de la Paix',
                'latitude' => 48.890558,
                'longitude' => 2.241611,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus elementum condimentum ante, porttitor hendrerit lorem. Nam vehicula a libero et blandit. Phasellus mollis ex id porta rutrum. Integer ullamcorper urna a tincidunt finibus. Mauris accumsan massa urna, non feugiat erat auctor sit amet. Aenean at ligula sit amet dui semper eleifend vel pretium leo. Ut nec ante hendrerit, tristique mauris id, laoreet augue. Aliquam aliquet bibendum enim, in volutpat risus gravida at. Curabitur vitae fermentum mauris. ',
                'detailled_description' => 'Suspendisse a scelerisque libero. Aliquam cursus nulla turpis, vel lobortis nibh ultricies eu. Proin nec dignissim odio. Curabitur orci turpis, malesuada et lorem tempus, dignissim interdum nibh. Suspendisse et felis erat. Morbi magna sapien, faucibus eget urna a, interdum bibendum neque. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Quisque a elementum turpis. Donec elementum ipsum et nisi pulvinar, quis pulvinar arcu interdum. Suspendisse ac facilisis risus. Mauris eget nisi at lorem accumsan aliquet. Praesent lacinia massa sit amet placerat tincidunt. Vivamus vulputate egestas leo at gravida. Nunc feugiat lobortis convallis. Phasellus ut ex congue, placerat nulla eu, ultricies est.'
            ],
            [
                'title' => 'Bercy',
                'date' => '2021-01-25',
                'location' => '6 rue de la Paix',
                'latitude' => 48.836836,
                'longitude' => 2.382062,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus elementum condimentum ante, porttitor hendrerit lorem. Nam vehicula a libero et blandit. Phasellus mollis ex id porta rutrum. Integer ullamcorper urna a tincidunt finibus. Mauris accumsan massa urna, non feugiat erat auctor sit amet. Aenean at ligula sit amet dui semper eleifend vel pretium leo. Ut nec ante hendrerit, tristique mauris id, laoreet augue. Aliquam aliquet bibendum enim, in volutpat risus gravida at. Curabitur vitae fermentum mauris. ',
                'detailled_description' => 'Suspendisse a scelerisque libero. Aliquam cursus nulla turpis, vel lobortis nibh ultricies eu. Proin nec dignissim odio. Curabitur orci turpis, malesuada et lorem tempus, dignissim interdum nibh. Suspendisse et felis erat. Morbi magna sapien, faucibus eget urna a, interdum bibendum neque. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Quisque a elementum turpis. Donec elementum ipsum et nisi pulvinar, quis pulvinar arcu interdum. Suspendisse ac facilisis risus. Mauris eget nisi at lorem accumsan aliquet. Praesent lacinia massa sit amet placerat tincidunt. Vivamus vulputate egestas leo at gravida. Nunc feugiat lobortis convallis. Phasellus ut ex congue, placerat nulla eu, ultricies est.'
            ],
        ];

        foreach ($events as $event) {
            Event::create($event);
        }
    }
}

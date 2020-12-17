<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Category::insert([

            [
                'title' => 'Mainline Singles, Wave 1',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Mainline Singles, Wave 1.5',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Movie Moments',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Character Packs',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => '2006 Factory Sealed Set',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Playsets',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Mainline Singles, Wave 2',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Mainline Singles, Wave 3',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Movie Doubles',
                'exclusive' => Category::EXCLUSIVES['toysRus'],
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Easter Egg',
                'exclusive' => Category::EXCLUSIVES['target'],
                'description' => null,
                'position' => null
            ],
            [
                'title' => 'Stocking Stuffer',
                'exclusive' => Category::EXCLUSIVES['target'],
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Halloween package',
                'exclusive' => Category::EXCLUSIVES['target'],
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Christmas Ornament Globe',
                'exclusive' => Category::EXCLUSIVES['target'],
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Christmas Bulbs',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Dinoco 400',
                'exclusive' => Category::EXCLUSIVES['target'],
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Walmart 8',
                'exclusive' => Category::EXCLUSIVES['walmart'],
                'description' => null,
                'position' => null
            ],

            [
                'title' => '10-Car Value Pack',
                'exclusive' => Category::EXCLUSIVES['samsClub'],
                'description' => null,
                'position' => null
            ],

            [
                'title' => '3-Car Box Sets',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => '4-Car Box Sets',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => '5-Car Box Sets',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => '6-Car Box Sets',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => '7-Car Box Sets',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Mainline Singles',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Cars Collector\'s Event',
                'exclusive' => Category::EXCLUSIVES['kmart'],
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Cars Collector\'s Event #2',
                'exclusive' => Category::EXCLUSIVES['kmart'],
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Cars Collector\'s Event #3',
                'exclusive' => Category::EXCLUSIVES['kmart'],
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Cars Collector\'s Event #4',
                'exclusive' => Category::EXCLUSIVES['kmart'],
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Cars Collector\'s Event #5',
                'exclusive' => Category::EXCLUSIVES['kmart'],
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Cars Collector\'s Event #6',
                'exclusive' => Category::EXCLUSIVES['kmart'],
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Over-sized',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Short Card',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Holiday Special!',
                'exclusive' => Category::EXCLUSIVES['target'],
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Pit Row Race-Off',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => '3-Car "Gift Packs"',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Race & Chase',
                'exclusive' => Category::EXCLUSIVES['target'],
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Pit Race-Off',
                'exclusive' => Category::EXCLUSIVES['target'],
                'description' => null,
                'position' => null
            ],


            [
                'title' => 'Sidewall Shine',
                'exclusive' => Category::EXCLUSIVES['toysRus'],
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'N2O Cola',
                'exclusive' => Category::EXCLUSIVES['ukFauxWheel'],
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Faux Wheel Drive',
                'exclusive' => Category::EXCLUSIVES['ukFauxWheelPromotion'],
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Short Card "Lenticular Line" Singles',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Check Lane',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => '"Check Lane" lenticular eyes',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Mega Size',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Pit Race-Off',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Lightyear Launchers',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Speedway 4-Packs',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Lenticular "Speedway 4-Packs"',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Haulers',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Piston Cup Racer "Team" Packs',
                'exclusive' => Category::EXCLUSIVES['target'],
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Piston Cup Nights',
                'exclusive' => Category::EXCLUSIVES['target'],
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Piston Cup Racer "Piston Cup Nights" "Team" Packs',
                'exclusive' => Category::EXCLUSIVES['target'],
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Barry Diesel',
                'exclusive' => Category::EXCLUSIVES['target'],
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Motor Speedway of the South',
                'exclusive' => Category::EXCLUSIVES['mattel'],
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Toys "R" Us Gift Packs',
                'exclusive' => Category::EXCLUSIVES['toysRus'],
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Lenticular "3-Car Gift Packs"',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Color Changers',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Gift Packs',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Piston Cup Racer "Piston Cup Nights" "Crew" Packs',
                'exclusive' => Category::EXCLUSIVES['target'],
                'description' => null,
                'position' => null
            ],
//story tellers
            [
                'title' => 'Showstoppers',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Hoodwinked',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Ciao, America!',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Banged Up',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'And Now A Word From Our Sponsor',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Mater Saves Christmas',
                'exclusive' => null,
                'description' => 'These are based on a book that was released in September 2009.',
                'position' => null
            ],

//Disney worlds
            [
                'title' => 'Disneyland and Disney World',
                'exclusive' => Category::EXCLUSIVES['disneyland'],
                'description' => 'These were released in spring 2011',
                'position' => null
            ],

            [
                'title' => 'Cars Land',
                'exclusive' => Category::EXCLUSIVES['carsLand'],
                'description' => 'In 2012, 5 die-casts of characters from Cars Land were released. Than in 2017, 5 more die-casts were released of Luigi\'s cousins',
                'position' => null
            ],
//toons
            [
                'title' => 'Rescue Squad Mater',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'El Materdor',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Mater the Greater',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Tokyo Mater',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Unidentified Flying Mater',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Heavy Metal Mater',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Monster Truck Mater',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Moon Mater',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Air Mater',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Time Travel Mater',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'The Radiator Springs 500½',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],
//cars2
            [
                'title' => 'Deluxe',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Lights & Sounds',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Pit Stop Launchers',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Mater\'s Secret Mission',
                'exclusive' => Category::EXCLUSIVES['walmart'],
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Pit Crew 2-Packs',
                'exclusive' => Category::EXCLUSIVES['kmart'],
                'description' => null,
                'position' => null
            ],

            [
                'title' => '2-Packs',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Character Stars 3-Packs',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Racing 4-Packs',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => '5-Packs',
                'exclusive' => Category::EXCLUSIVES['toysRus'],
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Collect & Connect Puzzles',
                'exclusive' => Category::EXCLUSIVES['toysRus'],
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Cars Collector\'s Event #7',
                'exclusive' => Category::EXCLUSIVES['kmart'],
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Cars Collector\'s Event #8',
                'exclusive' => Category::EXCLUSIVES['kmart'],
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Cars Collector\'s Event #9',
                'exclusive' => Category::EXCLUSIVES['kmart'],
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Cars Collector\'s Event #10',
                'exclusive' => Category::EXCLUSIVES['kmart'],
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Muggsy Liftsome & RS John Lassetire Promotion',
                'exclusive' => Category::EXCLUSIVES['kmart'],
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Convention Exclusive',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Micro Drifters',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

//wgp
            [
                'title' => 'Airport Adventure',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Festival Italiano',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Lemons',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Lightning McQueens',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Maters',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Palace Chaos',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Piston Cup',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Retro Radiator Springs',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Rust-eze Racing',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Super Chase',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Tuners',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Wheel Well Motel',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'World Grand Prix',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => '"Check Lane" Short Card',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Race Day Fan 4-Car Gift Packs',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

//2014
            [
                'title' => 'Allinol Blowout',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Mel Dorado Show',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Paris Tour',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => '95 Pit Crew',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Race Fans',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Radiator Springs',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Racing Sports Network',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Neon Racers',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Promo',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],
//2015

            [
                'title' => 'Dinoco',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Lost And Found',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Tokyo Party',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Ye Left Turn Inn',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

//2016

            [
                'title' => 'Dinoco Daydream',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'LA Speedway',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Sheriff\'s Impound Lot',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Oil Rig Getaway',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => '95 Returns',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'WGP Pit Crew',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Cruisin\' Tokyo',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Paris Parts Market',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Carbon Racers',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Carnival Cup',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Route 66 Road Trip',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => '9-Car Box Sets',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => '10-Car Box Sets',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => '11-Car Box Sets',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => '12-Car Box Sets',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

//2017
            [
                'title' => 'Piston Cup Reporters',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Sarge\'s Boot Camp',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Drive-In',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'WGP Reporters',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => '95 WGP Fans',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'London Chase',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Puzzle',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

//cars3
            [
                'title' => 'Rubber Tires',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Rust-Eze Racing Center',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Next-Gen Piston Cup Racers',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Thunder Hollow',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'The Cotter Pin',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Doc\'s Racing Days',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Florida 500',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Scavenger Hunt',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Fireball Beach Racers',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Thomasville Racing Legends',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Mud Racing',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Drag Racing',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Birthday',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Pit Row Launchers',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

//blue desert

            [
                'title' => 'Ramone\'s Body Shop',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

            [
                'title' => 'Fan Favorites',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],
//161
            [
                'title' => 'Lenticular',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],
            //162

            [
                'title' => 'Silver Metallic Finish',
                'exclusive' => null,
                'description' => null,
                'position' => null
            ],

        ]);
    }
}

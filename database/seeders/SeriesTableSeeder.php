<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SeriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Series::insert([
          [
              'name' => 'Desert Art',
              'reference' => 'desert',
              'line' => 'main',
              'release'=>'2006',
              'finished'=>'2006',
              'description'=>null,
              'position' => 1,
              'parent_id' => null
          ],

          [
              'name' => 'Supercharged',
              'reference' => 'supercharged',
              'line' => 'main',
              'release'=>'2007',
              'finished'=>'2007',
              'description'=>null,
              'position' => 2,
              'parent_id' => null
          ],

          [
              'name' => 'World of Cars',
              'reference' => 'woc',
              'line' => 'main',
              'release'=>'2008',
              'finished'=>'2008',
              'description'=>null,
              'position' => 3,
              'parent_id' => null
          ],

          [
              'name' => 'Race O Rama',
              'reference' => 'ror',
              'line' => 'main',
              'release'=>'2009',
              'finished'=>'2009',
              'description'=>null,
              'position' => 4,
              'parent_id' => null
          ],

          [
              'name' => 'Story Tellers',
              'reference' => 'story_tellers',
              'line' => 'expanded',
              'release'=>'2009',
              'finished'=>'2011',
              'description'=>null,
              'position' => 5,
              'parent_id' => 19
          ],

          [
              'name' => 'Cars Toon',
              'reference' => 'cars_toon',
              'line' => 'expanded',
              'release'=>'2009',
              'finished'=>'2010',
              'description'=>null,
              'position' => 6,
              'parent_id' => 19
          ],

          [
              'name' => 'Final Lap',
              'reference' => 'final_lap',
              'line' => 'main',
              'release'=>'2009',
              'finished'=>'2010',
              'description'=>null,
              'position' => 7,
              'parent_id' => null
          ],

          [
              'name' => 'Radiator Springs Classic',
              'reference' => 'radiator_springs_classic',
              'line' => 'main',
              'release'=>'2012',
              'finished'=>'2012',
              'description'=>null,
              'position' => 8,
              'parent_id' => null
          ],

          [
              'name' => 'Cars 2',
              'reference' => 'cars_2',
              'line' => 'main',
              'release'=>'2011',
              'finished'=>'2012',
              'description'=>null,
              'position' => 9,
              'parent_id' => null
          ],

          [
              'name' => 'World Grand Prize',
              'reference' => 'wgp',
              'line' => 'main',
              'release'=>'2013',
              'finished'=>'2013',
              'description'=>null,
              'position' => 10,
              'parent_id' => null
          ],

          [
              'name' => 'Cars 2014',
              'reference' => 'woc_2014',
              'line' => 'main',
              'release'=>'2014',
              'finished'=>'2014',
              'description'=>null,
              'position' => 11,
              'parent_id' => null
          ],

          [
              'name' => 'Cars 2015',
              'reference' => 'woc_2015',
              'line' => 'main',
              'release'=>'2015',
              'finished'=>'2015',
              'description'=>null,
              'position' => 12,
              'parent_id' => null
          ],

          [
              'name' => 'Precision Series',
              'reference' => 'precision',
              'line' => 'expanded',
              'release'=>'2017',
              'finished'=>'2017',
              'description'=>null,
              'position' => 13,
              'parent_id' => 19
          ],

          [
              'name' => 'Cars 2016',
              'reference' => 'woc_2016',
              'line' => 'main',
              'release'=>'2016',
              'finished'=>'2016',
              'description'=>null,
              'position' => 14,
              'parent_id' => null
          ],

          [
              'name' => 'Cars 2017',
              'reference' => 'woc_2017',
              'line' => 'main',
              'release'=>'2017',
              'finished'=>'2017',
              'description'=>null,
              'position' => 15,
              'parent_id' => null
          ],

          [
              'name' => 'Cars 3',
              'reference' => 'cars_3',
              'line' => 'main',
              'release'=>'2017',
              'finished'=>'2018',
              'description'=>null,
              'position' => 16,
              'parent_id' => null
          ],

          [
              'name' => 'Cars 2018-2019',
              'reference' => 'cars_2018_2017',
              'line' => 'main',
              'release'=>'2018',
              'finished'=>'2019',
              'description'=>null,
              'position' => 17,
              'parent_id' => null
          ],

          [
              'name' => 'Blue Desert Art',
              'reference' => 'blue_desert',
              'line' => 'main',
              'release'=>'2019',
              'finished'=>'2020',
              'description'=>null,
              'position' => 18,
              'parent_id' => null
          ],

          [
              'name' => 'Expanded Universe',
              'reference' => 'expanded_universe',
              'line' => 'expanded',
              'release' => null,
              'finished'=> null,
              'description'=>null,
              'position' => 19,
              'parent_id' => null
          ],

          [
              'name' => 'Disneyland and Cars Land Exclusives',
              'reference' => 'disneyland_carsland',
              'line' => 'expanded',
              'release' => null,
              'finished'=> null,
              'description'=>null,
              'position' => 20,
              'parent_id' => 19
          ],

      ]);
    }
}

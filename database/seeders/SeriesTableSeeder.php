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
              'released'=>2006,
              'finished'=>2006,
              'description'=>'Desert Art',
              'position' => 1,
              'parent_id' => null
          ],

          [
              'name' => 'Supercharged',
              'reference' => 'supercharged',
              'line' => 'main',
              'released'=>2007,
              'finished'=>2007,
              'description'=>'Supercharged',
              'position' => 2,
              'parent_id' => null
          ],

          [
              'name' => 'World of Cars',
              'reference' => 'woc',
              'line' => 'main',
              'released'=>2008,
              'finished'=>2008,
              'description'=>'World of Cars',
              'position' => 3,
              'parent_id' => null
          ],

          [
              'name' => 'Race O Rama',
              'reference' => 'ror',
              'line' => 'main',
              'released'=>2009,
              'finished'=>2009,
              'description'=>'Race O Rama',
              'position' => 4,
              'parent_id' => null
          ],

          [
              'name' => 'Story Tellers',
              'reference' => 'story_tellers',
              'line' => 'expanded',
              'released'=>2009,
              'finished'=>2011,
              'description'=>'Story Tellers',
              'position' => 5,
              'parent_id' => 19
          ],

          [
              'name' => 'Cars Toon',
              'reference' => 'cars_toon',
              'line' => 'expanded',
              'released'=>2009,
              'finished'=>2010,
              'description'=>'Cars Toon',
              'position' => 6,
              'parent_id' => 19
          ],

          [
              'name' => 'Final Lap',
              'reference' => 'final_lap',
              'line' => 'main',
              'released'=>2009,
              'finished'=>2010,
              'description'=>'Final Lap',
              'position' => 7,
              'parent_id' => null
          ],

          [
              'name' => 'Radiator Springs Classic',
              'reference' => 'radiator_springs_classic',
              'line' => 'main',
              'released'=>2012,
              'finished'=>2012,
              'description'=>'Radiator Springs Classic',
              'position' => 8,
              'parent_id' => null
          ],

          [
              'name' => 'Cars 2',
              'reference' => 'cars_2',
              'line' => 'main',
              'released'=>2011,
              'finished'=>2012,
              'description'=>'Cars 2',
              'position' => 9,
              'parent_id' => null
          ],

          [
              'name' => 'World Grand Prize',
              'reference' => 'wgp',
              'line' => 'main',
              'released'=>2013,
              'finished'=>2013,
              'description'=>'World Grand Prize',
              'position' => 10,
              'parent_id' => null
          ],

          [
              'name' => 'Cars 2014',
              'reference' => 'woc_2014',
              'line' => 'main',
              'released'=>2014,
              'finished'=>2014,
              'description'=>'Cars 2014',
              'position' => 11,
              'parent_id' => null
          ],

          [
              'name' => 'Cars 2015',
              'reference' => 'woc_2015',
              'line' => 'main',
              'released'=>2015,
              'finished'=>2015,
              'description'=>'Cars 2015',
              'position' => 12,
              'parent_id' => null
          ],

          [
              'name' => 'Precision Series',
              'reference' => 'precision',
              'line' => 'expanded',
              'released'=>2017,
              'finished'=>2017,
              'description'=>'Precision Series',
              'position' => 13,
              'parent_id' => 19
          ],

          [
              'name' => 'Cars 2016',
              'reference' => 'woc_2016',
              'line' => 'main',
              'released'=>2016,
              'finished'=>2016,
              'description'=>'Cars 2016',
              'position' => 14,
              'parent_id' => null
          ],

          [
              'name' => 'Cars 2017',
              'reference' => 'woc_2017',
              'line' => 'main',
              'released'=>2017,
              'finished'=>2017,
              'description'=> 'Cars 2017',
              'position' => 15,
              'parent_id' => null
          ],

          [
              'name' => 'Cars 3',
              'reference' => 'cars_3',
              'line' => 'main',
              'released'=>2017,
              'finished'=>2018,
              'description'=>'Cars 3',
              'position' => 16,
              'parent_id' => null
          ],

          [
              'name' => 'Cars 2018-2019',
              'reference' => 'cars_2018_2017',
              'line' => 'main',
              'released'=>2018,
              'finished'=>2019,
              'description'=>'Cars 2018-2019',
              'position' => 17,
              'parent_id' => null
          ],

          [
              'name' => 'Blue Desert Art',
              'reference' => 'blue_desert',
              'line' => 'main',
              'released'=>2019,
              'finished'=>2020,
              'description'=>'Blue Desert Art',
              'position' => 18,
              'parent_id' => null
          ],

          [
              'name' => 'Expanded Universe',
              'reference' => 'expanded_universe',
              'line' => 'expanded',
              'released' => null,
              'finished'=> null,
              'description'=>'Expanded Universe',
              'position' => 19,
              'parent_id' => null
          ],

          [
              'name' => 'Disneyland and Cars Land Exclusives',
              'reference' => 'disneyland_carsland',
              'line' => 'expanded',
              'released' => null,
              'finished'=> null,
              'description'=>'Disneyland and Cars Land Exclusives',
              'position' => 20,
              'parent_id' => 19
          ],

      ]);
    }
}

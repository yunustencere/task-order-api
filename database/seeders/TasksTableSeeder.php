<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TasksTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('tasks')->delete();
        
        DB::table('tasks')->insert(array (
            0 => 
            array (
                'id' => '1',
                'title' => 'title 1',
                'type' => 'invoice_ops',
                'country' => NULL,
                'amount' => '{"currency":"$","quantity":100}',
                'prerequisites' => '[]',
                'created_at' => '2021-11-26 18:13:48',
                'updated_at' => '2021-11-26 18:13:48',
            ),
            1 => 
            array (
                'id' => '2',
                'title' => 'title 2',
                'type' => 'common_ops',
                'country' => 'TR',
                'amount' => NULL,
                'prerequisites' => '[]',
                'created_at' => '2021-11-26 18:15:34',
                'updated_at' => '2021-11-26 18:15:34',
            ),
            2 => 
            array (
                'id' => '3',
                'title' => 'title 3',
                'type' => 'common_ops',
                'country' => 'TR',
                'amount' => NULL,
                'prerequisites' => '[1]',
                'created_at' => '2021-11-26 18:15:53',
                'updated_at' => '2021-11-26 18:15:53',
            ),
            3 => 
            array (
                'id' => '4',
                'title' => 'title 4',
                'type' => 'common_ops',
                'country' => 'TR',
                'amount' => NULL,
                'prerequisites' => '[3]',
                'created_at' => '2021-11-26 18:16:01',
                'updated_at' => '2021-11-26 18:16:01',
            ),
            4 => 
            array (
                'id' => '5',
                'title' => 'title 5',
                'type' => 'common_ops',
                'country' => 'TR',
                'amount' => NULL,
                'prerequisites' => '[2]',
                'created_at' => '2021-11-26 18:16:35',
                'updated_at' => '2021-11-26 18:16:35',
            ),
            5 => 
            array (
                'id' => '6',
                'title' => 'title 6',
                'type' => 'common_ops',
                'country' => 'TR',
                'amount' => NULL,
                'prerequisites' => '[1,3]',
                'created_at' => '2021-11-26 18:17:19',
                'updated_at' => '2021-11-26 18:17:19',
            ),
            6 => 
            array (
                'id' => '7',
                'title' => 'title 6',
                'type' => 'custom_ops',
                'country' => 'TR',
                'amount' => NULL,
                'prerequisites' => '[1,3]',
                'created_at' => '2021-11-26 18:19:58',
                'updated_at' => '2021-11-26 18:19:58',
            ),
        ));
        
        
    }
}
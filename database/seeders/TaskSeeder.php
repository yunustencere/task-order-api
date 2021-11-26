<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        DB::table('tasks')->delete();

        DB::table('tasks')->insert(array(
            0 =>
            array(
                "title" => "Task 0",
                "type" => "common_ops",
                // "prerequisites" => json_encode([])
            ),
            1 =>
            array(
                "title" => "Task 1",
                "type" => "common_ops",
                "prerequisites" => json_encode([1]),
                // "prerequisites" => [
                //     "task_0"
                // ]
            ),
            2 =>
            array(
                // "id" => "task_1",
                "title" => "Task 1",
                "type" => "common_ops",
                "prerequisites" => json_encode([2])
                // "prerequisites" => [
                //     "task_0"
                // ]
            ),


            // 2 =>
            // array(
            //     // "id" => "task_2",
            //     "title" => "Task 2",
            //     "type" => "invoice_ops",
            //     // "amount" => {
            //     // "currency" => "€",
            //     // "quantity" => 1200
            //     // },
            //     // "prerequisites" => [
            //     //     "task_0"
            //     // ]

            // ),
            // 3 =>
            // array(
            //     // "id" => "task_3",
            //     "title" => "Task 3",
            //     "type" => "custom_ops",
            //     // "country" => "TR",
            //     // "prerequisites" => [
            //     //     "task_1",
            //     //     "task_2"
            //     // ]
            // )
        ));
    }
}

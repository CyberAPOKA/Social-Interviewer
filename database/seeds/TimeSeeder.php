<?php

use Illuminate\Database\Seeder;

class TimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('configuracoes')->insert(
            [
                [
                    'id' => '1',
                    'inicioInscricao'=> '2022-01-01 20:00:00.000000',
                    'fimInscricao'=> '2050-01-01 20:00:00.000000',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]

            ]
        );
    }
}

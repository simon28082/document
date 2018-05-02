<?php

use Illuminate\Database\Seeder;

class FieldSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $fields = [
            'name' => 'base_model',
            'fields' => [
                [
                    'name' => 'title',
                    'type' => \CrCms\Document\Services\Fields\Input::class,
                    'rules' => ['required', 'min:1'],
                    'tip' => 'Please Input Name',
                    'label' => 'name',
                    'roles' => ['list','update','create','single'],
                    'priority' => 1,
                    'settings' => [],
                ],
                [
                    'name' => 'content',
                    'type' => \CrCms\Document\Services\Fields\Input::class,
                    'rules' => ['required', 'min:1'],
                    'tip' => 'Please Input Name',
                    'label' => 'name',
                    'roles' => ['list','update','create','single'],
                    'priority' => 1,
                    'settings' => [],
                ]
            ],
        ];
    }
}

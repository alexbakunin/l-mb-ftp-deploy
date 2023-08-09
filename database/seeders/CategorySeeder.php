<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $categories =
        [
            'title' => 'Электроника',
            'children' => [
                [
                    'title' => 'Компьютеры',
                    'children' => [
                        [
                            'title' => 'Комплектующие',
                            'children' => [
                                ['title' => 'Процессоры'],
                                ['title' => 'Материнские платы'],
                                ['title' => 'Оперативная память'],
                                ['title' => 'Системы охлаждения'],
                                ['title' => 'Корпуса'],
                                ['title' => 'Блоки питания'],
                            ],
                        ],
                    ],
                ],
                ['title' => 'Моноблоки'],
                [
                    'title' => 'Периферия',
                    'children' => [
                        ['title' => 'Клавиатуры'],
                        ['title' => 'Мыши'],
                    ],
                ],
                [
                    'title' => 'Ноутбуки, Планшеты',
                    'children' => [
                        [
                            'title' => 'Ноутбуки',
                            'children' => [
                                ['title' => 'MacBook'],
                                ['title' => 'Asus'],
                                ['title' => 'HP'],
                                ['title' => 'Honor'],
                                ['title' => 'Acer'],
                            ],
                        ],
                        [
                            'title' => 'Планшеты',
                            'children' => [
                                ['title' => 'iPad'],
                                ['title' => 'Samsung'],
                                ['title' => 'Lenovo'],
                            ],
                        ],
                    ],
                ],

            ],
        ];

        $categories2 =
        [
            'title' => 'Одежда и обувь',
            'children' => [
                [
                    'title' => 'Женщинам',
                    'children' => [
                        ['title' => 'Рубашки'],
                        ['title' => 'Брюки'],
                        ['title' => 'Для спорта'],
                        ['title' => 'Костюмы'],
                        ['title' => 'Обувь'],
                        ['title' => 'Аксессуары'],
                    ],

                ],
                [
                    'title' => 'Мужчинам',
                    'children' => [
                        ['title' => 'Блузки'],
                        ['title' => 'Юбки'],
                        ['title' => 'Для спорта'],
                        ['title' => 'Костюмы'],
                        ['title' => 'Обувь'],
                        ['title' => 'Аксессуары'],
                    ],

                ],
            ],
        ];

        Category::create($categories);
        Category::create($categories2);

    }


}

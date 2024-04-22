<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\Product;


class PostCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     * doi ten
     */
    protected $signature = 'command:auto-create-new-product';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'created product';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Product::insert([
            [
            'name' => 'Samsung',
            'description' => 'lorem',
            'image' => 'https://fakestoreapi.com/img/71li-ujtlUL._AC_UX679_.jpg',
            'price' => 10000,
            'created_at'=>now(),
             ]
            ,
            [
                'name' => 'apple',
                'description' => 'lorem',
                'image' => 'https://fakestoreapi.com/img/71-3HjGNDUL._AC_SY879._SX._UX._SY._UY_.jpg',
                'price' => 20000,
                'created_at'=>now(),
            ],
            [
                'name' => 'xiaomi',
                'description' => 'lorem',
                'image' => 'https://fakestoreapi.com/img/71kWymZ+c+L._AC_SX679_.jpg',
                'price' => 30000,
                'created_at'=>now(),]

        ]);
    }
}
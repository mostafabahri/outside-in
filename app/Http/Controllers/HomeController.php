<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        return view('home', [
            'products' => [
                [
                    'name' => 'Criollo Chocolate', 'unit_price' => '39.45'
                ],
                [
                    'name' => 'Gruyere', 'unit_price' => '48.50'
                ],
                [
                    'name' => 'White Asparguras', 'unit_price' => '29.99'
                ],
                [
                    'name' => 'Anchovoris', 'unit_price' => '19.99'
                ],
                [
                    'name' => 'Arborio Rice', 'unit_price' => '22.75'
                ],
            ]
        ]);
    }
}

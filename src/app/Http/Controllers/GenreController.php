<?php

namespace App\Http\Controllers;
use App\Models\Genre;


use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function list()
{
 $items = Genre::orderBy('genre', 'asc')->get();
 return view(
 'genre.list',
 [
 'title' => 'Grāmatu žanri',
 'items' => $items
 ]
 );
}


}

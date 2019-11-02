<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use TeamTNT\TNTSearch\TNTSearch;
use App\Book;

class SearchController extends Controller {

    //For Web
    function search_book(Request $request, TNTSearch $tnt) {
        if ($request->ajax()) {
            $results = Book::search($request->query_input)->paginate(5)->map(function($s) use ($tnt, $request) {
                $s->title = $tnt->highlight($s->title, $request->query_input, 'em', ['wholeWord' => false]);
                return $s;
            });
            return response()->json(['status' => true, 'results' => $results], 200);
        }
        return view('welcome');
    }

    //For Api
    function search_book_(Request $request) {
        $results = Book::search($request->query_input)->get();
        return response()->json(['status' => true, 'results' => $results], 200);
    }

}

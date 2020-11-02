<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Jobs\ParsingNews;
use App\Models\News;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Orchestra\Parser\Xml\Facade as XMLParser;
use App\Services\XMLParserService;
use Symfony\Component\DomCrawler\Crawler;
use DB;

class ParserController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        //dd($categories);

        if (!isset($categories)) {
            return view('admin.parser', ['categories' => false]);
        } else {
            return view('admin.parser', ['categories' => $categories]);
        }
    }

    public function getParsedNews(XMLParserService $parserService)
    {

        $rssLinks = DB::table('resources')->get();
        //dd($rssLinks);
        foreach ($rssLinks as $link) {
            ParsingNews::dispatch($link->link);
        }

        $categories = Category::all();
        $news = News::all();
        //dd($news);
        if (!isset($categories)) {
            return view('admin.parser', ['categories' => false]);
        } else {
            return view('admin.parser', ['categories' => $categories, 'news'=> $news]);
        }
    }

}

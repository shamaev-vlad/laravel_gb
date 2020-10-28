<?php


namespace App\Services;


use App\Models\Category;
use App\Models\News;
use DB;
use Orchestra\Parser\Xml\Facade as XMLParser;
//use Symfony\Component\DomCrawler\Crawler;

class XMLParserService
{
    public function saveParsedNews($link)
    {
        //dd($link);
        $xml = XMLParser::load($link);

        $data = $xml->parse([
            'category' => ['uses' => 'channel.title'],
            'news' => ['uses' => 'channel.item[title,link,description]']
        ]);
        //dd($data);
        $this->news($data);
    }
    private function news($data) {
        //dd($data);
        $newCategory = $data['category'];

        $category = Category::firstOrCreate([
            'category' => $newCategory,
            'name' => \Str::slug($newCategory),
        ]);



        $news = [];
        foreach ($data['news'] as $item){


            $newsBuffer = News::query()
                ->where('heading', $item['title'])
                ->first();
            if (!$newsBuffer) {
                $news[] = [
                    'heading' => $item['title'],
                    'description' => $item['description'],
                    'category_id' => $category->id,
                    'is_parsed' => true,
                ];
            }
        }
        //dd($news);
        News::query()->insert($news);
    }
}

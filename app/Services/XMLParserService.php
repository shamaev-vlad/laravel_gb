<?php


namespace App\Services;


use App\Models\Category;
use App\Models\News;
use DB;
use Orchestra\Parser\Xml\Facade as XMLParser;

class XMLParserServices
{
    public function saveParsedNews($link)
    {
        //dd($link);
        $xml = XMLParser::load($link);

        $data = $xml->parse([
            'category' => ['uses' => 'channel.title'],
            'link' => ['uses' => 'channel.link'],
            'description' => ['uses' => 'channel.description'],
            'image' => ['uses' => 'channel.image.url'],
            'news' => ['uses' => 'channel.item[guid,title,link,description,category,pubDate,enclosure::url]'],

        ]);

        echo date('c') . ' ' . $link;
        //dd($data);
        $this->news($data);
    }

    private function news($data) {
        //dd($data);
        $newCategory = $data['category'];

        $category = Category::firstOrCreate([
            'title' => $newCategory,
            'slug' => \Str::slug($newCategory),
        ]);



        $news = [];
        foreach ($data['news'] as $item){


            $newsBuffer = News::query()
                ->where('title', $item['title'])
                ->first();
            if (!$newsBuffer) {
                $news[] = [
                    'title' => $item['title'],
                    'text' => $item['description'],
                    'image' => $item['enclosure::url'],
                    'category_id' => $category->id,
                    'is_parsed' => true,
                ];
            }
        }
        //dd($news);
        News::query()->insert($news);
    }
}

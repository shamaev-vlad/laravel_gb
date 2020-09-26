<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    private static $news = [
      ['id' => 1,
            'title' => 'Пожилых москвичей призвали соблюдать ограничения из-за коронавируса',
            'text'  => 'Мэр Москвы Сергей Собянин из-за ситуации с коронавирусом призвал пожилых москвичей
             и людей с хроническими заболеваниями перейти на удаленную работу или взять отпуск.
              Новые правила начнут действовать с 28 сентября.',
            'category' => 'covid'
        ],
        ['id' => 2,
              'title' => 'В Госдуме допустили возвращение школ на «удаленку» из-за COVID-19',
              'text'  => 'Ранее против повторного перевода школ и вузов в РФ на "удаленку" из-за коронавируса
               выступил депутат Госдумы, экс-глава Роспотребнадзора, академик РАН Геннадий Онищенко.
              Об этом он заявил в пятницу "Интерфаксу".',
              'category' => 'covid'
          ],
          ['id' => 3,
                'title' => 'ЕС попросил Украину не воспринимать его как банкомат',
                'text'  => 'Верховный представитель ЕС по иностранным делам и политике безопасности Жозеп Боррель
                 заявил президенту Украины Владимиру Зеленскому, что Евросоюз — не благотворительная организация
                  и не банкомат.
                Об этом говорится в заявлении Борреля на сайте ЕС по итогам его поездки в страну.',
                'category' => 'politics'
            ],
        [
            'id' => 4,
            'title' => 'Генштаб сообщил о военной активности НАТО рядом с границами России',
            'text'  => 'В 20–30 км от границ России НАТО наращивает военную активность. Об этом сообщил начальник Генштаба Вооруженных сил России Валерий Герасимов
             на брифинге с иностранными военными атташе после завершения учений «Кавказ-2020», передает «Интерфакс».',
            'category' => 'politics'
        ],
        [
            'id' => 5,
            'title' => 'Томскпромстройбанк ввел новый вклад',
            'text'  => 'Томскпромстройбанк с 25 сентября ввел вклад «Осенний+».
            Депозит открывается от 50 тыс. рублей на 151 день.
             Процентная ставка составляет 4,65% годовых.',
            'category' => 'business'
        ],
        [
            'id' => 6,
            'title' => 'Около 85 тыс. многодетных получили выплаты на погашение ипотеки',
            'text'  => 'Напомним, программа поддержки семей с детьми заработала осенью прошлого года.
             Денежные средства направляются на погашение задолженности по основному долгу по ипотеке.',
            'category' => 'business'
        ],
        [
            'id' => 7,
            'title' => 'Кабмин предложил устанавливать умные счетчики за счет россиян',
            'text'  => 'Кабмин поручил профильным ведомствам проработать вопрос о включении стоимости установки «умных» счетчиков в коммунальные платежи.
            Соответствующие поручения были даны заместителем председателя правительства Юрием Борисовым.',
            'category' => 'business'
        ],
        [
            'id' => 8,
            'title' => 'На Украине начались продажи автомобилей Lada местной сборки',
            'text'  => '«На официальном сайте Lada на Украине появился прайс-лист на продукцию,
            в котором большая часть автомобилей отмечены, как произведенные на ЗАЗе», — говориться в издании.',
            'category' => 'auto'
        ],
        [
            'id' => 9,
            'title' => 'Volkswagen представил в России обновленный Tiguan',
            'text'  => 'Компания Volkswagen представила обновленный кроссовер Tiguan для российского рынка.
            Модель, которую собирают на заводе в Калуге, появится в автосалонах в четырех комплектациях
             с бензиновыми моторами мощностью от 125 до 220 лошадиных сил – Respect, Status, Exclusive, R-Line.',
            'category' => 'auto'
        ],
    ];
    private static $category = [
        [
            'id' => 1,
            'rubric' => 'covid',
            'text' => 'Коронавирус',
        ],
        [
            'id' => 2,
            'rubric' => 'business',
            'text' => 'Экономика',
        ],
        [
            'id' => 3,
            'rubric' => 'politics',
            'text' => 'Политика',
        ],
        [
            'id' => 4,
            'rubric' => 'auto',
            'text' => 'Авто',
        ],
        [
            'id' => 5,
            'rubric' => 'sport',
            'text' => 'Спорт',
        ],
    ];

    private static $emptyNews = [

            'id' => 0,
            'title' => 'Не найдено!',
            'text'  => '',
            'category' => ''
    ];

    private static $categoryNotFound = 'Рубрика не найдена';

    public static function getNews(){
        return static::$news;
    }

    public static function getCategory(){
        return static::$category;
    }

    public static function getNewsId($id){
        if (!isset(static::getNews()[$id-1])) return static::$emptyNews;
        if (static::getNews()[$id-1]['id'] == $id) {
            return static::getNews()[$id-1];
            } else {
            foreach (static::getNews() as $newsItem) {
                if ($newsItem['id'] == $id) { return $newsItem; }
            }
        }
        return static::$emptyNews;
    }

    public static function getNewsByCategory($cat_id){
        foreach (static::getNews() as $newsItem) {
            if ($newsItem['category'] == $cat_id) {
                 $newsByCategory[] = $newsItem;
            }
        }
        if (isset($newsByCategory)) {
            return $newsByCategory;
        } else {
            $newsByCategory[]=static::$emptyNews;
            return $newsByCategory;
        }

    }

    public static function getCategoryText($cat_id){
        foreach (static::getCategory() as $categoryItem) {
            if ($categoryItem['rubric'] == $cat_id) {
                return $categoryItem['text'];
            }
        }
        return static::$categoryNotFound;
    }

}

<?php

namespace App\Http\Controllers;
use App\Http\Requests;

class SimulationController extends Controller
{
    function f_rand($min=0,$max=1,$mul=1000000){
        if ($min>$max) return false;
        return mt_rand($min*$mul,$max*$mul)/$mul;
    }


    function randomizer($sentence){
        $rand_sentence = '';
        $char_array = str_split($sentence);
        $br_count = 0;
        $br_start = 0;
        foreach ($char_array as $key => $char) {
            switch ($char){
                case '{':
                    if($br_count == 0){
                        $br_start = $key;
                    }
                    $br_count++;
                    break;
                case '}':
                    $br_count--;
                    if($br_count == 0) {
                        $rands = explode(
                            '|',
                            $this->randomizer(
                                implode(
                                    '',
                                    array_slice(
                                        $char_array,
                                        $br_start + 1,
                                        $key - $br_start - 1
                                    )
                                )
                            )
                        );
                        $rand_sentence .= $rands[array_rand($rands)];
                    }
                    break;
                default:
                    if($br_count == 0){
                        $rand_sentence .= $char;
                    }
            }
        }
        return $rand_sentence;
    }

// ================================================================================================================================================
// ================================================================================================================================================

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function rendering()
    {

        $title_string = '{WG-Zimmer|Appartement|Einzimmerwohnung|Single-Wohnung|Shared-Flat} im {Norden|Süden|Westen|Osten} von {Moabit|Marzan|Prenzlauer Berg|Charlottenburg} ab {Oktober|November|Dezember}';
        $dummydata = [
            "title" => $this->randomizer($title_string),
            "description" => "Hey Leute,<br/>wir suchen einen neuen Mitbewohner für unsere WG in Berlin- Moabit ab September!<br/>Das zu vermietende Zimmer ist komplett möbliert, es befindet sich ein Schreibtisch, ein Regal, (vor dem Zimmer ein großer Schrank und Schuhständer), sowie eine Couchecke und ein Hochbett im Zimmer.<br/>Das Zimmer ist klein, aber der Platz ist optimal ausgenutzt.<br/>Es steht außerdem eine große Küche zur Verfügung mit einem Kühlschrank und einer Spülmaschine.<br/>Das Badezimmer ist sehr groß und mit Dusche und Badewanne, sowie mit 2 Waschbecken ausgestattet.<br/>Die WG liegt super zentral und ist perfekt angebunden. Der TXL fährt euch direkt zum Flughafen oder zum Hauptbahnhof, mit der Ringbahn seid ihr in 22 Minuten am Ostkreuz und von U Turmstr. gehts direkt in die Stadt.",
            "longitude" => 10.01002021,
            "latitude" => 10.01002021,
            "price_per_month" => 300 + rand(-100, 200),
            "monthly_fee" => 40,
            "caution" => 500 + rand(-200, 100),
            "city" => "Berlin",
            "zip_code" => "11317",
            "imgs" => [
                "https://img.wg-gesucht.de/media/up/2013/40/e3c7f39341553800_img_5857.large.jpg",
                "https://img.wg-gesucht.de/media/up/2013/40/389e26c841553800_img_5864.large.jpg",
                "https://img.wg-gesucht.de/media/up/2013/40/e7731d7141553800_img_5866.large.jpg",
                "https://img.wg-gesucht.de/media/up/2019/31/e3bbce112500a75069144166ab27b5fef6334c4e6a3de80d61ca975357d1ab39_Yannick_zimmer.large.jpg",
                "https://img.wg-gesucht.de/media/up/2019/31/b620594e8aa0c42a153429d1ac8f917472e4e74b08955f3aa678ec1654a4f9cf_Yannick_zimmer_3.large.jpg",
                "https://img.wg-gesucht.de/media/up/2019/31/f0474f3300f903d66bd86b30f6d4235671dd56126d9e668797c02e8ccbd102c5_Yannick_zimmer_4.large.jpg",
                "https://img.wg-gesucht.de/media/up/2019/23/77891db81c96a87c5e0a66ee59a8c4091bc07f97e89ef4c5aca3a4a1a9d46655_84828320_64CD_41E0_AC05_A435C6A57B05.large.jpeg",
                "https://img.wg-gesucht.de/media/up/2019/23/5c1aa36ca29aab3333732e10155498de147a2fdb4b1155b95a195441f296d96c_8A69FF76_AC01_49C7_9F9B_B54F04DDF172.large.jpeg",
                "https://img.wg-gesucht.de/media/up/2019/23/b2b4e5038352aa6a071780a0d1a3d0916c3327aee1e850138755db58cc2afd2f_C1BDF94A_982B_41BC_8563_BE8C5CBACE0C.large.jpeg",
                "https://img.wg-gesucht.de/media/up/2019/24/6cc99871afe0e6944e2f7124a556bd7de81f1b2754bf780911b6efff10b46f3f_IMG_5617.large.JPG"
            ]
        ];

        $view = view('simulation.rendering', [
            "dummydata" => $dummydata
        ]);
        return $view;
    }


// ================================================================================================================================================
// ================================================================================================================================================

    public function index_data(){
        // UNLIMIT EXECUTION TIME (BECAUSE INDEXING CAN TAKE A WHILE)
        ini_set('max_execution_time', 0);
        // UNLIMIT MEMORY LIMITATIONS
        ini_set("memory_limit", "-1");

        // USING ELASTICSEARCH PHP CLIENT
        // according to documentation:
        //      - https://www.elastic.co/guide/en/elasticsearch/client/php-api/current/index.html
        // ...................................................................................................

        // N = 1
//        $hosts = [
//            "104.248.202.185:9200"
//        ];

        // N = 2
//        $hosts = [
//            "178.128.139.27:9200",
//        ];

        // N = 4
        $hosts = [
            "178.128.139.27:9200",
        ];
        $client = \Elasticsearch\ClientBuilder::create()->setHosts($hosts)->build();
        $index_name = 'inserats';
        $total_amount_of_data = 16000000;
        $bulk_size = 60000;

        // GENERATING RANDOM DATA
        // ...................................................................................................
        $faker = \Faker\Factory::create();
        $top_left_nyc_1_x = 40.537648;
        $top_left_nyc_1_y = -74.590809;
        $bottom_right_nyc_1_x = 40.862482;
        $bottom_right_nyc_1_y = -74.014027;

        $top_left_nyc_2_x = 40.60858;
        $top_left_nyc_2_y = -74.016774;
        $bottom_right_nyc_2_x = 40.955889;
        $bottom_right_nyc_2_y = -73.225758;

        $title_string = '{Nice|Awesome|Light|Fantastic|Psychedalic|Melodramatic} {small|big|medium-sized} {room|flat|appartement} {wants you|ready for you|waiting for you} to move in';

        $tags = ["partly furnished", "full firnished" , "washing machine", "100MB internet", "petnhouse", "pets allowed", "ground floor", "bathtub", "laminate", "central heating", "dishwasher", "good parkingoppotunities", "maisonette", "shower", "basement slot"];
        shuffle($tags);
        $random_tags = array_slice($tags, 0, 8);

        // INDXING IN BULKS
        // according to documentation:
        //      - https://www.elastic.co/guide/en/elasticsearch/guide/master/bulk.html
        // ...................................................................................................
        $params = ['body' => []];
        for ($i = 1; $i <= $total_amount_of_data; $i++) {
            $price_per_month = rand(100, 500);
            $inserat_type = rand(0, 1);

            $area = rand(0, 1);

            if((bool)$area){
                $random_coord_in_nyc_x = $this->f_rand($top_left_nyc_1_x, $bottom_right_nyc_1_x);
                $random_coord_in_nyc_y = $this->f_rand($top_left_nyc_1_y, $bottom_right_nyc_1_y);
            } else {
                $random_coord_in_nyc_x = $this->f_rand($top_left_nyc_2_x, $bottom_right_nyc_2_x);
                $random_coord_in_nyc_y = $this->f_rand($top_left_nyc_2_y, $bottom_right_nyc_2_y);
            }
            $random_title = $this->randomizer($title_string);


            $params['body'][] = [
                'index' => [
                    '_index' => $index_name,
                ]
            ];

            $params['body'][] = [
                "title" => $random_title,
                "description" => $random_title.". ".$random_title,
                "price_per_month" => $price_per_month,
                "tags" => $random_tags,
                "caution" => 3*$price_per_month,
                "city" => "New York",
                "inserat_type" => (bool)$inserat_type,
                "location" => $random_coord_in_nyc_x.",".$random_coord_in_nyc_y,
                "street" => $faker->streetName,
                "zip_code" => "".rand(10001, 10033)
            ];

            // Every 5000 documents stop and send the bulk request
            if ($i % $bulk_size == 0) {
                shuffle($tags);
                $random_tags = array_slice($tags, 0, 8);
                $responses = $client->bulk($params);

                // erase the old bulk request
                $params = ['body' => []];

                // unset the bulk response when you are done to save memory
                unset($responses);
            }
        }

        // Send the last batch if it exists
        if (!empty($params['body'])) {
            $responses = $client->bulk($params);
            dump($responses);
        }
    }

// ================================================================================================================================================
// ================================================================================================================================================

    public function search_data(){
        // UNLIMIT EXECUTION TIME (BECAUSE SEARCH COULD TAKE A WHILE)
        ini_set('max_execution_time', 0);

        // USING ELASTICSEARCH PHP CLIENT
        // according to documentation:
        //      - https://www.elastic.co/guide/en/elasticsearch/client/php-api/current/index.html
        // ...................................................................................................
        $hosts = [
            "178.128.139.27:9200"
        ];
        $client = \Elasticsearch\ClientBuilder::create()->setHosts($hosts)->build();

        $params = [
            'index' => 'inserats',
            'body'  => [
                "from" => 0,
                "size" => 50,
                "query" => [
                    "bool" => [
                        "filter" => [
                            "range" => [
                                "price_per_month" => [
                                    "gte" => 100,
                                    "lte" => 400
                                ]
                            ]
                        ],
                        "must" => [
                            "multi_match" => [
                                "fields" => [
                                    "title",
                                    "description"
                                ],
                                "query" => "Fantastic big appartement"
                            ]
                        ],
                        "filter" => [
                            "geo_bounding_box" => [
                                "location"=> [
                                    "top_left" => [
                                        "lat" => 44,
                                        "lon" => -75
                                    ],
                                    "bottom_right" => [
                                        "lat" => 30,
                                        "lon" => -73
                                    ]
                                ]
                            ]
                        ],
                    ]
                ]
            ]
        ];

        $results = $client->search($params);
        dump($results);
    }

}

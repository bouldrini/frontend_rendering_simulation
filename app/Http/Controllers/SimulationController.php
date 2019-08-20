<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class SimulationController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function rendering()
    {
        $dummydata = [
            "title" => "WG-Zimmer in Mitte/ Moabit ab September",
            "description" => "Hey Leute,<br/>wir suchen einen neuen Mitbewohner für unsere WG in Berlin- Moabit ab September!<br/>Das zu vermietende Zimmer ist komplett möbliert, es befindet sich ein Schreibtisch, ein Regal, (vor dem Zimmer ein großer Schrank und Schuhständer), sowie eine Couchecke und ein Hochbett im Zimmer.<br/>Das Zimmer ist klein, aber der Platz ist optimal ausgenutzt.<br/>Es steht außerdem eine große Küche zur Verfügung mit einem Kühlschrank und einer Spülmaschine.<br/>Das Badezimmer ist sehr groß und mit Dusche und Badewanne, sowie mit 2 Waschbecken ausgestattet.<br/>Die WG liegt super zentral und ist perfekt angebunden. Der TXL fährt euch direkt zum Flughafen oder zum Hauptbahnhof, mit der Ringbahn seid ihr in 22 Minuten am Ostkreuz und von U Turmstr. gehts direkt in die Stadt.",
            "longitude" => 10.01002021,
            "latitude" => 10.01002021,
            "price_per_month" => 300,
            "monthly_fee" => 40,
            "caution" => 500,
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

}

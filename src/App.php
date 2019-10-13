<?php
/**
 * Created by PhpStorm.
 * User: Mikhail
 * Date: 13.10.2019
 * Time: 12:04
 */

namespace App;


class App
{
    public function run()
    {
        $car1 = new Listener();
        $car2 = new Listener();
        $car3 = new Listener();

        $listeners[] = $car1;
        $listeners[] = $car2;
        $listeners[] = $car3;

        $radioStation = new RadioStation();

        /** @var Listener $listener */
        foreach ($listeners as $listener) {
            $radioStation->attach($listener);
        }

        $radioStation->setSong('Алла Пугачева - Приезжай');
        $radioStation->setSong('2pac - California');
        $radioStation->setSong('Notorious B.I.G - Who shot ya');

        $radioStation->detach($car2);

        $radioStation->setSong('Король и Шут - путник');
    }
}
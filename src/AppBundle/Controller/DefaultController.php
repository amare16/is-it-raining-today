<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $url = 'http://api.openweathermap.org/data/2.5/weather?q='.$_GET['q'].'&APPID=b1833859ce7d0c677f8da2b52b2d7200';
        $obj = json_decode(file_get_contents($url), true);

        return $this->render('default/index.html.twig', [
            'wind_speed' => $obj['wind']['speed'],
            // 'temperature': TODO
            // 'humidity': TODO
            // etc..
        ]);
    }
}

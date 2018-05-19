<?php
/**
 * Created by PhpStorm.
 * User: victorlopezsanchez
 * Date: 19/5/18
 * Time: 18:02
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomePageController extends Controller
{

    /**
     * @Route("/", name="home_page")
     * @return Response
     */
    public function initialPage()
    {
        return $this->render('HomePage/home.html.twig', array(
            'number' => 0,
        ));
    }
}
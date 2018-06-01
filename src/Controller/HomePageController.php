<?php
/**
 * Created by PhpStorm.
 * User: victorlopezsanchez
 * Date: 19/5/18
 * Time: 18:02
 */

namespace App\Controller;

use App\Document\Affiliate;
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

        $product = new Affiliate();
        $product->setName('A Foo Bar');
        $product->setDescription('19.99');

        $dm = $this->get('doctrine_mongodb')->getManager();
        $dm->persist($product);
        $dm->flush();


        return $this->render('HomePage/home.html.twig', array(
            'number' => 0,
        ));
    }
}
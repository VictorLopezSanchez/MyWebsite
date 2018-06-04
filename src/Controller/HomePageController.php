<?php
/**
 * Created by PhpStorm.
 * User: victorlopezsanchez
 * Date: 19/5/18
 * Time: 18:02
 */

namespace App\Controller;

use App\Document\Affiliate;
use MarcL\AmazonAPI;
use MarcL\AmazonUrlBuilder;
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
        return new Response(
            '<html><body><h1>Home page</h1><p>rutas posibles: /generator o /admin</p></body></html>'
        );
    }

    /**
     * @Route("/generator", name="generator_page")
     * @return Response
     */
    public function generatorPage()
    {

        $product = new Affiliate();
        $product->setName('A Foo Bar');
        $product->setDescription('19.99');

        $dm = $this->get('doctrine_mongodb')->getManager();
        $dm->persist($product);
        $dm->flush();

        // Keep these safe
        $keyId = 'AKIAJ7UPLLTIB7TQL6YQ';
        $secretKey = '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';
        $associateId = 'todominecra0c-21';

        $urlBuilder = new AmazonUrlBuilder(
            $keyId,
            $secretKey,
            $associateId,
            'es'
        );

        // Setup a new instance of the AmazonAPI and define the type of response
        $amazonAPI = new AmazonAPI($urlBuilder, 'simple');

        $items = $amazonAPI->ItemSearch('javascript', 'Books', 'price');

        return $this->render('HomePage/home.html.twig', array(
            'number' => 0,
            'items' => $items
        ));
    }
}
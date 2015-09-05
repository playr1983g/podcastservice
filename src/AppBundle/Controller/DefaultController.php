<?php

namespace AppBundle\Controller;

use Devpunk\Bundle\PodcastBundle\Scraping\PodcastContext;
use Devpunk\Bundle\PodcastBundle\Scraping\WebScraper;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        $scraper = new WebScraper();

        $podcastContext = new PodcastContext();
        $podcastEntries = $scraper->fetchNewEntries($podcastContext);


        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
            "entries" => $podcastEntries
        ));
    }

    public function fetchAction(Request $request)
    {


    }
}

<?php

namespace Devpunk\Bundle\PodcastBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('DevpunkPodcastBundle:Default:index.html.twig', array('name' => $name));
    }
}

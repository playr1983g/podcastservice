<?php

namespace Devpunk\Bundle\PodcastBundle\Scraping;

use Devpunk\Bundle\PodcastBundle\Podcast\PodcastInterface;

class PodcastContext implements PodcastContextInterface
{

    /**
     * @return PodcastInterface
     */
    public function getPodcast()
    {
        // TODO: Implement getPodcast() method.
    }

    public function getListUrl()
    {
        return "http://www.fsr.de/media/";
    }
}
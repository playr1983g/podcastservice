<?php

namespace Devpunk\Bundle\PodcastBundle\Scraping;

use Devpunk\Bundle\PodcastBundle\Podcast\PodcastInterface;

/**
 * Interface PodcastContextInterface
 */
interface PodcastContextInterface
{
    /**
     * @return PodcastInterface
     */
    public function getPodcast();

    public function getListUrl();
}
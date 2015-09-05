<?php

namespace Devpunk\Bundle\PodcastBundle\Scraping;

use Devpunk\Bundle\PodcastBundle\Podcast\PodcastInterface;

interface ScraperInterface
{
    public function fetchNewEntries(PodcastContextInterface $podcastContext);

}
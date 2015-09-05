<?php

namespace Devpunk\Bundle\PodcastBundle\Podcast;

interface PodcastEntryInterface
{
    public function getTitle();

    public function getPublishedDate();

    public function getUrl();

    public function getLength();

}
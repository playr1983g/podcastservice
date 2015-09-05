<?php

namespace Devpunk\Bundle\PodcastBundle\Podcast;

class PodcastEntry implements PodcastEntryInterface
{
    private $title;

    private $publishedDate;

    private $url;

    private $length;

    function __construct($title, $url, \DateTime $publishedDate, $length = null)
    {
        $this->title = $title;
        $this->publishedDate = $publishedDate;
        $this->url = $url;
        $this->length = $length;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return \DateTime
     */
    public function getPublishedDate()
    {
        return $this->publishedDate;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return integer
     */
    public function getLength()
    {
        return $this->length;
    }
}
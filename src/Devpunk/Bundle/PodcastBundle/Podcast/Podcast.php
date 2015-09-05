<?php

namespace Devpunk\Bundle\PodcastBundle\Podcast;

/**
 * Class Podcast
 *
 */
class Podcast implements PodcastInterface
{
    private $description;

    private $name;

    function __construct($name, $description)
    {
        $this->description = $description;
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }
}
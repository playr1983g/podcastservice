<?php

namespace Devpunk\Bundle\PodcastBundle\Scraping;

use Devpunk\Bundle\PodcastBundle\Podcast\PodcastEntry;
use DOMElement;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

abstract class AbstractWebScraper implements  ScraperInterface
{
    function __construct()
    {
    }

    public function fetchNewEntries(PodcastContextInterface $podcastContext)
    {
        $entries = [];

        // Create a client with a base URI
        $client = new Client(['base_uri' => $podcastContext->getListUrl()]);
        $response = $client->get('');


        $html = (string) $response->getBody();

        $crawler = new Crawler($html);

        /** @var DomElement[] $elements */
        $elements = $crawler->filterXPath("//*[contains(@class, 'row audio_row')]");

        foreach ($elements as $domElement) {
            /** @var DomElement[] $links */
            $links = $domElement->getElementsByTagName("a");
            foreach($links as $link) {
                $link = $link->getAttribute("href");
                break;
            }
            $title = $this->getTitleFromDomList($domElement->childNodes);
            $date = $this->getDateFromDomList($domElement->childNodes);

            $podcastEntry = new PodcastEntry($title, "http://www.fsr.de/media/" . $link, $date);
            $entries[] = $podcastEntry;
        }

        return $entries;
    }

    /**
     * @param \DOMNodeList|\DOMElement[] $domList
     * @return string
     */
    private function getDateFromDomList(\DOMNodeList $domList)
    {
        foreach($domList as $elem) {
            if (!($elem instanceof \DOMElement)) {
                continue;
            }
            $date = \DateTime::createFromFormat("d.m.Y", $elem->nodeValue);
            if ($date) {
                return $date;
            }
        }
    }
    /**
     * @param \DOMNodeList|\DOMElement[] $domList
     * @return string
     */
    private function getTitleFromDomList(\DOMNodeList $domList)
    {
        foreach($domList as $elem) {
            if (!($elem instanceof \DOMElement)) {
                continue;
            }
            $date = \DateTime::createFromFormat("d.m.Y", $elem->nodeValue);
            if ($date) {
                continue;
            }
            if ($elem->nodeValue == "") {
                continue;
            }

            return $elem->nodeValue;
        }
    }

}

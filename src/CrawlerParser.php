<?php

namespace Arifr007\IBanking;

use Arifr007\IBanking\Contracts\Parser;
use Symfony\Component\DomCrawler\Crawler;

class CrawlerParser extends Crawler implements Parser
{
    public function make($document)
    {
        return new static($document);
    }

    public function parse($xpath)
    {
        return $this->filterXPath($xpath);
    }

    public function found()
    {
        return $this->count() > 0;
    }
}

<?php declare(strict_types=1);

namespace App\Code;

// PHP 7.1
final class Counting
{
    private $titles = [];

    /**
     * @var mixed[]
     */
    private $alsoTitles = [];

    /**
     * @var mixed
     */
    private $notTitles;

    public function getTitle()
    {
        count($this->titles);
        $this->titles = null;


        $titleCount = count($this->titles);
        $alsoTitlesCount = count($this->alsoTitles);
        $notTitlesCount = count($this->notTitles);
    }
}

//(new Counting())->getTitle();
<?php namespace App\Classes;

class SquareTable
{
    private $maximumHeight;
    private $maximumWidth;

    public function __construct(int $maximumHeight, int $maximumWidth)
    {
        $this->maximumHeight = $maximumHeight;
        $this->maximumWidth = $maximumWidth;
    }

    /**
     * @return int
     */
    public function getMaximumHeight(): int
    {
        return $this->maximumHeight;
    }

    /**
     * @return int
     */
    public function getMaximumWidth(): int
    {
        return $this->maximumWidth;
    }
}

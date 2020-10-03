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
    public function getMaximumReachableHeight(): int
    {
        return $this->maximumHeight - 1;
    }

    /**
     * @return int
     */
    public function getMaximumReachableWidth(): int
    {
        return $this->maximumWidth - 1;
    }
}

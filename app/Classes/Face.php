<?php namespace App\Classes;

use App\Interfaces\FaceInterface;

abstract class Face implements FaceInterface
{
    public const NORTH = 'NORTH';
    public const SOUTH = 'SOUTH';
    public const EAST = 'EAST';
    public const WEST = 'WEST';

    protected $face;

    /**
     * Rotate at an angle of 90 degree towards the given direction
     *
     * @param string $rotateToDirection
     * @return void
     */
    public function rotate(string $rotateToDirection): void
    {
        // If rotating to Left
        if ($rotateToDirection === Direction::LEFT) {
            switch ($this->face) {
                case self::NORTH:
                    $this->face = self::WEST;
                    break;
                case self::EAST:
                    $this->face = self::NORTH;
                    break;
                case self::SOUTH:
                    $this->face = self::EAST;
                    break;
                default:
                    $this->face = self::SOUTH;
                    break;
            }
        } else {
            // Rotating to right
            switch ($this->face) {
                case self::NORTH:
                    $this->face = self::EAST;
                    break;
                case self::SOUTH:
                    $this->face = self::WEST;
                    break;
                case self::WEST:
                    $this->face = self::NORTH;
                    break;
                default:
                    $this->face = self::SOUTH;
                    break;
            }
        }
    }
}

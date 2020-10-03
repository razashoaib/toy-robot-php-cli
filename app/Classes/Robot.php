<?php namespace App\Classes;

use App\Interfaces\InstructionInterface;

class Robot extends Face implements InstructionInterface
{
    private $x;
    private $y;
    private $squareTable;

    /**
     * Robot constructor.
     * @param int $x
     * @param int $y
     * @param string $face
     * @param SquareTable $squareTable
     */
    public function __construct(int $x, int $y, string $face, SquareTable $squareTable)
    {
        $this->squareTable = $squareTable;
        $this->place($x, $y, $face);
    }

    /**
     * Place the robot if x and y is under permissible bounds
     *
     * @param int $x
     * @param int $y
     * @param string $face
     */
    public function place(int $x, int $y, string $face): void
    {
        if ($this->squareTable->getMaximumWidth() >= $x && $this->squareTable->getMaximumHeight() >= $y) {
            $this->x = $x;
            $this->y = $y;
            $this->face = $face;
        }
    }

    /**
     * Move the robot in the facing direction
     */
    public function move(): void
    {
        if (!(isset($this->x) || isset($this->y))) {
            return;
        }
        switch ($this->face) {
            case Face::NORTH:
                if ($this->squareTable->getMaximumHeight() === $this->y) {
                    return;
                }
                $this->y++;
                break;
            case Face::SOUTH:
                if ($this->y === 0) {
                    return;
                }
                $this->y--;
                break;
            case Face::EAST:
                if ($this->squareTable->getMaximumWidth() === $this->x) {
                    return;
                }
                $this->x++;
                break;
            case Face::WEST:
                if ($this->x === 0) {
                    return;
                }
                $this->x--;
                break;
        }
    }

    /**
     * Report the current position of the robot
     *
     * @return string
     */
    public function report(): string
    {
        if (!(isset($this->x) || isset($this->y))) {
            return 'Robot not placed on the table yet';
        }
        return "$this->x,$this->y,$this->face";
    }
}

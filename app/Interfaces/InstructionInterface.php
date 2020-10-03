<?php namespace App\Interfaces;

interface InstructionInterface
{

    /**
     * Place an entity
     *
     * @param $x
     * @param $y
     * @param string $face
     */
    public function place(int $x, int $y, string $face): void;

    /**
     * Move the entity
     */
    public function move(): void;

    /**
     * Report the current state of entity
     *
     * @return string
     */
    public function report(): string;
}

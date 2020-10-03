<?php namespace App\Interfaces;

interface FaceInterface
{
    /**
     * Rotate the face of an entity
     *
     * @param string $rotateToDirection
     */
    public function rotate(string $rotateToDirection): void;
}

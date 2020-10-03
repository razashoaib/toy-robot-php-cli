<?php

namespace Tests\Unit;

use App\Classes\Direction;
use App\Classes\Face;
use App\Classes\Robot;
use App\Classes\SquareTable;
use Tests\TestCase;

class RobotMovementTest extends TestCase
{
    /**
     * Test Robot placing
     *
     * @return void
     */
    public function testRobotPlacing(): void
    {
        $robot = new Robot(2, 3, Face::NORTH, new SquareTable(5, 5));
        self::assertEquals('2,3,NORTH', $robot->report());
        $robot->move();
        $robot->rotate(Direction::LEFT);
        $robot->place(4, 4, Face::NORTH);
        self::assertEquals('4,4,NORTH', $robot->report());

        // Robot should ignore this command as it is out of bounds
        $robot->place(5, 4, Face::NORTH);

        // Robot should ignore this command as it is out of bounds
        $robot->place(-1, 4, Face::NORTH);

        self::assertEquals('4,4,NORTH', $robot->report());
    }

    /**
     * Test Robot movements
     *
     * @return void
     */
    public function testRobotMovements(): void
    {
        $robot = new Robot(2, 3, Face::NORTH, new SquareTable(5, 5));
        $robot->move();
        self::assertEquals('2,4,NORTH', $robot->report());
        $robot->move();
        self::assertEquals('2,4,NORTH', $robot->report());
        $robot->rotate(Direction::LEFT);
        $robot->move();
        $robot->move();
        self::assertEquals('0,4,WEST', $robot->report());
    }

    /**
     * Test Robot rotations
     *
     * @return void
     */
    public function testRobotRotations(): void
    {
        $robot = new Robot(2, 3, Face::NORTH, new SquareTable(5, 5));
        $robot->rotate(Direction::LEFT);
        self::assertEquals('2,3,WEST', $robot->report());
        $robot->rotate(Direction::LEFT);
        self::assertEquals('2,3,SOUTH', $robot->report());
        $robot->rotate(Direction::LEFT);
        self::assertEquals('2,3,EAST', $robot->report());
        $robot->rotate(Direction::LEFT);

        // Should be back to North
        self::assertEquals('2,3,NORTH', $robot->report());

        $robot->rotate(Direction::RIGHT);
        self::assertEquals('2,3,EAST', $robot->report());
        $robot->rotate(Direction::RIGHT);
        self::assertEquals('2,3,SOUTH', $robot->report());
        $robot->rotate(Direction::RIGHT);
        self::assertEquals('2,3,WEST', $robot->report());
        $robot->rotate(Direction::RIGHT);

        // Should be back to North
        self::assertEquals('2,3,NORTH', $robot->report());

        $robot->rotate(Direction::RIGHT);
        $robot->move();
        $robot->move();
        self::assertEquals('4,3,EAST', $robot->report());
        $robot->rotate(Direction::RIGHT);
        $robot->move();
        $robot->move();
        self::assertEquals('4,1,SOUTH', $robot->report());
        $robot->rotate(Direction::RIGHT);
        $robot->move();
        $robot->move();
        self::assertEquals('2,1,WEST', $robot->report());
    }

    /**
     * Test Robot reporting
     *
     * @return void
     */
    public function testRobotReporting(): void
    {
        $robot = new Robot(2, 5, Face::NORTH, new SquareTable(5, 5));
        $robot->rotate(Direction::LEFT);
        self::assertEquals('Robot not placed on the table yet', $robot->report());

        $robot = new Robot(5, 2, Face::NORTH, new SquareTable(5, 5));
        $robot->rotate(Direction::LEFT);
        self::assertEquals('Robot not placed on the table yet', $robot->report());

        $robot->place(-1, 0, Face::EAST);
        $robot->move();
        $robot->move();
        $robot->rotate(Direction::RIGHT);
        $robot->move();
        self::assertEquals('Robot not placed on the table yet', $robot->report());

        $robot->place(3, -2, Face::EAST);
        $robot->move();
        $robot->move();
        $robot->rotate(Direction::RIGHT);
        $robot->move();
        self::assertEquals('Robot not placed on the table yet', $robot->report());

        $robot->place(3, 2, Face::EAST);
        $robot->move();
        $robot->move();

        // Should be ignored
        $robot->place(3, -2, Face::WEST);

        $robot->rotate(Direction::RIGHT);
        $robot->move();
        self::assertEquals('4,1,SOUTH', $robot->report());
    }
}

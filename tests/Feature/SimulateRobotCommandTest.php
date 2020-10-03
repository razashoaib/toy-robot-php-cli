<?php

namespace Tests\Feature;

use Tests\TestCase;

class SimulateRobotCommandTest extends TestCase
{
    /**
     * Testing SimulateRobotCommand using Data/test-input1.txt
     *
     * @return void
     */
    public function testSimulateRobotCommandUsingTestInputFile1(): void
    {
        $this->artisan('simulate-robot Data/test-input1.txt')
            ->expectsOutput('0,1,NORTH')
            ->assertExitCode(0);
    }

    /**
     * Testing SimulateRobotCommand using Data/test-input2.txt
     *
     * @return void
     */
    public function testSimulateRobotCommandUsingTestInputFile2(): void
    {
        $this->artisan('simulate-robot Data/test-input2.txt')
            ->expectsOutput('0,0,WEST')
            ->assertExitCode(0);
    }

    /**
     * Testing SimulateRobotCommand using Data/test-input3.txt
     *
     * @return void
     */
    public function testSimulateRobotCommandUsingTestInputFile3(): void
    {
        $this->artisan('simulate-robot Data/test-input3.txt')
            ->expectsOutput('3,3,NORTH')
            ->assertExitCode(0);
    }

    /**
     * Testing SimulateRobotCommand using Data/test-input4.txt
     *
     * @return void
     */
    public function testSimulateRobotCommandUsingTestInputFile4(): void
    {
        $this->artisan('simulate-robot Data/test-input4.txt')
            ->expectsOutput('0,3,SOUTH')
            ->assertExitCode(0);
    }

    /**
     * Testing SimulateRobotCommand using Data/test-input5.txt
     *
     * @return void
     */
    public function testSimulateRobotCommandUsingTestInputFile5(): void
    {
        $this->artisan('simulate-robot Data/test-input5.txt')
            ->expectsOutput('4,3,NORTH')
            ->assertExitCode(0);
    }

    /**
     * Testing SimulateRobotCommand using invalid input file
     *
     * @return void
     */
    public function testSimulateRobotCommandUsingInvalidInputFile(): void
    {
        $this->artisan('simulate-robot Data/test-invalid-input1.txt')
            ->expectsOutput('Invalid input file');
    }

    /**
     * Testing SimulateRobotCommand using invalid sequence of commands in the input file
     *
     * @return void
     */
    public function testSimulateRobotCommandUsingInvalidSequenceInputFile(): void
    {
        $this->artisan('simulate-robot Data/test-invalid-input2.txt')
            ->expectsOutput('Invalid input. First command should be PLACE');
    }
}

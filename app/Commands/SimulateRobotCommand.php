<?php

namespace App\Commands;

use App\Classes\Direction;
use App\Classes\Robot;
use App\Classes\SquareTable;
use App\Utilities\InputFileUtility;
use LaravelZero\Framework\Commands\Command;

class SimulateRobotCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'simulate-robot {file-path=Data/input.txt}';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Simulation of Toy Robot based on the input provided in the input.txt file';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        try {
            // Read the input file and validates it
            $lines = InputFileUtility::getInstructionsFromInputFile($this->argument('file-path'));

            // Check if there are instructions in the file and it was not empty
            if (count($lines) > 0) {

                // First instruction will always be a place cmd
                $firstPlaceCmd = explode(',', explode(' ', $lines[0])[1]);

                // Initialize the robot here to place
                $robot = new Robot($firstPlaceCmd[0],
                    $firstPlaceCmd[1],
                    strtoupper($firstPlaceCmd[2]),
                    new SquareTable(5, 5));

                // Loop through the rest of the commands and simulate the robot
                for ($i = 1, $iMax = count($lines); $i < $iMax; $i++) {

                    // Check if it is the place command then place the robot on the table
                    if (strpos($lines[$i], InputFileUtility::PLACE) !== false) {
                        $placeCmd = explode(',', explode(' ', $lines[$i])[1]);
                        $robot->place($placeCmd[0], $placeCmd[1], strtoupper($placeCmd[2]));
                    }

                    // Check if the commands are either MOVE, LEFT, RIGHT or REPORT
                    switch ($lines[$i]) {
                        case InputFileUtility::MOVE:
                            $robot->move();
                            break;
                        case InputFileUtility::RIGHT:
                            $robot->rotate(Direction::RIGHT);
                            break;
                        case InputFileUtility::LEFT:
                            $robot->rotate(Direction::LEFT);
                            break;
                        case InputFileUtility::REPORT:
                            $this->info($robot->report());
                            break;
                    }
                }
            }
        } catch (\Exception $ex) {
            $this->error($ex->getMessage());
        }

    }
}

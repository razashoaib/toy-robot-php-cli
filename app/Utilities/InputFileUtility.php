<?php namespace App\Utilities;

use Illuminate\Support\Facades\File;

class InputFileUtility
{
    public const PLACE = 'PLACE';
    public const MOVE = 'MOVE';
    public const LEFT = 'LEFT';
    public const RIGHT = 'RIGHT';
    public const REPORT = 'REPORT';
    private const PLACE_REGEX = '/^place [\d]+,[\d]+,(north|south|east|west)$/i';

    /**
     * Reads the input file, validates it and returns a valid array of commands
     *
     * @param string $filePath
     * @return array
     */
    public static function getInstructionsFromInputFile(string $filePath = 'Data/input.txt'): array
    {
        $instructions = [];
        $fileContents = File::get(app_path($filePath));
        $lines = explode(PHP_EOL, $fileContents);
        if (count($lines) > 0) {
            $instructions[] = self::validateAndParseLine($lines[0]);
            if (preg_match(self::PLACE_REGEX, $instructions[0])) {
                for ($i = 1, $iMax = count($lines) - 1; $i < $iMax; $i++) {
                    $instructions[] = self::validateAndParseLine($lines[$i]);
                }
            } else {
                throw new \InvalidArgumentException('Invalid input. First command should be PLACE');
            }
        }
        return $instructions;
    }

    /**
     * Validate the commands, and throw an exception if the command is not recognized
     *
     * @param string $line
     * @return string
     */
    private static function validateAndParseLine(string $line): string
    {
        if (preg_match(self::PLACE_REGEX, $line)) {
            return $line;
        }

        switch ($line) {
            case self::MOVE:
                return self::MOVE;
            case self::LEFT:
                return self::LEFT;
            case self::RIGHT:
                return self::RIGHT;
            case self::REPORT:
                return self::REPORT;
        }

        throw new \InvalidArgumentException('Invalid input file');
    }
}

# toy-robot-php-cli
- The application is a simulation of a toy robot moving on a square tabletop,
  of dimensions 5 units x 5 units.
- There are no other obstructions on the table surface.
- The robot is free to roam around the surface of the table, but must be
  prevented from falling to destruction. Any movement that would result in the
  robot falling from the table must be prevented, however further valid
  movement commands must still be allowed. 
- This project has been developed using **Laravel Zero Framework v8.0** using **PHP v7.3**

This application reads commands of the following form:

    PLACE X,Y,F
    MOVE
    LEFT
    RIGHT
    REPORT

- PLACE will put the toy robot on the table in position X,Y and facing NORTH,
  SOUTH, EAST or WEST.
- The origin (0,0) is SOUTH WEST most corner of the tabletop.
- The first valid command to the robot is a PLACE command, after that, any
  sequence of commands may be issued, in any order, including another PLACE
  command. The application will discard all commands in the sequence until
  a valid PLACE command has been executed.
- MOVE will move the toy robot one unit forward in the direction it is
  currently facing.
- LEFT and RIGHT will rotate the robot 90 degrees in the specified direction
  without changing the position of the robot.
- REPORT will announce the X,Y and F of the robot.

- A robot that is not on the table will ignore the MOVE, LEFT, RIGHT
  and REPORT commands.
- Input can only be from a file.
- Tests included in the project.

Constraints
-----------

- The toy robot must not fall off the table during movement. This also
  includes the initial placement of the toy robot.
- Any move that would cause the robot to fall must be ignored.

Demo
-----------

![DemoGif](demo.gif?raw=true "Gif")

Example Input File
------------------------

### Example file at path app/Data/input.txt

    PLACE 1,2,EAST
    MOVE
    MOVE
    LEFT
    MOVE
    REPORT


Expected output:

    3,3,NORTH
    
Running the application
------------------------

The code assumes you have Docker running on your machine. If you do not, they offer easy to install binaries ([Mac](https://docs.docker.com/docker-for-mac/install/)) ([Windows](https://docs.docker.com/docker-for-windows/install/)).

- Clone this repository
- From the root of this project, run `docker-compose up -d --build` which will start the `php-cli` container that will be used to run this application on.
- After the `php-cli` container is up, run `sudo chmod +x ./toy-simulator.sh` which will make `./toy-simulator.sh` script executable
- Now run `./toy-simulator.sh simulate-robot` to run the application using the default input.txt file placed at the path `app/Data/input.txt`
- To run the application using a different input file on the path `app/Data/input2.txt`, run `./toy-simulator.sh simulate-robot Data/input2.txt`
- To run the tests, run `./toy-simulator.sh test`
- Make sure to stop the docker container after you are done using the application. For stopping the container run `docker-compose down`

**NOTE**: Please don't change or remove the files with prefix *test-input*, inside the path `app/Data` path, since those files are used by the tests. 

Project Built Using
------------------------

- git
- Laravel Zero v8.0
- PHP v7.3
- Docker v19.03.8

Acknowledgements
------------------------

- [Docker](https://docs.docker.com/)
- [Laravel Zero](https://laravel-zero.com/)
- [W3Schools](https://www.w3schools.com/)
- [Stack Overflow](https://stackoverflow.com/)

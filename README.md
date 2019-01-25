# Mr. Pip
A PHP "point-in-polygon" utility. It’s heavily based on [davidkonrad](https://stackoverflow.com/users/1407478/davidkonrad)'s excellent [StackOverflow answer](https://stackoverflow.com/questions/14818567/point-in-polygon-algorithm-giving-wrong-results-sometimes/18190354#18190354). All I did was condense it down to one class with a static method.

## Installation

Just include the class in your code:

```
include_once 'path/to/class-mg-pip.php';
```

## Usage

```
$point_in_question = new Point(LAT, LNG);

$polygon = array(
    new Point(LAT, LNG),
    new Point(LAT, LNG),
    new Point(LAT, LNG),
    new Point(LAT, LNG),
    new Point(LAT, LNG),
    new Point(LAT, LNG)
    // etc...
);

Point::point_in_polygon( $point_in_question, $polygon ); // true || false
```

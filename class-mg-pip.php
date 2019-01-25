<?php

/**
 * Point-in-Polygon algorithm
 * Source: https://stackoverflow.com/questions/14818567/point-in-polygon-algorithm-giving-wrong-results-sometimes/18190354#18190354
 */

//Point class, storage of lat/long-pairs
class Point {
    public $lat;
    public $long;

    public function __construct($lat, $long) {
        $this->lat = $lat;
        $this->long = $long;
    }

    public static function point_in_polygon($p, $polygon) {
        //if you operates with (hundred)thousands of points
        set_time_limit(60);
        $c = 0;
        $p1 = $polygon[0];
        $n = count($polygon);
    
        for ($i=1; $i<=$n; $i++) {
            $p2 = $polygon[$i % $n];
            if ($p->long > min($p1->long, $p2->long)
                && $p->long <= max($p1->long, $p2->long)
                && $p->lat <= max($p1->lat, $p2->lat)
                && $p1->long != $p2->long) {
                    $xinters = ($p->long - $p1->long) * ($p2->lat - $p1->lat) / ($p2->long - $p1->long) + $p1->lat;
                    if ($p1->lat == $p2->lat || $p->lat <= $xinters) {
                        $c++;
                    }
            }
            $p1 = $p2;
        }
        // if the number of edges we passed through is even, then it's not in the poly.
        return $c%2!=0;
    }

}

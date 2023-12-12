<?php

class App {

    // Bai 1
    public function randomNumberNotUnique($num, $min, $max) {
        $arr = [];
        for ($i = 0; $i < $num; $i++) {
            array_push($arr, rand($min, $max));
        }
        return $arr;
    }

    public function getArrayUnique($arr) {
        return array_unique($arr);
    }

    //Bai 2
    public function getMaxOfArray($arr) {
        return max($arr);
    }

    public function getMaxEvenOfArray(&$arrays) {
        arsort($arrays);
        foreach ($arrays as $arr) {
            if ($arr % 2 == 0) {
                return $arr;
            }
        }
        return null;
    }

    public function getMinOddOfArray(&$arrays) {
        sort($arrays);
        foreach ($arrays as $arr) {
            if ($arr % 2 != 0) {
                return $arr;
            }
        }
        return null;
    }

    //Bai 3
    public function createMatrixNM($n, $m) {
        $arr = [];
        for($i = 0; $i < $n; $i++) {
            for($j = 0; $j < $m; $j++) {
                $arr[$i][$j] = rand(0, 100);
            }
        }
        return $arr;
    }

    public function getSumPositiveIntegerOfMatrix($arr) {
        $n = count($arr);
        $m = count($arr[0]);
        $sum = 0;
        for($i = 0; $i < $n; $i++) {
            for($j = 0; $j < $m; $j++) {
                $sum += $arr[$i][$j];
            }
        }
        return $sum;
    }

    public function getSum5OfMatrix($arr) {
        $n = count($arr);
        $m = count($arr[0]);
        $sum = 0;
        for($i = 0; $i < $n; $i++) {
            for($j = 0; $j < $m; $j++) {
                if(($i +$j) % 5 == 0) {
                    $sum += $arr[$i][$j];
                }
            }
        }
        return $sum;
    }

    public function checkPrime($num)
    {
        if ($num < 2) {
            return false;
        }
        for ($i = 2; $i <= sqrt($num); $i++) {
            if ($num % $i == 0){
                return false;
            }
        }
        return true;
    }
    public function getPrime($arr) {
        $n = count($arr);
        $m = count($arr[0]);
        for($i = 0; $i < $n; $i++) {
            for($j = 0; $j < $m; $j++) {
                if($this->checkPrime($arr[$i][$j])) {
                    print($arr[$i][$j]) . ' ';
                }
            }
            print_r(PHP_EOL);
        }
    }

    public function sortWithCOlumnMatrix(&$arr) {
        $n = count($arr);
        for($i = 0; $i < $n; $i++) {
            rsort($arr[$i]);
        }
    }

    public function sumOfMainDiagonal($arr) {
        $sum = 0;
        $n = count($arr);
        $m = count($arr[0]);
        for($i = 0; $i < $n; $i++) {
            for($j = 0; $j < $m; $j++) {
                if ($i == $j) {
                    $sum += $arr[$i][$j];
                }
                if ($i == 0 || $j == 0 || $i == $n || $j == $m) {
                    $sum += $arr[$i][$j];
                }
            }
        }
        return $sum;
    }

    public function getMaxOfRow($arrays) {
        
    }
}

$app = new App();
$test = $app->createMatrixNM(2, 2);
print("<pre>".print_r($test,true)."</pre>");
$app->sortWithCOlumnMatrix($test);
print("<pre>".print_r($test,true)."</pre>");
?>
<?php

/**
 * Problem 7 「10001番目の素数」 †
 * 素数を小さい方から6つ並べると 2, 3, 5, 7, 11, 13 であり, 6番目の素数は 13 である.
 * 10 001 番目の素数を求めよ.
 */

function getNthPrimeNum(int $n)
{
    $p_list = [];
    $i = 1;
    while ($i < PHP_INT_MAX)
    {
        $tmp = $i;
        while ($tmp > 1) {
            $j = 2;
            while ($j < PHP_INT_MAX) {
                if ($tmp % $j === 0) {
                    $tmp /= $j;
                    if (!in_array($j, $p_list)) {
                        $p_list[] = $j;
                        echo "count : ".count($p_list).", val: {$j}".PHP_EOL;
                    }
                    if (count($p_list) >= $n) {
                        break 3;
                    }
                    break;
                }
                $j++;
            }
        }
        $i++;
    }
    return max($p_list);
}

function main()
{
    $ret = getNthPrimeNum(10001);
    echo $ret.PHP_EOL;
    var_dump(104743 === $ret);
}

main();

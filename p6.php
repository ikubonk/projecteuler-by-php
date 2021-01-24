<?php

/**
 * Problem 6 「二乗和の差」 †
 * 最初の10個の自然数について, その二乗の和は,
 * 12 + 22 + ... + 102 = 385
 * 最初の10個の自然数について, その和の二乗は,
 * (1 + 2 + ... + 10)2 = 3025
 * これらの数の差は 3025 - 385 = 2640 となる.
 * 同様にして, 最初の100個の自然数について二乗の和と和の二乗の差を求めよ.
 */

function calcSumOfSquare(int ...$args)
{
    $tmp = array_map(function ($x) {
        return $x ** 2;
    }, $args);
    return array_sum($tmp);
}

function calcSquareOfSum(int ...$args)
{
    return array_sum($args) ** 2;
}

function main()
{
    $a = range(1, 100);
    $ret = abs(
        call_user_func_array('calcSumOfSquare', $a)
        - call_user_func_array('calcSquareOfSum', $a)
    );

    echo $ret.PHP_EOL;
    var_dump(25164150 === $ret);
}

main();

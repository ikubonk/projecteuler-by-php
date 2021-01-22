<?php

/**
 * @see http://odz.sakura.ne.jp/projecteuler/index.php?cmd=read&page=Problem%204
 * Problem 4 「最大の回文積」 
 * 左右どちらから読んでも同じ値になる数を回文数という. 2桁の数の積で表される回文数のうち, 最大のものは 9009 = 91 × 99 である.
 * では, 3桁の数の積で表される回文数の最大値を求めよ.
 */

function f(int $num_of_digit)
{
    if ($num_of_digit < 1) {
        echo "桁数は自然数をとります。";
        exit();
    }
    // echo "{$num_of_digit}".PHP_EOL;
    // 指定桁の最小数
    $min = calcMinNumOfDigit($num_of_digit);
    // 指定桁の最大数
    $max = calcMaxNumOfDigit($num_of_digit);
    // echo "MIN: {$min}, MAX: {$max}".PHP_EOL;
    
    $tmp = [];
    for ($i=$max; $i>=$min; $i--) {
        for ($j=$max; $j>=$min; $j--) {
            $multi = $i * $j;
            // echo "{$i} * {$j} = {$multi}".PHP_EOL;
            if (isPalindrome($multi)) {
                $tmp[] = $multi;
            }
        }
    }
    return max($tmp);
}

function isPalindrome($val) 
{
    return (string) $val === strrev((string)$val);
}

function calcMinNumOfDigit(int $digit)
{
    return 10 ** ($digit - 1);
}

function calcMaxNumOfDigit(int $digit)
{
    return 10 ** $digit - 1;
}

function main()
{
    echo "Ans: ".f(3);
}

main();
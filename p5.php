<?php

/**
 * @see http://odz.sakura.ne.jp/projecteuler/index.php?cmd=read&page=Problem%205
 * Problem 5 「最小の倍数」
 * 2520 は 1 から 10 の数字の全ての整数で割り切れる数字であり, そのような数字の中では最小の値である.
 * では, 1 から 20 までの整数全てで割り切れる数字の中で最小の正の数はいくらになるか.
 */


function pf(int $int)
{
    if ($int < 1) {
        echo "素因数分解する数は1以上である必要があります";
        exit();
    }
    if ($int === 1) {
        return [1];
    }
    $ret = [];
    $i = 2;

    // 1になったら終了
    while ($int > 1) {
        while ($i < PHP_INT_MAX) {
            // 割り切れたらbreak;
            if ($int % $i === 0) {
                $ret[] = $i;
                $int /= $i;
                break;
            }
            $i++;
        }
    }
    return $ret;
}

function calcMinCommonMulti(array $args)
{
    $pf_list = [];
    foreach($args as $v) {
        $tmp = [];
        foreach (pf($v) as $p) {
            // 素数ごとに素数 ** 指数を記録
            $tmp[$p] = $tmp[$p] ? $tmp[$p] * $p: $p;
        }
        // 最小公倍数は素数ごとに指数が多い値を掛け合わせるので
        // 素数 ** 指数が一番大きいもののみを記録
        foreach($tmp as $p => $val) {
            $pf_list[$p] = $pf_list[$p] 
                ? max($pf_list[$p], $val)
                : $val;
        }
    }
    
    return array_product($pf_list);
}

$a = calcMinCommonMulti(range(1, 20));
echo $a.PHP_EOL;
echo 232792560 == $a ? 'true' : 'false';
<?php

function check_wallets(array $wallet, int $value = 150): ?array
{
    $i = 0;
    $j = count($wallet) - 1;

    while ($i < $j) {
        $sum = $wallet[$i] + $wallet[$j];

        if ($sum === $value) {
            return [$wallet[$i], $wallet[$j]];
        }

        if ($sum < $value) {
            $i++;
        } else {
            $j--;
        }
    }

    return null;
}

var_dump(check_wallets([10, 20, 40, 80, 95, 110, 130]));

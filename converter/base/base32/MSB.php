<?php

namespace sskaje\converter\base\base32;

use sskaje\converter\base\common\BaseConverter;
use sskaje\converter\base\common\BaseConverterBitSplitMSB;

class MSB extends BaseConverter
{

    static protected function Init()
    {
        $char_table = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ234567';
        $exp = 5;
        $pad = "";

        return new BaseConverterBitSplitMSB($exp, $char_table, $pad);
    }
}
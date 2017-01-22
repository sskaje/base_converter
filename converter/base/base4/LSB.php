<?php

namespace sskaje\converter\base\base4;

use sskaje\converter\base\common\BaseConverter;
use sskaje\converter\base\common\BaseConverterBitSplitLSB;

class LSB extends BaseConverter
{

    static protected function Init()
    {
        $char_table = "0123";
        $exp = 2;
        $pad = "";

        return new BaseConverterBitSplitLSB($exp, $char_table, $pad);
    }
}
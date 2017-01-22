<?php

namespace sskaje\converter\base\base2;

use sskaje\converter\base\common\BaseConverter;
use sskaje\converter\base\common\BaseConverterBitSplitLSB;

class LSB extends BaseConverter
{

    static protected function Init()
    {
        $char_table = "01";
        $exp = 1;
        $pad = "";

        return new BaseConverterBitSplitLSB($exp, $char_table, $pad);
    }
}
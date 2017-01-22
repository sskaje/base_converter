<?php

namespace sskaje\converter\base\base2;

use sskaje\converter\base\common\BaseConverter;
use sskaje\converter\base\common\BaseConverterBitSplitMSB;

class MSB extends BaseConverter
{

    static protected function Init()
    {
        $char_table = "01";
        $exp = 1;
        $pad = "";

        return new BaseConverterBitSplitMSB($exp, $char_table, $pad);
    }
}
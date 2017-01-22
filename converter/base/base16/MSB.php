<?php

namespace sskaje\converter\base\base16;

use sskaje\converter\base\common\BaseConverter;
use sskaje\converter\base\common\BaseConverterBitSplitMSB;

class MSB extends BaseConverter
{

    static protected function Init()
    {
        $char_table = '0123456789ABCDEF';
        $exp = 4;
        $pad = "";

        return new BaseConverterBitSplitMSB($exp, $char_table, $pad);
    }
}
<?php

namespace sskaje\converter\base\base32;

use sskaje\converter\base\common\BaseConverter;
use sskaje\converter\base\common\BaseConverterBitSplitMSB;

class VMwareMSB extends BaseConverter
{

    static protected function Init()
    {
        $char_table = '0123456789ACDEFGHJKLMNPQRTUVWXYZ';
        $exp = 5;
        $pad = "";

        return new BaseConverterBitSplitMSB($exp, $char_table, $pad);
    }
}
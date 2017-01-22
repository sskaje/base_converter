<?php

namespace sskaje\converter\base\base64;

use sskaje\converter\base\common\BaseConverter;
use sskaje\converter\base\common\BaseConverterBitSplitLSB;

class LSB extends BaseConverter
{

    static protected function Init()
    {
        $char_table = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/';
        $exp = 6;
        $pad = '=';

        return new BaseConverterBitSplitLSB($exp, $char_table, $pad);
    }
}
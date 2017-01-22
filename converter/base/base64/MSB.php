<?php

namespace sskaje\converter\base\base64;

use sskaje\converter\base\common\BaseConverter;
use sskaje\converter\base\common\BaseConverterBitSplitMSB;

class MSB extends BaseConverter
{

    static protected function Init()
    {
        $char_table = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/';
        $exp = 6;
        $pad = '=';

        return new BaseConverterBitSplitMSB($exp, $char_table, $pad);
    }
}
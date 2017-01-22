<?php

namespace sskaje\converter\base\common;

abstract class BaseConverter
{

    abstract static protected function Init();

    final static protected function DeChunk($in)
    {
        return str_replace(["\t", "\r", "\n", ' '], '', $in);
    }

    final static public function Encode($in)
    {
        return static::Init()->Encode(self::DeChunk($in));
    }

    final static public function Decode($in)
    {
        return static::Init()->Decode(self::DeChunk($in));
    }
}

# EOF
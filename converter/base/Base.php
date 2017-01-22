<?php

namespace sskaje\converter\base;

class Base
{
    protected $supported = [
        'base2.LSB',
        'base2.MSB',
        'base4.LSB',
        'base4.MSB',
        'base8.LSB',
        'base8.MSB',
        'base16.LSB',
        'base16.MSB',
        'base32.LSB',
        'base32.MSB',
        'base64.LSB',
        'base64.MSB',
        'base32.VMwareLSB',
        'base32.VMwareMSB',
    ];

    public function supported()
    {
        return $this->supported();
    }

    protected function toClass($coder)
    {
        if (!in_array($coder, $this->supported)) {
            throw new \Exception("$coder not supported");
        }

        return strtr(__NAMESPACE__ . '.' . $coder, ['.'=>'\\']);
    }

    public function decode($coder, $in)
    {
        $class = $this->toClass($coder);
        return $class::Decode($in);
    }

    public function encode($coder, $in)
    {
        $class = $this->toClass($coder);
        return $class::Encode($in);
    }
}

# EOF
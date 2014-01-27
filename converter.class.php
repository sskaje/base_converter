<?php

class BaseConverter
{
    static public function Base16()
    {
        $char_table = '0123456789ABCDEF';
        $exp = 4;
        $pad = '';

        return new BaseConverterBitSplitMSB($exp, $char_table, $pad);
    }

    static public function Base32()
    {
        $char_table = '0123456789ACDEFGHJKLMNPQRTUVWXYZ';
        $exp = 5;
        $pad = '';

        return new BaseConverterBitSplitMSB($exp, $char_table, $pad);
    }

    static public function Base64()
    {
        $char_table = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/';
        $exp = 6;
        $pad = '=';

        return new BaseConverterBitSplitMSB($exp, $char_table, $pad);
    }
    static public function Base16LSB()
    {
        $char_table = '0123456789ABCDEF';
        $exp = 4;
        $pad = '';

        return new BaseConverterBitSplitLSB($exp, $char_table, $pad);
    }

    static public function Base32LSB()
    {
        $char_table = '0123456789ACDEFGHJKLMNPQRTUVWXYZ';
        $exp = 5;
        $pad = '';

        return new BaseConverterBitSplitLSB($exp, $char_table, $pad);
    }

    static public function Base64LSB()
    {
        $char_table = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/';
        $exp = 6;
        $pad = '=';

        return new BaseConverterBitSplitLSB($exp, $char_table, $pad);
    }
}

/**
 * Split from lower bits
 */
class BaseConverterBitSplitMSB
{
    protected $exp;
    protected $encode_table;
    protected $decode_table = array();
    protected $pad;
    protected $byte_width = 8;

    public function __construct($exp, $char_table, $pad)
    {
        $this->exp          =   $exp;
        $this->encode_table =   $char_table;
        $this->pad          =   $pad;

        for ($i=0; isset($char_table[$i]); $i++) {
            $this->decode_table[$char_table[$i]] = $i;
        }
    }

    public function Encode($in)
    {
        # create a 16-bit buffer
        $int_width = 16;
        $space_width = $int_width - $this->byte_width;
        $back_shift = $int_width - $this->exp;

        $ret = '';
        #
        $mask = (pow(2, $this->exp) - 1) << $back_shift;

        $char_table = $this->encode_table;

        for ($i=0; isset($in[$i]); $i+=$this->exp) {
            $int = 0;
            $current_len = 0;
            $j = $i;
            $tmp = '';

            do {
                $int |= (ord($in[$j]) << ($space_width - $current_len));
                $current_len += $this->byte_width;
                if (!isset($in[$j+1])) {
                    $mod = $current_len % $this->exp;
                    if ($mod) {
                        $current_len += $this->exp - $mod;
                    }
                }

                while ($current_len >= $this->exp) {
                    $index = ($int & $mask) >> $back_shift;
                    $tmp .= $char_table[$index];
                    $current_len -= $this->exp;
                    $int = ($int << $this->exp & 0xffff);
                }

                if (isset($in[$j+1])) {
                    $j++;
                } else {
                    break;
                }
            } while ($j < $i+$this->exp);

            $ret .= $tmp;
        }

        if ($this->pad) {
            $align_size = self::lcm($this->byte_width, $this->exp) / $this->exp;
            $ret_size = strlen($ret);
            $mod = $ret_size % $align_size;
            if ($mod) {
                $ret .= str_repeat($this->pad, $align_size - $mod);
            }
        }

        return $ret;
    }

    public function Decode($in)
    {
        # create a 16-bit buffer
        $int_width = 16;
        $space_width = $int_width - $this->exp;
        $mask = 0xff00;
        $shift_back = $this->byte_width;

        $ret = '';
        $align_size = self::lcm($this->byte_width, $this->exp) / $this->exp;
        $decode_align_size = self::lcm($this->byte_width, $this->exp) / $this->byte_width;

        for ($i=0; isset($in[$i]); $i+=$align_size) {
            $tmp = '';
            $int = 0;
            $current_len = 0;
            $j = $i;
            $block_len = 0;
            do {
                if (!isset($in[$j]) || $this->pad && $in[$j] == $this->pad) {
                    if ($current_len % $this->byte_width) {
                        $current_len += $this->byte_width - $current_len % $this->byte_width;
                    } else {
                        break;
                    }
                } else {
                    $int |= ($this->decode_table[$in[$j]] << ($space_width - $current_len));
                    $current_len += $this->exp;
                    ++$block_len;
                }

                if ($current_len >= $this->byte_width) {
                    $tmp .= chr(($int & $mask) >> $shift_back);
                    $int = $int << $this->byte_width;
                    $current_len -= $this->byte_width;
                }

                $j++;
            } while($j < $i + $align_size && isset($in[$j]));

            if ($decode_align_size > $block_len) {
                $tmp = substr($tmp, 0, $decode_align_size - $block_len);
            }

            $ret .= $tmp;
        }

        return $ret;
    }

    static public function lcm($a, $b)
    {
        $gcd = self::gcd($a, $b);
        return $a * $b / $gcd;
    }

    static public function gcd($a, $b)
    {
        while ( $a != 0 )
        {
            $c = $a;
            $a = $b % $a;
            $b = $c;
        }
        return $b;
    }
}

class BaseConverterBitSplitLSB
{
    protected $exp;
    protected $encode_table;
    protected $decode_table = array();
    protected $pad;
    protected $byte_width = 8;

    public function __construct($exp, $char_table, $pad)
    {
        $this->exp          =   $exp;
        $this->encode_table =   $char_table;
        $this->pad          =   $pad;

        for ($i=0; isset($char_table[$i]); $i++) {
            $this->decode_table[$char_table[$i]] = $i;
        }
    }

    public function Encode($in)
    {
        $ret = '';
        $mask = pow(2, $this->exp) - 1;
        $char_table = $this->encode_table;

        for ($i=0; isset($in[$i]); $i+=$this->exp) {
            $int = 0;
            $current_len = 0;
            $j = $i;
            $tmp = '';

            do {
                $int |= (ord($in[$j]) << $current_len);
                $current_len += $this->byte_width;
                if (!isset($in[$j+1])) {
                    $mod = $current_len % $this->exp;
                    if ($mod) {
                        $current_len += $this->exp - $mod;
                    }
                }

                while ($current_len >= $this->exp) {
                    $index = $int & $mask;
                    $tmp .= $char_table[$index];
                    $current_len -= $this->exp;
                    $int = $int >> $this->exp;
                }

                if (isset($in[$j+1])) {
                    $j++;
                } else {
                    break;
                }
            } while ($j < $i+$this->exp);

            $ret .= $tmp;
        }

        if ($this->pad) {
            $align_size = self::lcm($this->byte_width, $this->exp) / $this->exp;
            $ret_size = strlen($ret);
            $mod = $ret_size % $align_size;
            if ($mod) {
                $ret .= str_repeat($this->pad, $align_size - $mod);
            }
        }

        return $ret;
    }

    public function Decode($in)
    {
        $ret = '';
        $align_size = self::lcm($this->byte_width, $this->exp) / $this->exp;
        $decode_align_size = self::lcm($this->byte_width, $this->exp) / $this->byte_width;

        for ($i=0; isset($in[$i]); $i+=$align_size) {
            $tmp = '';
            $int = 0;
            $current_len = 0;
            $j = $i;
            $block_len = 0;
            do {
                if (!isset($in[$j]) || $this->pad && $in[$j] == $this->pad) {
                    if ($current_len % $this->byte_width) {
                        $current_len += $this->byte_width - $current_len % $this->byte_width;
                    } else {
                        break;
                    }
                } else {
                    $int |= ($this->decode_table[$in[$j]] << $current_len);
                    $current_len += $this->exp;
                    ++$block_len;
                }

                if ($current_len >= $this->byte_width) {
                    $tmp .= chr($int & 0xff);
                    $int = $int >> $this->byte_width;
                    $current_len -= $this->byte_width;
                }

                $j++;
            } while($j < $i + $align_size && isset($in[$j]));

            if ($decode_align_size > $block_len) {
                $tmp = substr($tmp, 0, $decode_align_size - $block_len);
            }

            $ret .= $tmp;
        }

        return $ret;
    }

    static public function lcm($a, $b)
    {
        $gcd = self::gcd($a, $b);
        return $a * $b / $gcd;
    }

    static public function gcd($a, $b)
    {
        while ( $a != 0 )
        {
            $c = $a;
            $a = $b % $a;
            $b = $c;
        }
        return $b;
    }
}

# EOF
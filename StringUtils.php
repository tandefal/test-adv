<?php

class StringUtils
{
    public function reverseWords(string $str): string
    {
        preg_match_all('/(\p{L}+|[^\p{L}\s]+|\s+)/u', $str, $matches);
        $cases = [];
        $result = '';
        foreach ($matches[0] as $match) {
            // Если это слово, меняем порядок букв с сохранением регистра
            if (preg_match('/^\p{L}+$/u', $match)) {
                $reversed = '';
                $length = mb_strlen($match);
                for ($i = 0; $i < $length; $i++) {
                    $key = $length - $i - 1;
                    $char = mb_substr($match, $key, 1);
                    if( IntlChar::isupper($char)) {
                        $cases[] = $key;
                    }
                    $reversed .= $char;
                }
                $result .= $reversed;
            } else {
                $result .= $match;
            }
        }
        $result = mb_str_split($result);
        foreach ($result as $index => $value) {
            if(in_array($index, $cases, true)) {
                $result[$index] = mb_strtoupper($value);
            }else {
                $result[$index] = mb_strtolower($value);
            }
        }
        return implode('', $result);
    }
}
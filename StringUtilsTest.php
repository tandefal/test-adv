<?php
require_once 'StringUtils.php';
use PHPUnit\Framework\TestCase;

class StringUtilsTest extends TestCase
{
    public function testReverseWords(): void
    {
        $stringUtils = new StringUtils();
        $this->assertEquals('tac', $stringUtils->reverseWords('cat'));
        $this->assertEquals('Ьшым', $stringUtils->reverseWords('Мышь'));
        $this->assertEquals('esuOh', $stringUtils->reverseWords('houSe'));
        $this->assertEquals('кимОД', $stringUtils->reverseWords('домИК'));
        $this->assertEquals('tnAhPele', $stringUtils->reverseWords('elEpHant'));
        $this->assertEquals('tac,', $stringUtils->reverseWords('cat,'));
        $this->assertEquals('Амиз:', $stringUtils->reverseWords('Зима:'));
        $this->assertEquals('si "dloc" won', $stringUtils->reverseWords('is "cold" now'));
        $this->assertEquals('driht-trap', $stringUtils->reverseWords('third-part'));
        $this->assertEquals('nac`t', $stringUtils->reverseWords('can`t'));
    }
}
<?php

class WordExcluderTest extends PHPUnit_Framework_TestCase {

    public function testExcludeWords(){
        $text = 'You can find more information in the book';
        $wordsToExclude = ['can', 'more', 'information', 'in', 'You'];

        $result = WordExcluder::excludeWordsFromText($text, $wordsToExclude);

        $this->assertEquals('find the book', $result);
    }

    public function testExcludeWordsIsNotCaseSensitive(){
        $text = 'You Will Be Here';
        $wordsToExclude = ['will', 'here'];

        $result = WordExcluder::excludeWordsFromText($text, $wordsToExclude);

        $this->assertEquals('You Be', $result);
    }

}
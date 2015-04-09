<?php

class WordExcluder {

    /**
     * @param string $text
     * @param array $wordsToExclude
     * @return mixed|string
     */
    public static function excludeWordsFromText($text, $wordsToExclude){
        foreach ($wordsToExclude as &$word) {
            $word = '/\b' . preg_quote($word, '/') . '\b/i';
        }
        $text = preg_replace($wordsToExclude, '', $text);
        $text = preg_replace('/(\s)+/', ' ', $text);
        $text = trim($text);
        return $text;
    }

}
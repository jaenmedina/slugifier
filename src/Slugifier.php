<?php

class Slugifier {

    /**
     * @var string
     */
    private $separator = '-';

    /**
     * @param $text
     * @return string
     */
    public function slugify($text){
        $text = $this->deletePunctuationMarks($text);
        $text = $this->handleWhiteSpaces($text);
        $text = mb_strtolower($text, 'UTF-8');
        return $text;
    }

    /**
     * @param $text
     * @return mixed
     */
    private function deletePunctuationMarks($text){
        return preg_replace('/[,.!?]*([-_]+)[,.!?]*/', '\1', preg_replace('/\b[.,?!]+|[.,!?]+\b/', '', $text));
    }

    /**
     * Handles white spaces by stripping them from the beginning and end of the
     * text and substituting the white spaces between words with the separator.
     * @param $text
     * @return mixed|string
     */
    private function handleWhiteSpaces($text){
        return preg_replace('/\s+/', $this->separator, trim($text));
    }

    /**
     * @param $separator
     */
    public function setSeparator($separator){
        $this->separator = $separator;
    }

}
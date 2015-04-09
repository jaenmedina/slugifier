<?php

class Slugifier {

    /**
     * @var string
     */
    private $separator = '-';

    /**
     * @var array
     */
    private $wordsToExclude;

    /**
     * @var array
     */
    private $rules;

    /**
     * @param $text
     * @return string
     */
    public function slugify($text){
        $text = $this->deletePunctuationMarks($text);
        if($this->wordsToExclude){
            $text = WordExcluder::excludeWordsFromText($text, $this->wordsToExclude);
        }
        $text = $this->handleWhiteSpaces($text);
        $text = mb_strtolower($text, 'UTF-8');
        if($this->rules){
            $text = strtr($text, $this->rules);
        }
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

    /**
     * @param array $wordsToExclude
     */
    public function excludeWords($wordsToExclude){
        $this->wordsToExclude = $wordsToExclude;
    }

    /**
     * @param string $key
     * @param string $replacement
     */
    public function addRule($key, $replacement){
        $this->rules[$key] = $replacement;
    }

    /**
     * @param array $rules
     */
    public function addRules($rules){
        $this->rules = $this->rules ? array_merge($this->rules, $rules) : $rules;
    }

    /**
     * @param array $rules
     */
    public function setRules($rules){
        $this->rules = $rules;
    }

}
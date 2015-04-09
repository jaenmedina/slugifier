<?php

class SlugifierTest extends PHPUnit_Framework_TestCase {

    public function testSlugifySimpleString(){
        $simpleString = 'Hello, world!';
        $slugifier = new Slugifier();

        $slug = $slugifier->slugify($simpleString);

        $this->assertEquals('hello-world', $slug);
    }

    public function testSetSeparator(){
        $slugifier = new Slugifier();
        $slugifier->setSeparator('_');

        $slug = $slugifier->slugify('Hello, world!');

        $this->assertEquals('hello_world', $slug);
    }

    public function testSlugifyExcludingWords(){
        $slugifier = new Slugifier();
        $slugifier->excludeWords(['world', 'How', 'is']);

        $slug = $slugifier->slugify('Hello, world! How is everybody?');

        $this->assertEquals('hello-everybody', $slug);
    }

}
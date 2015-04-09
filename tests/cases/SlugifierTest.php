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


    public function testAddRule(){
        $simpleString = "Intenté Español Pingüino";
        $slugifier = new Slugifier();
        $slugifier->addRule("é", "e");
        $slugifier->addRule("ñ", "n");
        $slugifier->addRule("ü", "u");

        $slug = $slugifier->slugify($simpleString);

        $this->assertEquals("intente-espanol-pinguino", $slug);
    }

    public function testAddRules(){
        $simpleString = "Intenté Español Pingüino";
        $slugifier = new Slugifier();
        $slugifier->addRules(["é" => "e", "ñ" => "n", "ü" => "u"]);

        $slug = $slugifier->slugify($simpleString);

        $this->assertEquals("intente-espanol-pinguino", $slug);
    }

    public function testSetRules(){
        $simpleString = "Intenté Español Pingüino";
        $slugifier = new Slugifier();
        $rules = ["é" => "e", "ñ" => "n", "ü" => "u"];
        $slugifier->setRules($rules);

        $slug = $slugifier->slugify($simpleString);

        $this->assertEquals("intente-espanol-pinguino", $slug);
    }

    public function testCombineRuleCreationMethods(){
        $simpleString = "Intenté Español Pingüino";
        $slugifier = new Slugifier();
        $slugifier->setRules(["é" => "e"]);
        $slugifier->addRule("ñ", "n");
        $slugifier->addRules(["ü" => "u"]);

        $slug = $slugifier->slugify($simpleString);

        $this->assertEquals("intente-espanol-pinguino", $slug);
    }

}
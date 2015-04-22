Slugifier
=========
[![Build Status](https://travis-ci.org/jaenmedina/slugifier.svg?branch=master)](https://travis-ci.org/jaenmedina/slugifier)

A simple php library to generate slugs.


Version
----

0.3.1


Install with composer
--------------

Add the package dependency jaenmedina/slugifier in your composer.json
```sh
{
    "require": {
        "jaenmedina/slugifier": "0.3.1"
    }
}
```


How to use?
--------------

Just instantiate the Slugifier class and call the slugify method. For example:

```sh
$slugifier = new Slugifier();
$slug = $slugifier->slugify("Hello, world!");
echo $slug; // prints "hello-world"
```

If you want to set the separator just use the setSeparator function:
```sh
$slugifier = new Slugifier();
$slugifier->setSeparator("_");
$slug = $slugifier->slugify("Hello, world!");
echo $slug; // prints "hello_world"
```

If you want to exclude certain words from the slug you can use the excludeWords function:

```sh
$slugifier = new Slugifier();
$slugifier->excludeWords(["world", "How", "is"]);
$slug = $slugifier->slugify("Hello, world! How is everybody?");
echo $slug; // prints "hello-everybody"
```

To add specific mapping rules you can use the addRule, addRules and setRules functions:
```sh
$slugifier = new Slugifier();
$slugifier->setRules(["é" => "e"]);
$slugifier->addRule("ñ", "n");
$slugifier->addRules(["ü" => "u"]);
$slug = $slugifier->slugify("Intenté Español Pingüino");
echo $slug; // prints "intente-espanol-pinguino"
```

License
----

MIT

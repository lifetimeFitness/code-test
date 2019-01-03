<?php
require_once('./code/tests.php');

function Program() {

    function test($name) {
        try {
            Tests::$name();
            echo("PASS:" . $name . "\n");
        } catch (Error $ex) {
            echo("FAIL:" . $name . ": " . $ex->getMessage() . "\n");
        }
    }
    
    function main() {
        echo("\nPHP Tests:");
        $r = new ReflectionClass('Tests');
        $names = array_map(function($x) {
            return $x->name;
        }, $r->getMethods(ReflectionMethod::IS_STATIC));
        sort($names);
        foreach ($names as $name) {
            if (substr($name, strlen($name) - 4) == 'Test') {
                test($name);
            }
        }
        echo("Done!");
    }
    main();
}

Program();
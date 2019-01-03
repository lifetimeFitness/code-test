<?php
class Assert {
    static function areEqual($expected, $actual, $failText = null) {
        if ($expected != $actual) {
            $message = strlen("" . $failText) ? $failText : implode('', array("Expected '", $expected, "', but got '", $actual, "'."));
            throw new Error($message);
        }
    }

    static function isTrue($condition, $failText = null) {
        if (!$condition) {
            $message = strlen("" . $failText) ? $failText : "Expected true.";
            throw new Error($message);
        }
    }

    static function isFalse($condition, $failText = null) {
        if ($condition) {
            $message = strlen("" . $failText) ? $failText : "Expected false.";
            throw new Error($message);
        }
    }
    static function isInRange($least, $most, $actual, $failText = null) {
        if ($actual < $least || $actual > $most) {
            $message = strlen("" . $failText) ? $failText : "Expected " . $least . " to " . $most . ", but got " . $actual . ".";
            throw new Error($message);
        }
    }
}
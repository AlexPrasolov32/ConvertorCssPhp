<?php
function option2(array $cssArray): array
{
    $sortedCSSArray = [];
    foreach ($cssArray as $selector => $properties) {
        sort($properties);
        $sortedCSSArray[$selector] = $properties;
    }
    return $sortedCSSArray;
}
function  option3(array $cssArray): array {
    $uppercasedCSSArray = [];
    foreach ($cssArray as $selector => $properties) {
        $uppercasedProperties = array_map('strtoupper', $properties);
        $uppercasedCSSArray[$selector] = $uppercasedProperties;
    }
    return $uppercasedCSSArray;
}
function option4(array $cssArray): array {
    $lowercasedCSSArray = [];
    foreach ($cssArray as $selector => $properties) {
        $lowercasedProperties = array_map('strtolower', $properties);
        $lowercasedCSSArray[$selector] = $lowercasedProperties;
    }
    return $lowercasedCSSArray;
}
function notOption1(array $cssArray): string {
    $cssString = "";
    foreach ($cssArray as $selector => $properties) {
        $cssString .= "$selector {\n";
        foreach ($properties as $property) {
            $cssString .= "    $property;\n";
        }
        $cssString .= "}\n\n";
    }

    return $cssString;
}

function option1(array $cssArray): string {
    $cssString = "";

    foreach ($cssArray as $selector => $properties) {
        $cssString .= "$selector {";
        foreach ($properties as $property) {
            $cssString .= "$property;";
        }
        $cssString .= "}";
    }
    return rtrim($cssString);
}





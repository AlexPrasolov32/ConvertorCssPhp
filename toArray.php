<?php
function toArray(string $cssString): array {
    $cssString = preg_replace('!/\*.*?\*/!s', '', $cssString);
    $cssString = trim($cssString);
    $cssArray = [];
    if (str_contains($cssString, '}')) {
        if (str_contains($cssString, '{')) {
            if (str_contains($cssString, ';')) {
                $rules = explode('}', $cssString);
                foreach ($rules as $rule) {
                    $rule = trim($rule);
                    if (empty($rule)) {
                        continue;
                    }
                    [$selector, $properties] = explode('{', $rule, 2);
                    $selector = trim($selector);
                    $properties = trim($properties);
                    $propertiesArray = array_map('trim', explode(';', $properties));
                    $propertiesArray = array_filter($propertiesArray);
                    $cssArray[$selector] = $propertiesArray;
                }
            }else{return [];}
        }else{return [];}
    }else{return [];}
    return $cssArray;
}

function readCSSFile(array $file): ?string {
    $tmpFilePath = $file['tmp_name'];
    $contents = file_get_contents($tmpFilePath);
    if ($contents === false) {
        return null;
    }
    return $contents;
}

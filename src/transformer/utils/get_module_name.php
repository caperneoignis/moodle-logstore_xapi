<?php

namespace src\transformer\utils;

function get_module_name(array $config, $module_type, $module) {
    $name = '';
    if (property_exists($module, 'name')) {
        $name = $module->name;
    } else if (property_exists($module_type, 'name')) {
        $name = $module_type->name;
    }
    // If name has still not been set, then use event functions, and set that as name to avoid error.
    if ($name == '' && array_key_exists('event_function', $config)) {
        $event_function = explode('\\', $config['event_function']);
        $name = end( $event_function);
        $name = str_replace('_', ' ', $name);
    }

    return $name;
}
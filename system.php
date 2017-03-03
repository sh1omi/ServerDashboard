<?php
class System {
    private $plugins = array();
    function __get($key) {
        if (array_key_exists($key, $this->plugins))
            return $this->plugins[$key];

        $directory = dirname(__FILE__) . '/plugins';
        require($directory . '/' . strtolower($key) . '.php');

        $name = ucfirst($key);
        if (class_exists($name)) {
            return $this->plugins[strtolower($name)] = new $name;
        }
    }
}
function read($file) {
    return !is_file($file) || !is_readable($file) || !($contents = @file_get_contents($file)) ? FALSE : trim($contents);
}
?>
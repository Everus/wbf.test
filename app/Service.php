<?php


/**
 * Helper class with provide easy access for application wide helpers
 */
class Service
{
    private static $instance = null;

    public function _construct()
    {
        if(self::$instance === null) {
            self::$instance = new Service();
        }
        return self::$instance;
    }

    private $services = array();

    /**
     * @return array
     */
    public function getServices()
    {
        return $this->services;
    }

    /**
     * @param array $services
     */
    public function setServices($services)
    {
        $this->services = $services;
    }

    public function register($name, $service) {
        $this->services[$name] = $service;
    }

    public function get($name) {
        if(isset($this->services[$name])) {
            return $this->services[$name];
        } else {
            throw new Exception('Service not found(name = '.$name.')');
        }
    }
}
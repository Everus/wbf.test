<?php


class Component
{
    /**
     * @var Service
    */
    private $service = null;

    /**
     * @param string
     * @return mixed
    */
    protected function get($name) {
        $this->ensureService();
        return $this->service->get($name);
    }

    private function ensureService()
    {
        if($this->service === null) {
            $this->service = new Service();
        }
    }

}
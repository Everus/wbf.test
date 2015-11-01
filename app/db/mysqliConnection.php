<?php

class mysqliConnection {
    const DEFAULT_PORT = 3306;

    private $host = '';
    private $username = '';
    private $password = '';
    private $database = '';
    private $port = self::DEFAULT_PORT;

    /**
     * @var mysqli
     */
    private $resource;

    function __construct($config)
    {
        $this
            ->applyConfig($config)
            ->connect();
    }

    public function applyConfig($config)
    {
        $this->host = $config['host'];
        $this->username = $config['username'];
        $this->password = $config['password'];
        $this->database = $config['database'];
        $this->port = (isset($config['port'])) ? $config['port'] : self::DEFAULT_PORT;
        return $this;
    }

    public function connect()
    {
        $this->resource = new mysqli(
            $this->host,
            $this->username,
            $this->password,
            $this->database,
            $this->port);
        if($this->resource->connect_errno) {
            throw new Exception('Can\'t connect to  MySQL: (' . $this->resource->connect_errno . ') ' . $this->resource->connect_error);
        }
    }

    /**
     * @param query $query
     * @return query
     */
    public function execute($query)
    {
        $stmt = $this->resource->prepare($query->getQueryString());
        foreach($query->getArguments() as $value) {
            $stmt->bind_param($value['type'], $value['argument']);
        }
        $stmt->execute();
        $result = $stmt->get_result();
        $query
            ->setResult($result->fetch_all())
            ->setAffectedRows($stmt->affected_rows)
            ->setInsertId($this->resource->insert_id);
        $stmt->close();
        $result->close();
        return $query;
    }
}
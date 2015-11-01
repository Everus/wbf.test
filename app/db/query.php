<?php


class query
{
    private $query_string;
    private $arguments;
    private $result;
    private $affected_rows;
    private $insertId;

    /**
     * @return mixed
     */
    public function getInsertId()
    {
        return $this->insertId;
    }

    /**
     * @param mixed $insertId
     * @return query
     */
    public function setInsertId($insertId)
    {
        $this->insertId = $insertId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAffectedRows()
    {
        return $this->affected_rows;
    }

    /**
     * @param mixed $affected_rows
     * @return query
     */
    public function setAffectedRows($affected_rows)
    {
        $this->affected_rows = $affected_rows;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getArguments()
    {
        return $this->arguments;
    }

    /**
     * @param mixed $arguments
     * @return query
     */
    public function setArguments($arguments)
    {
        $this->arguments = $arguments;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @param mixed $result
     * @return query
     */
    public function setResult($result)
    {
        $this->result = $result;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getQueryString()
    {
        return $this->query_string;
    }

    /**
     * @param mixed $query_string
     * @return query
     */
    public function setQueryString($query_string)
    {
        $this->query_string = $query_string;
        return $this;
    }

}
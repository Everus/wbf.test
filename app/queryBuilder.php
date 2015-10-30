<?php

class queryBuilder
{
    private $query = '';
    private $args = array();

    /**
     * @param string
     * @return $this
     */
    public function select($targets)
    {
        $this->query = 'SELECT '.$targets;
        return $this;
    }

    /**
     * @param string
     * @return queryBuilder
     */
    public function from($table)
    {
        $this->query .= ' FROM '.$table;
        return $this;
    }

    /**
     * @param string $condition
     * @param string $argument
     * @return $this
     */
    public function where($condition, $argument = '')
    {
        $this->query .= ' WHERE '.$condition;
        if(!is_null($argument)) {
            $this->args[] = $argument;
        }
        return $this;
    }

    /**
     * @param string $condition
     * @param mixed $argument
     * @return $this
     */
    public function andWhere($condition, $argument = null)
    {
        $this->query .= ' AND '.$condition;
        if(!is_null($argument)) {
            $this->args[] = $argument;
        }
        return $this;
    }

    /**
     * @param string $condition
     * @param mixed $argument
     * @return $this
     */
    public function orWhere($condition, $argument = null)
    {
        $this->query .= ' OR '.$condition;
        if(!is_null($argument)) {
            $this->args[] = $argument;
        }
        return $this;
    }

    /**
     * @return query
     */
    public function getQuery()
    {
        $query = new query();
        $query->setArguments($this->args);
        $query->setQueryString($this->query);
        return $query;
    }


}
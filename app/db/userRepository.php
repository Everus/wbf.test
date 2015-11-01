<?php


class userRepository extends Component
{
    private $connection;
    /**
     * @var user[]
     */
    private $persisted = array();

    /**
     * userRepository constructor.
     * @param $connection
     */
    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    /**
     * @param int
     * @return bool|user
     */
    public function findById($id) {
        $queryBuilder = new queryBuilder();
        $query = $queryBuilder
            ->select('user')
            ->from('users')
            ->where('id = ', $id)
            ->limit(1)
            ->getQuery();
        $data = $this->connection->execute($query);
        if($data) {
            $user = new user();
            $user->fromArray($data);
            return $user;
        }
        return false;
    }

    /**
     * @param user
     * @return $this
     */
    public function persist($user) {
        $this->persisted[] = $user;
        return $this;
    }


    /**
     * @param user
     * @return $this
     */
    public function delete($user) {
        $queryBuilder = new queryBuilder();
        $query = $queryBuilder
            ->delete('user')
            ->where('id = ', $user->getId());
        $this->connection->execute($query);
        return $this;
    }

    public function flush() {
        foreach($this->persisted as $user) {
            if($user->getId()) {
                $this->update($user);
            } else {
                $this->insert($user);
            }
        }
    }
}
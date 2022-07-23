<?php
namespace Lib\Db;

class SQLiteConnect {
    const PATH_TO_DB_FILE = __DIR__."/../../guest_book.sqlite";
    private $db;

    function createDb() {
        $db = new \PDO("sqlite:".self::PATH_TO_DB_FILE);
        $db->exec("CREATE TABLE `guest_book` (
                            `id` INTEGER PRIMARY KEY NOT NULL,
                            `dtime` DATETIME NOT NULL,
                            `name` VARCHAR(255) NOT NULL,
                            `email` VARCHAR(255) NOT NULL,
                            `body` TEXT NOT NULL
                            );");
    }

    function __construct() {
        if(!file_exists(self::PATH_TO_DB_FILE)) {
            $this->createDb();
        }
        $this->setDb( new \PDO("sqlite:".self::PATH_TO_DB_FILE));
    }

    public function getDb(): \PDO {
        return $this->db;
    }

    private function setDb(\PDO $db) {
        $this->db = $db;
    }


}
<?php
namespace Lib\Mvc\Model;

class GuestBook extends Entity {
    /**
     * @throws \Exception
     */
    function getList(array $params): \PDOStatement {
        $select = $this->getSelect($params);
        $where = $this->getWhere($params);
        $limit = $this->getLimit($params);
        $addition = "";
        if($where) {
            $addition = " ".$where;
        }
        $addition.= "ORDER BY id DESC";
        if($limit) {
            $addition .= " ". $limit;
        }
        $sqlQuery = "SELECT $select FROM guest_book $addition;";
        $sth = $this->db->prepare($sqlQuery);
        $sth->execute();
        return $sth;
    }

    public function add(array $fields) {
        $qry = $this->db->prepare('INSERT INTO guest_book ( dtime, name, email, body)  VALUES (?, ?, ?, ?)');
        $affectedRowsNumber = $qry->execute(array( date("Y-m-d H:i:s"), $fields["name"], $fields["email"], $fields["body"]));
        return $affectedRowsNumber > 0;
    }
}
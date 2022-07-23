<?php
namespace Lib\Mvc\Model;
abstract class Entity {

    protected $db;

    function __construct() {
        $dbConnect = new \Lib\Db\SQLiteConnect();
        $this->db = $dbConnect->getDb();
    }

    protected function getLimit(array $params): string {
        $limit = "";
        if(!empty($params["limit"]) && $params["limit"] > 0) {
            $params["limit"] = abs((int)$params["limit"]);
            $limit = "LIMIT {$params["limit"]}";
        }
        return $limit;
    }

    protected function getSelect(array $params): string {
        $stringSelect = "*";
        if(!empty($params["select"]) && is_array($params["select"])) {
            $stringSelect = " ";
            foreach ($params["select"] as $param) {
                $stringSelect .= " '$param', ";
            }
            $stringSelect = rtrim($stringSelect, ", ");
        }
        return $stringSelect;
    }

    /**
     * @throws \Exception
     */
    protected function getWhere(array $params): string{
        $where = "";
        if(!empty($params["filter"]) && is_array($params["filter"])) {
            $where .= " WHERE ";
            foreach ($params["filter"] as $key => $filter) {
                $where.=" '$key'='$filter' AND";
            }
            $where = rtrim($where, " AND");
        } elseif(!empty($params["filter"]) ) {
            throw new \Exception("параметр filter должен быть массивом");
        }
        return $where;
    }

}
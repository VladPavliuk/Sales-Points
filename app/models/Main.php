<?php

class Main
{
    /**
     * Return all items
     *
     * @return array
     */
    public function getAllItems()
    {
        $db = DataBase::connect();

        $queryResult = $db->query("SELECT * FROM `table_name`");

        $itemsList = [];
        $i = 0;
        while($row = $queryResult->fetch()) {
            $itemsList[$i]["first_row"] = $row[$i]["first_row_in_db"];
            $itemsList[$i]["second_row"] = $row[$i]["second_row_in_db"];
            $itemsList[$i]["third_row"] = $row[$i]["third_row_in_db"];
        }

        return $itemsList;
    }

    /**
     * Return single item
     *
     * @param $id
     * @return mixed
     */
    public function getSingleItem($id)
    {
        $id = intval($id);

        $db = DataBase::connect();

        $queryResult = $db->query("SELECT * FROM `table_name` WHERE id=`{$id}`");

        $singleItem = $queryResult->fetch();

        return $singleItem;
    }
}
<?php

namespace application\models;

use application\core\Model;

class DataCollection extends Model
{
    public function increaseCounter($bookId, $counterName)
    {
        $this->db->query("UPDATE books SET $counterName = $counterName + 1 WHERE id=$bookId");
    }

}
<?php

class Pagination
{

    static function paginate()
    {

        $start = @$_GET['start'];
        $limit = @$_GET['limit'];

        if (!isset($start) || $start == '') {
            $start = 0;
        }

        if (!isset($limit) || $limit == '') {
            $limit = 10;
        }

        return $start . ',' . $limit;
    }
}

?>
<?php declare(strict_types=1);

namespace App;

final class SqlInject
{
    public function run()
    {
        $name = $_POST['name'];
        $sql = 'SELECT * FROM users';

        // before
        $where = "WHERE name = $name";

        mysql_query($sql.$where);
    }
}

// prevent sql injection - @todo craete ste
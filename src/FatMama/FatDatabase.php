<?php declare(strict_types=1);

namespace App\FatMama;

final class FatDatabase
{
    public function save($object)
    {
        file_put_contents('db.txt', $object);
        // save object
    }
}

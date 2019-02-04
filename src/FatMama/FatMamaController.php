<?php declare(strict_types=1);

namespace App\FatMama;

// code-quality
// dead-code
use App\FatMama\Entity\FatProduct;

final class FatMamaController
{
    public function defaultAction()
    {
        $name = 'cake';
        $product = new FatProduct();
        $name = 'extra-fat-cake';
        $product->setName($name);

        $fatDatabase = new FatDatabase();
        $fatDatabase->save($product);
    }

    public function detailAction($productName)
    {
        $product = ($productName !== 'php-cake') ? $productName : 'php-cake';

        echo 'detail';

        return $product;
    }
}

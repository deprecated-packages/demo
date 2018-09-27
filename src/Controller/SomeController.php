<?php declare(strict_types=1);

namespace App\Controler;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

final class SomeController extends Controller
{
    public function demo()
    {
        $someService = $this->get('some_demo_service');
        $someData = $someService->someMethod();
        // render $someData etc.
    }
}

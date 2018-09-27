<?php declare(strict_types=1);

namespace App\Form;

use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\FormBuilderInterface;

final class SomeForm extends FormType
{
    public function buildForm(FormBuilderInterface $formBuilder, array $options)
    {
        $formBuilder->add('task', 'form.type.text');

        // not just a string, but specific type
        $variable = 'form.type.text';

        return $formBuilder;
    }
}

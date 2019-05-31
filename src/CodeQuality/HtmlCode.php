<?php declare(strict_types=1);

namespace App\CodeQuality;

// code-quality
final class HtmlCode
{
    public function someMethod()
    {
        if ('show_html') { ?> Let me <br> this <strong>piece</strong> of code ! <?php }
        $value = 125;
        return $value;
    }
}

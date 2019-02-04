# Rector Demo

[![Build Status](https://img.shields.io/travis/rectorphp/demo/master.svg?style=flat-square)](https://travis-ci.org/rectorphp/demo)

## Install

```bash
git clone <forked> https://github.com/rectorphp/demo.git
cd demo
composer install
```

## How to Run?

```bash
# case 1 - @todo PHP code diff
# Rector\Symfony\Rector\FrameworkBundle\GetToConstructorInjectionRector: ~
vendor/bin/rector process src/Controller --dry-run
vendor/bin/rector process src/Controller --with-style

# case 2 - Symfony
# case 1 - @todo PHP code diff
Rector\Symfony\Rector\Form\StringFormTypeToClassRector: ~
# vendor/bin/rector process src/Form --dry-run
# vendor/bin/rector process src/Form --with-style

# case 3 - PHPUnit
# case 1 - @todo PHP code diff
# vendor/bin/rector process tests --level phpunit60 --dry-run
# vendor/bin/rector process tests --level phpunit60 --with-style

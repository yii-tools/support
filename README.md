<p align="center">
    <a href="https://github.com/yii-tools/support" target="_blank">
        <img src="https://avatars.githubusercontent.com/u/121752654?s=200&v=4" height="100px">
    </a>
    <h1 align="center">Support.</h1>
    <br>
</p>

### Install

```shell
composer require yii-tools/support
```

### Composer require checker

This package uses [composer-require-checker](https://github.com/maglnet/ComposerRequireChecker) to check if all dependencies are correctly defined in `composer.json`.

To run the checker, execute the following command:

```shell
./vendor/bin/composer-require-checker
```

### Mutation testing

Mutation testing is checked with [Infection](https://infection.github.io/). To run it:

```shell
./vendor/bin/roave-infection-static-analysis-plugin
```

### Unit testing

Unit testing is checked with [PHPUnit](https://phpunit.de/). To run it:

```shell
./vendor/bin/phpunit
```

### Static analysis

Static analysis is checked with [Psalm](https://psalm.dev/). To run it:

```shell
./vendor/bin/psalm
```

### CI status

[![build](https://github.com/yii-tools/support/actions/workflows/build.yml/badge.svg)](https://github.com/yii-tools/support/actions/workflows/build.yml)
[![codecov](https://codecov.io/gh/yii-tools/support/branch/main/graph/badge.svg?token=CEBVCYZNQK)](https://codecov.io/gh/yii-tools/support)
[![Mutation testing badge](https://img.shields.io/endpoint?style=flat&url=https%3A%2F%2Fbadge-api.stryker-mutator.io%2Fgithub.com%2Fyii-tools%2Fsupport%2Fmain)](https://dashboard.stryker-mutator.io/reports/github.com/yii-tools/support/main)
[![static analysis](https://github.com/yii-tools/support/actions/workflows/static.yml/badge.svg)](https://github.com/yii-tools/support/actions/workflows/static.yml)
[![type-coverage](https://shepherd.dev/github/yii-tools/support/coverage.svg)](https://shepherd.dev/github/yiii-tools/support)
[![StyleCI](https://github.styleci.io/repos/584864695/shield?branch=main)](https://github.styleci.io/repos/584864695?branch=main)

### License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

### Our social networks

[![Twitter](https://img.shields.io/badge/twitter-follow-1DA1F2?logo=twitter&logoColor=1DA1F2&labelColor=555555?style=flat)](https://twitter.com/Terabytesoftw)

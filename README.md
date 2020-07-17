# Sazzy

This project was created by, and is maintained by [Brian Faust](https://github.com/faustbrian), and provides the starting point for your next software as a service.

## About Sazzy

Sazzy is a boilerplate for software as a service (SaaS) applications that want to hit the ground running fast. The major difference to [Laravel Spark](https://spark.laravel.com/) is that it doesn't lock you in to specific tooling or ways of doing things by only providing the bare-minimum you need to save you hours of work to setup teams, billing and settings.

Out of the box features are kept to a bare-minimum that are required by almost every SaaS to make it as easy and as fast as possible for you to get started with your next idea. Everything you will find in this boilerplate is stock Laravel or uses high-quality packages from folks like [Livewire](https://laravel-livewire.com/), [Spatie](https://github.com/spatie), [Tailwind CSS](https://tailwindcss.com/) and [Tailwind UI](https://tailwindui.com/).

The goal of Sazzy is to not stand in your way and to achieve this it will only ship with a small set of features. This means that feature requests are generally rejected unless it is something that benefits the 80% use-case.

## Notes

Certain parts of the boilerplate require you to own licenses for fonts or packages unless you decide to remove them. Below you can find a list of those and where to purchase them.

-   [Gilroy](https://www.myfonts.com/fonts/radomir-tinkov/gilroy/) or [TT Norms Pro](https://www.myfonts.com/fonts/type-type/tt-norms)
-   [ipapi](https://ipapi.com/)
-   [Laravel Nova](https://nova.laravel.com/)
-   [Tailwind UI](https://tailwindui.com/)

## Features

-   Teams with name, photo and collaborators
-   Laravel Cashier for Stripe Billing & Customer Portal
-   GDPR Compliant by providing a way to export personal data
-   Two-Factor Authentication ready out of the box
-   Affiliate Program for referrals and users
-   Personal Access Token management for users
-   Many more standard feaures you would expect any SaaS to have

## Installation

```bash
git clone git@github.com:faustbrian/sazzy.git
cd sazzy
composer install
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover a security vulnerability within this package, please send an e-mail to hello@kodekeep.com. All security vulnerabilities will be promptly addressed.

## Credits

This project exists thanks to all the people who [contribute](../../contributors).

## License

Sazzy is an open-sourced software licensed under the [MPL-2.0](LICENSE.md).

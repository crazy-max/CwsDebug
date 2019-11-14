[![Latest Stable Version](https://img.shields.io/packagist/v/crazy-max/cws-debug.svg?style=flat-square)](https://packagist.org/packages/crazy-max/cws-debug)
[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%205.3.0-8892BF.svg?style=flat-square)](https://php.net/)
[![Build Status](https://img.shields.io/travis/com/crazy-max/CwsDebug/master.svg?style=flat-square)](https://travis-ci.com/crazy-max/CwsDebug)
[![Code Quality](https://img.shields.io/codacy/grade/cce545430ecf4066982713bdf91d59e1.svg?style=flat-square)](https://www.codacy.com/app/crazy-max/CwsDebug)
[![Become a sponsor](https://img.shields.io/badge/sponsor-crazy--max-181717.svg?logo=github&style=flat-square)](https://github.com/sponsors/crazy-max)
[![Donate Paypal](https://img.shields.io/badge/donate-paypal-00457c.svg?logo=paypal&style=flat-square)](https://www.paypal.me/crazyws)

## :warning: Abandoned project

This project is not maintained anymore and is abandoned. Feel free to fork and make your own changes if needed.

Thanks to everyone for their valuable feedback and contributions.

## About

PHP class to output additional messages for debug.

## Installation

```bash
composer require crazy-max/cws-debug
```

And download the code:

```bash
composer install # or update
```

## Getting started

See `tests/test.php` file sample to help you.

## Example

![](.res/example.png)

## Methods

**simple** - Output a message.<br />
**error** - Output error message.<br />
**dump** - Output a variable dump.<br />
**labelValue** - Output a value associated to a label.<br />
**titleH1** - Output title H1.<br />
**titleH2** - Output title H2.<br />
**titleH3** - Output title H3.<br />

**isQuietVerbose** - Check if verbose is quiet<br />
**setQuietVerbose** - Quiet verbose output : no output at all (default)<br />
**isSimpleVerbose** - Check if verbose is simple<br />
**setSimpleVerbose** - Simple verbose output : only output simple report<br />
**isReportVerbose** - Check if verbose is report<br />
**setReportVerbose** - Report verbose output : output a detail report<br />
**isDebugVerbose** - Check if verbose is debug<br />
**setDebugVerbose** - Debug verbose output : output detail report as well as debug info<br />
**setEchoMode** - Echo output mode (default)<br />
**setFileMode** - File output mode<br />

## How can I help ?

All kinds of contributions are welcome :raised_hands:! The most basic way to show your support is to star :star2: the project, or to raise issues :speech_balloon: You can also support this project by [**becoming a sponsor on GitHub**](https://github.com/sponsors/crazy-max) :clap: or by making a [Paypal donation](https://www.paypal.me/crazyws) to ensure this journey continues indefinitely! :rocket:

Thanks again for your support, it is much appreciated! :pray:

## License

MIT. See `LICENSE` for more details.

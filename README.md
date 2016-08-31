[![Latest Stable Version](https://img.shields.io/packagist/v/crazy-max/cws-debug.svg?style=flat-square)](https://packagist.org/packages/crazy-max/cws-debug)
[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%205.3.0-8892BF.svg?style=flat-square)](https://php.net/)
[![Build Status](https://img.shields.io/travis/crazy-max/CwsDebug/master.svg?style=flat-square)](https://travis-ci.org/crazy-max/CwsDebug)
[![Scrutinizer Code Quality](https://img.shields.io/scrutinizer/g/crazy-max/CwsDebug.svg?style=flat-square)](https://scrutinizer-ci.com/g/crazy-max/CwsDebug)
[![Gemnasium](https://img.shields.io/gemnasium/crazy-max/CwsDebug.svg?style=flat-square)](https://gemnasium.com/github.com/crazy-max/CwsDebug)

# CwsDebug

PHP class to output additional messages for debug.

## Requirements

* PHP >= 5.3.0
* CwsDump >= 1.5

## Installation with Composer

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

![](https://raw.github.com/crazy-max/CwsDebug/master/example.png)

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

## License

LGPL. See ``LICENSE`` for more details.

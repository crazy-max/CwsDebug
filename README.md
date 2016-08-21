[![Build Status](https://travis-ci.org/crazy-max/CwsDebug.svg?branch=master)](https://travis-ci.org/crazy-max/CwsDebug) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/crazy-max/CwsDebug/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/crazy-max/CwsDebug/?branch=master)

# CwsDebug

PHP class to output additional messages for debug.

## Requirements

* PHP >= 5.3
* CwsDump >= 1.5

## Installation with Composer

```bash
composer require crazy-max/CwsDebug
```

And download the code:

```bash
composer install # or update
```

## Getting started

See ``tests/test.php`` file sample to help you.

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

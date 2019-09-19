---
pagetitle:  MauticRecaptcha
title:      Mautic reCAPTCHA plugin
description: This plugin brings reCAPTCHA integration to Mautic.
author: |
    name:   Konstantin Scheumann
    email:  info@konstantin.codes
date-meta:  2019-09-19
version:    1.1.3
published:  2018-09-14
copyright:  2018 Konstantin Scheumann. All rights reserved
license:    GNU/GPLv3 <http://www.gnu.org/licenses/gpl-3.0.html>
link:       <https://mautic.org>
link:       <https://github.com/KonstantinCodes/mautic-recaptcha>
---
# Mautic reCAPTCHA Plugin

[![license](https://img.shields.io/circleci/project/github/KonstantinCodes/mautic-recaptcha.svg)](https://circleci.com/gh/KonstantinCodes/mautic-recaptcha/tree/master) [![license](https://img.shields.io/packagist/v/koco/mautic-recaptcha-bundle.svg)](https://packagist.org/packages/koco/mautic-recaptcha-bundle)
[![Packagist](https://img.shields.io/packagist/l/koco/mautic-recaptcha-bundle.svg)](LICENSE) [![mautic](https://img.shields.io/badge/mautic-%3E%3D%202.11-blue.svg)](https://www.mautic.org/mixin/recaptcha/)

This Plugin brings [reCAPTCHA] (v2 Checkbox) integration to [Mautic] 2.11 and newer.

Ideas and suggestions are welcome, feel free to create an issue or PR on [Github][repo].

## Installation

In the main directory of your [Mautic] installation:

### via `composer` (preferred)

Execute `composer require koco/mautic-recaptcha-bundle`.

### via `git clone`

Create a shallow clone directly into the `plugins/` directory.

```bash
sudo -Hu www-data git clone --depth 1 \
  https://github.com/virgilwashere/mautic-recaptcha.git plugins/MauticRecaptchaBundle
pushd plugins/MauticRecaptchaBundle
sudo -Hu www-data git remote add upstream https://github.com/KonstantinCodes/mautic-recaptcha.git
popd

sudo -Hu www-data php app/console cache:clear
sudo -Hu www-data php app/console mautic:plugins:install
```

### via `.zip` archive

<!-- Download the [master.zip](https://github.com/KonstantinCodes/mautic-recaptcha/archive/master.zip), extract it into the `plugins/` directory and rename the new directory `MauticRecaptchaBundle` -->
Download the [master.zip](archive/master.zip), extract it into the `plugins/` directory and rename the new directory `MauticRecaptchaBundle`

<!-- wget -O https://github.com/KonstantinCodes/mautic-recaptcha/archive/master.zip -->
```bash
pushd ${TMPDIR:=$(mktemp -d)}
wget -O https://github.com/virgilwashere/mautic-recaptcha/archive/master.zip
popd
sudo -Hu www-data unzip "${TMPDIR}/master.zip" -d plugins/MauticRecaptchaBundle

sudo -Hu www-data php app/console cache:clear
sudo -Hu www-data php app/console mautic:plugins:install
```

## Configuration

### Google Developer resources

![Google logo](https://www.google.com/recaptcha/intro/assets/google_logo_160x56_2x.png) [reCAPTCHA]

- reCAPTCHA [Documentation]
- Open the [reCAPTCHA Admin Console][admin] generate keys for your Mautic installation.

[Documentation]: <https://developers.google.com/recaptcha/docs/versions>
[admin]: <https://g.co/recaptcha/admin>

### Mautic configuration

<!-- markdownlint-disable MD033 -->
Navigate to the Mautic Plugins<sup id="a1">[1](#f1)</sup> page.
<!-- markdownlint-enable MD033 -->

You should now see a *`reCAPTCHA`* plugin. Open it to save your `site_key` and `secret_key`.

![plugin config](/doc/config.png?raw=true "plugin config")

## Usage in Mautic Forms

Add a *`reCAPTCHA`* field to the Form and save changes.
![mautic form](/doc/form_preview.png?raw=true "Mautic Form with reCAPTCHA")

## License

Licensed under [GNU General Public License v3.0](LICENSE).

[upstream]: <https://github.com/KonstantinCodes/mautic-recaptcha>
[repo]: <https://github.com/virgilwashere/mautic-recaptcha>
[Mautic]: <https://mautic.org>
[reCAPTCHA]: <https://www.google.com/recaptcha>

<!-- markdownlint-disable MD033 -->
1. <small id="f1">via the Admin menu accessible through the cogwheel in upper right hand side of Mautic</small> [↩](#a1)
<!-- markdownlint-enable MD033 -->

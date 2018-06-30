<p align="center">
  <img src="https://cdn.rawgit.com/mister-bk/craft-plugin-mix/master/resources/img/craft-mix-logo.svg" alt="Craft Mix Logo">
</p>

<p align="center">
  Helper plugin for <a href="https://github.com/JeffreyWay/laravel-mix/">Laravel Mix</a> in <a href="https://github.com/craftcms/cms/">Craft CMS</a> templates.
</p>

<p align="center">
  <a href="https://packagist.org/packages/misterbk/mix">
    <img src="https://poser.pugx.org/misterbk/mix/d/total.svg" alt="Total Downloads">
  </a>
  <a href="https://packagist.org/packages/misterbk/mix">
    <img src="https://poser.pugx.org/misterbk/mix/v/stable.svg" alt="Latest Stable Version">
  </a>
  <a href="https://packagist.org/packages/misterbk/mix">
    <img src="https://poser.pugx.org/misterbk/mix/license.svg" alt="License">
  </a>
</p>

## Requirements

This plugin requires Craft CMS 3.0.0-RC1 or later.

## Installation

To install the plugin, follow these instructions.

1. Open your terminal and go to your Craft project:
```bash
cd /path/to/project
```

2. Then tell Composer to load the plugin:
```bash
composer require misterbk/mix
```

3. In the Craft Control Panel, go to Settings → Plugins and click the "Install" button for **Mix**.

## Configuration

To configure Mix go to Settings → Plugins → Mix in the Craft Control Panel.

The available settings are:

  * **Public Path** - The path of the public directory containing the index.php
  * **Asset Path** - The path of the asset directory where Laravel Mix stores the compiled files

> **NOTE:** Both **Public Path** and **Asset Path** get trimmed to allow all kind of path combinations.
>  * `/web/` + `/assets/` → `/web/assets/`
>  * `web` + `assets` → `/web/assets/`
>  * `/` + `assets` → `/assets/`
>  * `/web` + `/` → `/web/`

## Usage

Find a versioned CSS file.
```twig
<link rel="stylesheet" href="{{ mix('css/main.css') }}">
```

Find a versioned JavaScript file.
```twig
<script src="{{ mix('js/main.js') }}"></script>
```

Lazily find a versioned file and build the tag based on the file extension.
```twig
{{ craft.mix.withTag('js/main.js') | raw }}
```

Alternatively include the content of a versioned file inline.
```twig
{{ craft.mix.withTag('css/main.css', true) | raw }}
```

## License

Craft Mix is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT/).

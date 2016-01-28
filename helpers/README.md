# Helpers

## Debug ##

To use the library, you must add to your project [Tan5en5/codeigniter-debugbar](https://github.com/Tan5en5/codeigniter-debugbar). You must follow the installation instructions in the repository

Enable Composer (locate in application/config/config.php) :

```php
$config['composer_autoload'] = FCPATH.'vendor/autoload.php';
```

**use**

```php
$this->load->helper('debug_helper');
debug_bar();
```

<br><br>

## Detect Agent ##

Helper to facilitate the use of library user agent

**use**

```php
$this->load->helper('detect_agent');
$agent = detect_agent();
print_r($agent);
```

<br><br>

## Path ##

Create default routes for images, css and js

**use**

```php
// Controller
$this->load->helper('path');

// View
<link rel="stylesheet" href="<?php echo css_url('example.css'); ?>">
```

<br><br>

# Helpers

## Debug Helper ##


**use**

To use the library, you must add to your project [Tan5en5/codeigniter-debugbar](https://github.com/Tan5en5/codeigniter-debugbar). You must follow the installation instructions in the repository

Enable Composer (locate in application/config/config.php) :

```php
$config['composer_autoload'] = FCPATH.'vendor/autoload.php';
```

Load in controller

```php
$this->load->helper('detect_agent');
```

Example

```php
$this->load->helper('debug_helper');
debug_bar();
```

<br><br>

## Detect Agent Helper ##

Helper to facilitate the use of library user agent

**use**

Load in controller

```php
$this->load->helper('detect_agent');
```

Example

```php
$agent = detect_agent();
print_r($agent);
```

<br><br>

## Fields Helper ##

Convert a field, usually the occupied to see a particular record

**Use**

Load in controller

```php
$this->load->helper('fields_helper');
```

Example

```php
<?php echo field_to_string($user->fullname, 'Name'); ?>
```

```php
<?php echo field_to_image($user->avatar, 'public/images/administrator/'); ?>
```

```php
<?php echo field_to_yes_or_not($user->enabled, 'Enabled'); ?>
```

```php
<?php echo field_to_status($user->status, 'Status'); ?>
```

```php
<?php echo field_to_custom($user->response, 'Response', array(null => 'Unanswered', 0 => 'Unanswered', 1 => 'Accepted', 2 => 'Rejected')); ?>
```

```php
<?php echo field_to_unchanged($user->lessons, 'Total Lessons'); ?>
```

<br><br>

## Grocery Helper ##

Work with Grocery Crud

**Use**

Load in controller

```php
$this->load->helper('grocery_helper');
```

Example

```php
$this->gc = new grocery_CRUD();
$this->table_name   =   'clients';
$this->title        =   'Clients';
$this->fields_name  =   array(
    'id'                =>  'Id',
    'email'             =>  'Email',
    'password_hash'     =>  'Password',
    'password_salt'     =>  'Salt',
    'enabled'           =>  'Status',
    'created_at'        =>  'Created At',
    'updated_at'        =>  'Updated_at'
);
        
$this->gc =	gc_general($this->table_name, $this->title);
$this->gc = gc_display($this->gc, $this->fields_name);

$output         =   $this->gc->render();
$output->gc_js  =   gc_js($output->js_files);
$output->gc_css =   gc_css($output->css_files);

$this->load->view('my_view', $output);
```

<br><br>

## Path Helper ##

Create default routes for images, css and js

1. css path: /public/css/
1. js path: /public/js/
1. image path: /public/img/

**use**

Load in controller

```php
$this->load->helper('path');
```

Example

```php
<link rel="stylesheet" href="<?php echo css_url('example.css'); ?>">
```

```php
<script type="text/javascript" src="<?php echo js_url('example.js'); ?>"></script>
```

```php
<img src="<?php echo img_url('example.jpg'); ?>" alt="Image Alt">
```

<br><br>

## Site Helper ##

Different types of helper

**use**

Load in controller

```php
$this->load->helper('site_helper');
```

Example

```php
is_ajax()
```

<br><br>

## Time Helper ##

Working with datetime, date and times

**use**

Load in controller

```php
$this->load->helper('time_helper');
```

Example

```php
chilean_datetime_change_format($datetime);
```

```php
date_change_format($date);
```

```php
set_now(1);
```

```php
calculate_diff($user->created_at);
```

<br><br>


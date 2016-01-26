# Helpers

## Detect Agent ##

Helper to facilitate the use of library user agent

**use**

    $this->load->helper('detect_agent');
    $agent = detect_agent();
    print_r($agent);

<br><br>

## Path ##

Create default routes for images, css and js

**use**

    // Controller
    $this->load->helper('path');

    // View
    <link rel="stylesheet" href="<?php echo css_url('example.css'); ?>">

<br><br>

# Core

## MY_Loader ##

This implementation causes:

1. Reroute views _/application/views_ to _/public/views/<controller_name>_
2. Permit called a layout

**use**

    // Example with controller Welcome
    $this->load->view('test');  // Load /public/views/welcome/test.php
    $this->load->layout('frontend');  // Load /public/views/layouts/frontend.php

<br><br>

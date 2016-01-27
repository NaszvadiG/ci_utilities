# Libraries

## Mailer ##

Library to facilitate sending SMTP email using native library of CodeIgniter

**use**

    // Controller
    $mail['to']         =   'email@to.com';
    $mail['subject']    =   'my subject';
    $mail['data']       =   [];

    // If you're using "MY_Loader", you can use $ this->load->email,
    // otherwise you have to use $this->load->view
    $mail['message']    =   $this->load->email('test_mail', $mail['data'], true);
    //$mail['message']    =   $this->load->view('test_mail', $mail['data'], true);

    $this->load->library('mailer');
    $this->mailer->smtp_html($mail);

    // Mailer
    // You must place your right values to the following
    private $senderName		=	'My Name';
    private $senderEmail	=	'me@domain.com';
    private $senderUser		=	'user@main.com';
    private $senderPass		=	'my_pass';
    private $senderHost		=	'my_email_host';
    private $senderPort   = 465;
    private $senderCrypt  = 'ssl';

<br><br>

## QR ##

Library to facilitate the generation of a QR code

To use the library, you must add add to your project [Bacon/BaconQrCode](https://github.com/Bacon/BaconQrCode). If you do not know how to add, I recommend installing it through composer, you can follow this [tutorial](https://philsturgeon.uk/php/2012/05/07/composer-with-codeigniter/) and install it by composer

**use**

    $text = 'Hello World';
    $path = './files/qr/'.$text.'.png';
    $this->load->library('qr');
    $genQr = $this->qr->write($text, $path);

<br><br>

## Rut ##

Library to facilitate working with the Chilean rut, allows:

 - Clean (erase points and dash)
 - Validate if dv is correct.
 - Separate rut string, returns an array, position 0 is the rut, in position 1 is dv.

**use**

    $params = ['rut' => '16.893.255-3'];
    $this->load->library('rut', $params);
    var_dump($this->rut);

rut obtained from [here](http://joaquinnunez.cl/jQueryRutPlugin/generador-de-ruts-chilenos-validos.html)

<br><br>

## Uploader ##

Library to facilitate the work of uploading files to the server:

**use**

    $this->load->library('Uploader');
    $path = './files/';
    $upload1 = $this->uploader->upload_image('{name}', $path);

_{name} is the name of the post file_

<br><br>

## Zipper ##

Library to facilitate zip compression

**use**

    $this->load->library('zipper');
    $this->zipper->create(FCPATH.'test.zip', [FCPATH.'index.php']);
    $this->zipper->add(FCPATH.'test.zip', [FCPATH.'readme.rst', FCPATH.'license.txt']);

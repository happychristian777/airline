<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Email COnfiguration
$config['protocol'] = 'smtp';
$config['smtp_host'] = 'mail.findblood.in';

$config['smtp_port'] = 465;
$config["smtp_crypto"] = "ssl";

// $config['smtp_port'] = 587;
// $config["smtp_crypto"] = "tls";


$config['smtp_user'] = 'info@findblood.in';
$config['smtp_pass'] = 'infoblood123456';
$config['mailtype'] = 'html';
$config['smtp_timeout'] = '500';

$config['charset'] = 'iso-8859-1';
$config['wordwrap'] = TRUE;
defined('BASEPATH') OR exit('No direct script access allowed');
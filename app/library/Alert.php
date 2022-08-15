<?php

use Phalcon\Escaper;
use Phalcon\Flash\Direct;

$escaper = new Escaper();
$flash   = new Direct($escaper);

$template = '<span class="%cssClass%">%message%</span>';

$flash->setCustomTemplate($template);
<?php

/** @var  \Herbert\Framework\Application $container */

use AgreableProductPlugin\Hooks\SocialMediaAcf;
use AgreableProductPlugin\Hooks\Krux;

(new SocialMediaAcf)->init();
(new Krux)->init();

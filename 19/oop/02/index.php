<?php

require_once 'payment/Live.php';
require_once 'Fawry/Live.php';
require_once 'VodafoneCash/Live.php';

Payment\Live::new_payment('');
Fawry\Live::new_payment('');
VodafoneCash\Live::new_payment('');


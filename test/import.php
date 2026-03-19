<?php

require_once __DIR__ . '/../config.php';

(new \LuzernTourismus\BulkMail\Builder\RecipientBuilder())
    ->addRecipient(1,'test@test.com |');



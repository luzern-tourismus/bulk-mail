<?php

namespace LuzernTourismus\BulkMail\Script;

use LuzernTourismus\BulkMail\Mail\MailSend;
use Nemundo\App\Script\Type\AbstractConsoleScript;

class MailSendScript extends AbstractConsoleScript
{
    protected function loadScript()
    {
        $this->scriptName = 'mailbulk-mailsend';
    }

    public function run()
    {

        (new MailSend())->send(3);


    }
}
<?php

namespace LuzernTourismus\BulkMail\Script;

use LuzernTourismus\BulkMail\Application\BulkMailApplication;
use Nemundo\App\Script\Type\AbstractConsoleScript;

class CleanScript extends AbstractConsoleScript
{
    protected function loadScript()
    {
        $this->scriptName = 'mailbulk-clean';
    }

    public function run()
    {

        (new BulkMailApplication())->reinstallApp();

    }
}
<?php

namespace LuzernTourismus\BulkMail\Script;

use Nemundo\App\Script\Type\AbstractConsoleScript;

class TestScript extends AbstractConsoleScript
{
    protected function loadScript()
    {
        $this->scriptName = 'mailbulk-test';
    }

    public function run()
    {


    }
}
<?php

namespace LuzernTourismus\BulkMail\Install;

use LuzernTourismus\BulkMail\Data\BulkMailModelCollection;
use LuzernTourismus\BulkMail\Script\CleanScript;
use LuzernTourismus\BulkMail\Script\MailSendScript;
use LuzernTourismus\BulkMail\Script\TestScript;
use LuzernTourismus\BulkMail\Usergroup\BulkMailUsergroup;
use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\User\Setup\UsergroupSetup;

class BulkMailInstall extends AbstractInstall
{
    public function install()
    {

        (new ModelCollectionSetup())
            ->addCollection(new BulkMailModelCollection());

        (new UsergroupSetup())
            ->addUsergroup(new BulkMailUsergroup());

        (new ScriptSetup())
            ->addScript(new MailSendScript())
            ->addScript(new CleanScript())
            ->addScript(new TestScript());

    }
}
<?php

namespace LuzernTourismus\BulkMail\Application;

use LuzernTourismus\BulkMail\Data\BulkMailModelCollection;
use LuzernTourismus\BulkMail\Install\BulkMailInstall;
use LuzernTourismus\BulkMail\Install\BulkMailUninstall;
use LuzernTourismus\BulkMail\Site\BulkMailSite;
use Nemundo\App\Application\Type\AbstractApplication;

class BulkMailApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->application = 'BulkMail';
        $this->applicationId = 'b448652e-c729-4dbb-bd41-ed6d5c816d0e';
        $this->modelCollectionClass = BulkMailModelCollection::class;
        $this->installClass = BulkMailInstall::class;
        $this->uninstallClass = BulkMailUninstall::class;
        $this->appSiteClass=BulkMailSite::class;
    }
}
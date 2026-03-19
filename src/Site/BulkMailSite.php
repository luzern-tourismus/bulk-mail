<?php

namespace LuzernTourismus\BulkMail\Site;

use LuzernTourismus\BulkMail\Page\BulkMailPage;
use LuzernTourismus\BulkMail\Usergroup\BulkMailUsergroup;
use Nemundo\Web\Site\AbstractSite;

class BulkMailSite extends AbstractSite
{

    /**
     * @var BulkMailSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Bulk Mail';
        $this->url = 'bulk-mail';
        $this->restricted = true;
        $this->addRestrictedUsergroup(new BulkMailUsergroup());

        BulkMailSite::$site = $this;

        new MailingSite($this);
        new RecipientSite($this);


    }

    public function loadContent()
    {
        (new BulkMailPage())->render();
    }
}
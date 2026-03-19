<?php

namespace LuzernTourismus\BulkMail\Site;

use LuzernTourismus\BulkMail\Page\MailingItemPage;
use Nemundo\Web\Site\AbstractSite;

class MailingItemSite extends AbstractSite
{

    /**
     * @var MailingItemSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'MailingItem';
        $this->url = 'MailingItem';
        $this->menuActive=false;

        MailingItemSite::$site = $this;

    }

    public function loadContent()
    {
        (new MailingItemPage())->render();
    }
}
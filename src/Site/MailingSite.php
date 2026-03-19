<?php

namespace LuzernTourismus\BulkMail\Site;

use LuzernTourismus\BulkMail\Page\MailingPage;
use Nemundo\Web\Site\AbstractSite;

class MailingSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'Mailing';
        $this->url = 'Mailing';

        new MailingItemSite($this);

    }

    public function loadContent()
    {
        (new MailingPage())->render();
    }
}
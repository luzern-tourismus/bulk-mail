<?php

namespace LuzernTourismus\BulkMail\Com\Tab;

use LuzernTourismus\BulkMail\Site\BulkMailSite;
use Nemundo\Admin\Com\Tab\AdminTab;

class BulkMailTab extends AdminTab
{

    public function getContent()
    {

        $this->site = BulkMailSite::$site;
        return parent::getContent();

    }

}
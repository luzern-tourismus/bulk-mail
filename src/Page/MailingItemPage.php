<?php

namespace LuzernTourismus\BulkMail\Page;

use LuzernTourismus\BulkMail\Com\Tab\BulkMailTab;
use LuzernTourismus\BulkMail\Data\Mailing\MailingReader;
use LuzernTourismus\BulkMail\Parameter\MailingParameter;
use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Com\Template\AbstractTemplateDocument;

class MailingItemPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);
        new BulkMailTab($layout);

        $mailingId = (new MailingParameter())->getValue();
        $mailingRow = (new MailingReader())->getRowById($mailingId);

        $title = new AdminTitle($layout);
        $title->content = $mailingRow->mailing;


        return parent::getContent();
    }
}
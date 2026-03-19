<?php

namespace LuzernTourismus\BulkMail\Page;

use LuzernTourismus\BulkMail\Com\Form\MailingForm;
use LuzernTourismus\BulkMail\Com\Tab\BulkMailTab;
use LuzernTourismus\BulkMail\Data\Mailing\MailingReader;
use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Com\Template\AbstractTemplateDocument;

class BulkMailPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);
        new BulkMailTab($layout);



        return parent::getContent();
    }
}
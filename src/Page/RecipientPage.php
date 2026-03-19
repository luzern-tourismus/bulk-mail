<?php

namespace LuzernTourismus\BulkMail\Page;

use LuzernTourismus\BulkMail\Com\Tab\BulkMailTab;
use LuzernTourismus\BulkMail\Data\Mailing\MailingReader;
use LuzernTourismus\BulkMail\Data\Recipient\RecipientReader;
use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Html\Paragraph\Paragraph;

class RecipientPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);
        new BulkMailTab($layout);

        $p = new Paragraph($layout);

        $table = new AdminTable($layout);


        $reader = new RecipientReader();
        $reader->model->loadMailing();

        $p->content = $reader->getTotalCount().' items found';

        (new AdminTableHeader($table))
            ->addText($reader->model->mailing->label)
            ->addText($reader->model->email->label);

        foreach ($reader->getData() as $mailingRow) {

            (new AdminTableRow($table))
                ->addText($mailingRow->mailing->mailing)
                ->addText($mailingRow->email);

        }



        return parent::getContent();
    }
}
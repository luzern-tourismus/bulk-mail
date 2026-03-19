<?php

namespace LuzernTourismus\BulkMail\Page;

use LuzernTourismus\BulkMail\Com\Form\MailingForm;
use LuzernTourismus\BulkMail\Com\Tab\BulkMailTab;
use LuzernTourismus\BulkMail\Data\Mailing\MailingReader;
use LuzernTourismus\BulkMail\Parameter\MailingParameter;
use LuzernTourismus\BulkMail\Site\MailingItemSite;
use LuzernTourismus\BulkMail\Site\MailingSite;
use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Com\Template\AbstractTemplateDocument;

class MailingPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);
        new BulkMailTab($layout);

        $form = new MailingForm($layout);

        $table = new AdminTable($layout);


        $reader = new MailingReader();

        (new AdminTableHeader($table))
            ->addText($reader->model->id->label)
            ->addText($reader->model->mailing->label)
            ->addText($reader->model->subject->label)
            ->addText($reader->model->text->label)
            ->addText($reader->model->mailFrom->label);

        foreach ($reader->getData() as $mailingRow) {

            $site = clone(MailingItemSite::$site);
            $site->addParameter(new MailingParameter($mailingRow->id));
            $site->title = $mailingRow->mailing;

            (new AdminTableRow($table))
                ->addText($mailingRow->id)
                ->addSite($site)
                //->addText($mailingRow->mailing)
                ->addText($mailingRow->subject)
                ->addText($mailingRow->text)
                ->addText($mailingRow->mailFrom);

        }


        return parent::getContent();
    }
}
<?php

namespace LuzernTourismus\BulkMail\Com\Form;

use LuzernTourismus\BulkMail\Builder\RecipientBuilder;
use LuzernTourismus\BulkMail\Data\Mailing\Mailing;
use LuzernTourismus\BulkMail\Data\Mailing\MailingModel;
use LuzernTourismus\BulkMail\Data\Recipient\RecipientModel;
use Nemundo\Admin\Com\Form\AbstractAdminForm;
use Nemundo\Admin\Com\ListBox\AdminLargeTextBox;
use Nemundo\Admin\Com\ListBox\AdminTextBox;

class RecipientForm extends AbstractAdminForm
{

    public $mailingId;

    /**
     * @var AdminTextBox
     */
    private $email;
    
    public function getContent()
    {
        
        $model = new RecipientModel();
        
        $this->email = new AdminTextBox($this);
        $this->email->label = $model->email->label;
        $this->email->required = true;
        
        return parent::getContent();
        
    }
    
    
    protected function onSubmit()
    {

        (new RecipientBuilder())
            ->addRecipient($this->mailingId, $this->email->getValue());

    }

}
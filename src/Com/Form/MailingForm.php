<?php

namespace LuzernTourismus\BulkMail\Com\Form;

use LuzernTourismus\BulkMail\Data\Mailing\Mailing;
use LuzernTourismus\BulkMail\Data\Mailing\MailingModel;
use Nemundo\Admin\Com\Form\AbstractAdminForm;
use Nemundo\Admin\Com\ListBox\AdminLargeTextBox;
use Nemundo\Admin\Com\ListBox\AdminTextBox;
use Nemundo\Html\Form\Formatting\Label;

class MailingForm extends AbstractAdminForm
{


    /**
     * @var AdminTextBox
     */
    private $mailing;

    /**
     * @var AdminTextBox
     */
    private $subject;

    /**
     * @var AdminLargeTextBox
     */
    private $text;

    /**
     * @var AdminTextBox
     */
    private $mailFrom;
    
    
    public function getContent()
    {
        
        $model = new MailingModel();
        
        $this->mailing = new AdminTextBox($this);
        $this->mailing->label = $model->mailing->label;
        $this->mailing->required = true;

        $this->subject = new AdminTextBox($this);
        $this->subject->label = $model->subject->label;
        $this->subject->required = true;

        $this->text= new AdminLargeTextBox($this);
        $this->text->label = $model->text->label;

        $this->mailFrom = new AdminTextBox($this);
        $this->mailFrom->label = $model->mailFrom->label;
        
        
        return parent::getContent();
        
    }
    
    
    protected function onSubmit()
    {


        $data = new Mailing();
        $data->mailing = $this->mailing->getValue();
        $data->subject = $this->subject->getValue();
        $data->text = $this->text->getValue();
        $data->mailFrom = $this->mailFrom->getValue();
        $data->save();




    }
    
    

}
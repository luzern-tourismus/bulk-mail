<?php
namespace LuzernTourismus\BulkMail\Data\Mailing;
class Mailing extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var MailingModel
*/
protected $model;

/**
* @var string
*/
public $mailing;

/**
* @var string
*/
public $subject;

/**
* @var string
*/
public $text;

/**
* @var string
*/
public $mailFrom;

public function __construct() {
parent::__construct();
$this->model = new MailingModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->mailing, $this->mailing);
$this->typeValueList->setModelValue($this->model->subject, $this->subject);
$this->typeValueList->setModelValue($this->model->text, $this->text);
$this->typeValueList->setModelValue($this->model->mailFrom, $this->mailFrom);
$id = parent::save();
return $id;
}
}
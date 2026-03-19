<?php
namespace LuzernTourismus\BulkMail\Data\Mailing;
class MailingRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var MailingModel
*/
public $model;

/**
* @var string
*/
public $id;

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

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model, $multiLanguage = false) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->mailing = $this->getModelValue($model->mailing);
$this->subject = $this->getModelValue($model->subject);
$this->text = $this->getModelValue($model->text);
$this->mailFrom = $this->getModelValue($model->mailFrom);
}
}
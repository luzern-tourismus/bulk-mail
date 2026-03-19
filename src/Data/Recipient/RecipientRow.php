<?php
namespace LuzernTourismus\BulkMail\Data\Recipient;
class RecipientRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var RecipientModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var int
*/
public $mailingId;

/**
* @var \LuzernTourismus\BulkMail\Data\Mailing\MailingRow
*/
public $mailing;

/**
* @var string
*/
public $email;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model, $multiLanguage = false) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->mailingId = intval($this->getModelValue($model->mailingId));
if ($model->mailing !== null) {
$this->loadLuzernTourismusBulkMailDataMailingMailingmailingRow($model->mailing);
}
$this->email = $this->getModelValue($model->email);
}
private function loadLuzernTourismusBulkMailDataMailingMailingmailingRow($model) {
$this->mailing = new \LuzernTourismus\BulkMail\Data\Mailing\MailingRow($this->row, $model);
}
}
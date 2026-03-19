<?php
namespace LuzernTourismus\BulkMail\Data\Recipient;
class RecipientBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var RecipientModel
*/
protected $model;

/**
* @var string
*/
public $mailingId;

/**
* @var string
*/
public $email;

public function __construct() {
parent::__construct();
$this->model = new RecipientModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->mailingId, $this->mailingId);
$this->typeValueList->setModelValue($this->model->email, $this->email);
$id = parent::save();
return $id;
}
}
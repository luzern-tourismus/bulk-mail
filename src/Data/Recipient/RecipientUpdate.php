<?php
namespace LuzernTourismus\BulkMail\Data\Recipient;
use Nemundo\Model\Data\AbstractModelUpdate;
class RecipientUpdate extends AbstractModelUpdate {
/**
* @var RecipientModel
*/
public $model;

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
public function update() {
$this->typeValueList->setModelValue($this->model->mailingId, $this->mailingId);
$this->typeValueList->setModelValue($this->model->email, $this->email);
parent::update();
}
}
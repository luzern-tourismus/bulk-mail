<?php
namespace LuzernTourismus\BulkMail\Data\Recipient;
class RecipientValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var RecipientModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new RecipientModel();
}
}
<?php
namespace LuzernTourismus\BulkMail\Data\Mailing;
class MailingValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var MailingModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new MailingModel();
}
}
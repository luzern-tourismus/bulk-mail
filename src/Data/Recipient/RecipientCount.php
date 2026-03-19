<?php
namespace LuzernTourismus\BulkMail\Data\Recipient;
class RecipientCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var RecipientModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new RecipientModel();
}
}
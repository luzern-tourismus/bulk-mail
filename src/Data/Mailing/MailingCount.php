<?php
namespace LuzernTourismus\BulkMail\Data\Mailing;
class MailingCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var MailingModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new MailingModel();
}
}
<?php
namespace LuzernTourismus\BulkMail\Data\Mailing;
class MailingDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var MailingModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new MailingModel();
}
}
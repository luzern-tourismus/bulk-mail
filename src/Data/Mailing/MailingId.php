<?php
namespace LuzernTourismus\BulkMail\Data\Mailing;
use Nemundo\Model\Id\AbstractModelIdValue;
class MailingId extends AbstractModelIdValue {
/**
* @var MailingModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new MailingModel();
}
}
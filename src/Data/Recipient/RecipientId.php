<?php
namespace LuzernTourismus\BulkMail\Data\Recipient;
use Nemundo\Model\Id\AbstractModelIdValue;
class RecipientId extends AbstractModelIdValue {
/**
* @var RecipientModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new RecipientModel();
}
}
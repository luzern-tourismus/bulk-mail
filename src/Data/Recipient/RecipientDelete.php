<?php
namespace LuzernTourismus\BulkMail\Data\Recipient;
class RecipientDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var RecipientModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new RecipientModel();
}
}
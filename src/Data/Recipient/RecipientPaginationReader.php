<?php
namespace LuzernTourismus\BulkMail\Data\Recipient;
class RecipientPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var RecipientModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new RecipientModel();
}
/**
* @return RecipientRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new RecipientRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}
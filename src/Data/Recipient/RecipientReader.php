<?php
namespace LuzernTourismus\BulkMail\Data\Recipient;
class RecipientReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var RecipientModel
*/
public $model;

public function __construct() {
$this->model = new RecipientModel();
parent::__construct();
}
/**
* @return RecipientRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = $this->getModelRow($dataRow);
$list[] = $row;
}
return $list;
}
/**
* @return RecipientRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return RecipientRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new RecipientRow($dataRow, $this->model, $this->multiLanguage);
$row->model = $this->model;
return $row;
}
}
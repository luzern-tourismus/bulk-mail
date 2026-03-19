<?php
namespace LuzernTourismus\BulkMail\Data\Mailing;
class MailingReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var MailingModel
*/
public $model;

public function __construct() {
$this->model = new MailingModel();
parent::__construct();
}
/**
* @return MailingRow[]
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
* @return MailingRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return MailingRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new MailingRow($dataRow, $this->model, $this->multiLanguage);
$row->model = $this->model;
return $row;
}
}
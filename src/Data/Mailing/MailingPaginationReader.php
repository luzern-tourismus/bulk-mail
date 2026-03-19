<?php
namespace LuzernTourismus\BulkMail\Data\Mailing;
class MailingPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var MailingModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new MailingModel();
}
/**
* @return MailingRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new MailingRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}
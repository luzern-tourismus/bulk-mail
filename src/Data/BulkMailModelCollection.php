<?php
namespace LuzernTourismus\BulkMail\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class BulkMailModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \LuzernTourismus\BulkMail\Data\Mailing\MailingModel());
$this->addModel(new \LuzernTourismus\BulkMail\Data\Recipient\RecipientModel());
}
}
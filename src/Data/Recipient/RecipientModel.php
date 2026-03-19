<?php
namespace LuzernTourismus\BulkMail\Data\Recipient;
class RecipientModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\NumberExternalIdType
*/
public $mailingId;

/**
* @var \LuzernTourismus\BulkMail\Data\Mailing\MailingExternalType
*/
public $mailing;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $email;

protected function loadModel() {
$this->tableName = "bulkmail_recipient";
$this->aliasTableName = "bulkmail_recipient";
$this->label = "Recipient";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "bulkmail_recipient";
$this->id->externalTableName = "bulkmail_recipient";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "bulkmail_recipient_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->mailingId = new \Nemundo\Model\Type\External\Id\NumberExternalIdType($this);
$this->mailingId->tableName = "bulkmail_recipient";
$this->mailingId->fieldName = "mailing";
$this->mailingId->aliasFieldName = "bulkmail_recipient_mailing";
$this->mailingId->label = "Mailing";
$this->mailingId->allowNullValue = false;

$this->email = new \Nemundo\Model\Type\Text\TextType($this);
$this->email->tableName = "bulkmail_recipient";
$this->email->externalTableName = "bulkmail_recipient";
$this->email->fieldName = "email";
$this->email->aliasFieldName = "bulkmail_recipient_email";
$this->email->label = "eMail";
$this->email->allowNullValue = false;
$this->email->length = 255;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "mailing_email";
$index->addType($this->mailingId);
$index->addType($this->email);

}
public function loadMailing() {
if ($this->mailing == null) {
$this->mailing = new \LuzernTourismus\BulkMail\Data\Mailing\MailingExternalType($this, "bulkmail_recipient_mailing");
$this->mailing->tableName = "bulkmail_recipient";
$this->mailing->fieldName = "mailing";
$this->mailing->aliasFieldName = "bulkmail_recipient_mailing";
$this->mailing->label = "Mailing";
}
return $this;
}
}
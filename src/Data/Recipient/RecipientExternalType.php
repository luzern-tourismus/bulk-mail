<?php
namespace LuzernTourismus\BulkMail\Data\Recipient;
class RecipientExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
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

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = RecipientModel::class;
$this->externalTableName = "bulkmail_recipient";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->mailingId = new \Nemundo\Model\Type\Id\IdType();
$this->mailingId->fieldName = "mailing";
$this->mailingId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->mailingId->aliasFieldName = $this->mailingId->tableName ."_".$this->mailingId->fieldName;
$this->mailingId->label = "Mailing";
$this->addType($this->mailingId);

$this->email = new \Nemundo\Model\Type\Text\TextType();
$this->email->fieldName = "email";
$this->email->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->email->externalTableName = $this->externalTableName;
$this->email->aliasFieldName = $this->email->tableName . "_" . $this->email->fieldName;
$this->email->label = "eMail";
$this->addType($this->email);

}
public function loadMailing() {
if ($this->mailing == null) {
$this->mailing = new \LuzernTourismus\BulkMail\Data\Mailing\MailingExternalType(null, $this->parentFieldName . "_mailing");
$this->mailing->fieldName = "mailing";
$this->mailing->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->mailing->aliasFieldName = $this->mailing->tableName ."_".$this->mailing->fieldName;
$this->mailing->label = "Mailing";
$this->addType($this->mailing);
}
return $this;
}
}
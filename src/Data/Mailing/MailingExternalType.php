<?php
namespace LuzernTourismus\BulkMail\Data\Mailing;
class MailingExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $mailing;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $subject;

/**
* @var \Nemundo\Model\Type\Text\LargeTextType
*/
public $text;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $mailFrom;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = MailingModel::class;
$this->externalTableName = "bulkmail_mailing";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->mailing = new \Nemundo\Model\Type\Text\TextType();
$this->mailing->fieldName = "mailing";
$this->mailing->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->mailing->externalTableName = $this->externalTableName;
$this->mailing->aliasFieldName = $this->mailing->tableName . "_" . $this->mailing->fieldName;
$this->mailing->label = "Mailing";
$this->addType($this->mailing);

$this->subject = new \Nemundo\Model\Type\Text\TextType();
$this->subject->fieldName = "subject";
$this->subject->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->subject->externalTableName = $this->externalTableName;
$this->subject->aliasFieldName = $this->subject->tableName . "_" . $this->subject->fieldName;
$this->subject->label = "Subject";
$this->addType($this->subject);

$this->text = new \Nemundo\Model\Type\Text\LargeTextType();
$this->text->fieldName = "text";
$this->text->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->text->externalTableName = $this->externalTableName;
$this->text->aliasFieldName = $this->text->tableName . "_" . $this->text->fieldName;
$this->text->label = "Text";
$this->addType($this->text);

$this->mailFrom = new \Nemundo\Model\Type\Text\TextType();
$this->mailFrom->fieldName = "mail_from";
$this->mailFrom->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->mailFrom->externalTableName = $this->externalTableName;
$this->mailFrom->aliasFieldName = $this->mailFrom->tableName . "_" . $this->mailFrom->fieldName;
$this->mailFrom->label = "Mail From";
$this->addType($this->mailFrom);

}
}
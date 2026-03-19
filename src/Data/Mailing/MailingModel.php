<?php
namespace LuzernTourismus\BulkMail\Data\Mailing;
class MailingModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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

protected function loadModel() {
$this->tableName = "bulkmail_mailing";
$this->aliasTableName = "bulkmail_mailing";
$this->label = "Mailing";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "bulkmail_mailing";
$this->id->externalTableName = "bulkmail_mailing";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "bulkmail_mailing_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->mailing = new \Nemundo\Model\Type\Text\TextType($this);
$this->mailing->tableName = "bulkmail_mailing";
$this->mailing->externalTableName = "bulkmail_mailing";
$this->mailing->fieldName = "mailing";
$this->mailing->aliasFieldName = "bulkmail_mailing_mailing";
$this->mailing->label = "Mailing";
$this->mailing->allowNullValue = false;
$this->mailing->length = 255;

$this->subject = new \Nemundo\Model\Type\Text\TextType($this);
$this->subject->tableName = "bulkmail_mailing";
$this->subject->externalTableName = "bulkmail_mailing";
$this->subject->fieldName = "subject";
$this->subject->aliasFieldName = "bulkmail_mailing_subject";
$this->subject->label = "Subject";
$this->subject->allowNullValue = false;
$this->subject->length = 255;

$this->text = new \Nemundo\Model\Type\Text\LargeTextType($this);
$this->text->tableName = "bulkmail_mailing";
$this->text->externalTableName = "bulkmail_mailing";
$this->text->fieldName = "text";
$this->text->aliasFieldName = "bulkmail_mailing_text";
$this->text->label = "Text";
$this->text->allowNullValue = false;

$this->mailFrom = new \Nemundo\Model\Type\Text\TextType($this);
$this->mailFrom->tableName = "bulkmail_mailing";
$this->mailFrom->externalTableName = "bulkmail_mailing";
$this->mailFrom->fieldName = "mail_from";
$this->mailFrom->aliasFieldName = "bulkmail_mailing_mail_from";
$this->mailFrom->label = "Mail From";
$this->mailFrom->allowNullValue = false;
$this->mailFrom->length = 255;

}
}
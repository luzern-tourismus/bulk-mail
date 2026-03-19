<?php
namespace LuzernTourismus\BulkMail\Parameter;
use Nemundo\Web\Parameter\AbstractUrlParameter;
class MailingParameter extends AbstractUrlParameter {
protected function loadParameter() {
$this->parameterName = 'mailing';
}
}
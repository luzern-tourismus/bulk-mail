<?php
namespace LuzernTourismus\BulkMail\Site;
use Nemundo\Web\Site\AbstractSite;
use LuzernTourismus\BulkMail\Page\RecipientPage;
class RecipientSite extends AbstractSite {
protected function loadSite() {
$this->title = 'Recipient';
$this->url = 'Recipient';
}
public function loadContent() {
(new RecipientPage())->render();
}
}
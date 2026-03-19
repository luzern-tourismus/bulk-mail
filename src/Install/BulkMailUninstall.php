<?php
namespace LuzernTourismus\BulkMail\Install;
use Nemundo\App\Application\Type\Install\AbstractUninstall;
use Nemundo\Model\Setup\ModelCollectionSetup;
use LuzernTourismus\BulkMail\Data\BulkMailModelCollection;
use LuzernTourismus\BulkMail\Application\BulkMailApplication;
use Nemundo\App\Application\Setup\ApplicationSetup;
class BulkMailUninstall extends AbstractUninstall {
public function uninstall() {
(new ModelCollectionSetup())->removeCollection(new BulkMailModelCollection());
}
}
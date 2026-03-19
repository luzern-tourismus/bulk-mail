<?php

namespace LuzernTourismus\BulkMail\Builder;

use LuzernTourismus\BulkMail\Data\Recipient\Recipient;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Type\Text\Text;

class RecipientBuilder extends AbstractBase
{

    public function addRecipient($mailingId, $email)
    {

        $email = (new Text($email))->changeToLowercase()->trim()->getValue();

        $data = new Recipient();
        $data->ignoreIfExists = true;
        $data->mailingId = $mailingId;
        $data->email = $email;
        $data->save();

        return $this;

    }

}
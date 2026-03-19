<?php

namespace LuzernTourismus\BulkMail\Builder;

use LuzernTourismus\BulkMail\Data\Recipient\Recipient;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Type\Text\Text;
use Nemundo\Core\Validation\EmailValidation;

class RecipientBuilder extends AbstractBase
{

    public function addRecipient($mailingId, $email)
    {

        $email = (new Text($email))->changeToLowercase()->trim()->getValue();

        if ((new EmailValidation())->isEmail($email)) {

            $data = new Recipient();
            $data->ignoreIfExists = true;
            $data->mailingId = $mailingId;
            $data->email = $email;
            $data->save();

        } else {

            (new Debug())->write('No valid email: ' . $email);

        }

        return $this;

    }

}
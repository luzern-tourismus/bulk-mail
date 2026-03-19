<?php

namespace LuzernTourismus\BulkMail\Usergroup;

use Nemundo\User\Usergroup\AbstractUsergroup;

class BulkMailUsergroup extends AbstractUsergroup
{
    protected function loadUsergroup()
    {
        $this->usergroup = 'Bulk Mail';
        $this->usergroupId = '3034051f-77a3-4873-903c-59bb5d83dc1c';
    }
}
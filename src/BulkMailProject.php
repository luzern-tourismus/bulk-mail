<?php

namespace LuzernTourismus\BulkMail;

use Nemundo\Core\Path\Path;
use Nemundo\Project\AbstractProject;

class BulkMailProject extends AbstractProject
{
    public function loadProject()
    {
        $this->project = 'BulkMail';
        $this->projectName = 'bulkmail';
        $this->path = __DIR__;
        $this->namespace = __NAMESPACE__;
        $this->modelPath = (new Path())
            ->addPath(__DIR__)
            ->addParentPath()
            ->addPath('model')
            ->getPath();
    }
}
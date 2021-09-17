<?php

namespace App\Document\Areabrick;

use Pimcore\Model\DataObject\Project;
use Pimcore\Model\Document\Editable\Area\Info;

class Projects extends AbstractAreabrick
{
    public function getName()
    {
        return 'ours Projects';
    }

    /**
     * @throws \Exception
     */
    public function action(Info $info)
    {
        $info->setParams(['projects' => Project::getList()->getData()]);

        return parent::action($info);
    }

}

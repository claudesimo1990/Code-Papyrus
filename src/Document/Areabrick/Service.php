<?php

namespace App\Document\Areabrick;

use Exception;
use Pimcore\Model\DataObject\Services;
use Pimcore\Model\Document\Editable\Area\Info;
use Symfony\Component\HttpFoundation\Response;

class Service extends AbstractAreabrick
{
    /**
     * {@inheritdoc}
     */
    public function getName(): string
    {
        return 'Nos Services';
    }

    /**
     * @throws Exception
     */
    public function action(Info $info): ?Response
    {
        $info->setParams(['services' => Services::getList()->getData()]);
        return parent::action($info);
    }

}

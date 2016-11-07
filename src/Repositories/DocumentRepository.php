<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/11/7
 * Time: 14:04
 */

namespace CrCms\Document\Repositories;


use CrCms\Document\Models\Document;
use CrCms\Document\Repositories\Interfaces\DocumentRepositoryInterface;
use CrCms\Kernel\Repositories\Repository;

class DocumentRepository extends Repository implements DocumentRepositoryInterface
{

    public function __construct(Document $Model)
    {
        parent::__construct($Model);
    }

}
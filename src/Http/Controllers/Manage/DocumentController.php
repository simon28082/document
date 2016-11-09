<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/11/7
 * Time: 13:55
 */

namespace CrCms\Document\Http\Controllers\Manage;


use CrCms\Document\Repositories\Interfaces\DocumentRepositoryInterface;
use CrCms\Kernel\Http\Controllers\Controller;

class DocumentController extends Controller
{

    public function __construct(DocumentRepositoryInterface $repository)
    {
        parent::__construct();

        $this->repository = $repository;
    }

    public function index()
    {
//        $this->repository->create([uniqid().'afdafda'=>'fdasfdasf',uniqid().'fdasfdsa'=>'d']);

        $result = $this->repository->all();
        dd($result);
        foreach ($result as $r)
        {
//            $r->destroy();
//            dd($r->_id);
            $this->repository->delete($r->_id);
//            print_r($r->toArray());
//            echo $r->created_at,'<br />';
        }
//        dd($result);
//        $this->repository->create(['afdafda'=>'fdasfdasf','fdasfdsa'=>'d']);
        dd(1);
    }


}
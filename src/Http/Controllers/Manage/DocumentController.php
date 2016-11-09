<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/11/7
 * Time: 13:55
 */

namespace CrCms\Document\Http\Controllers\Manage;


use CrCms\Document\Forms\DocumentForm;
use CrCms\Document\Http\Requests\DocumentRequest;
use CrCms\Document\Repositories\Interfaces\DocumentRepositoryInterface;
use CrCms\Kernel\Http\Controllers\Controller;

class DocumentController extends Controller
{

    protected $view = 'document::document.';

    protected $form = null;

    public function __construct(DocumentRepositoryInterface $repository)
    {
        parent::__construct();

        $this->repository = $repository;
        $this->form = form();
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


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $attributes = $this->form->attributes();
        return $this->view('create',compact('attributes'));
    }


    /**
     * @param DocumentRequest $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function store(DocumentRequest $request)
    {
        $model = $this->form->store($this->input);
        return $this->response(['success'],compact('model'),route('documents.index'));
    }


    public function edit(string $id)
    {
        $attributes = $this->form->attributes();
        $model = $this->repository->findById($id);
        return $this->view('edit',compact('attributes','model'));
    }


    public function update(string $id)
    {

    }
}
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
use CrCms\Document\Models\Document;
use CrCms\Document\Repositories\Interfaces\DocumentRepositoryInterface;
use CrCms\Form\FormRender;
use CrCms\Kernel\Http\Controllers\Controller;

class DocumentController extends Controller
{

    protected $view = 'document::document.';

    protected $form = null;

    public function __construct(DocumentRepositoryInterface $repository)
    {
        parent::__construct();

        $this->repository = $repository;
        $this->form = app(config('document.form_drive'));
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
        $attributes = (new FormRender)->render($this->form);
        return $this->view('create',compact('attributes'));
    }


    /**
     * @param DocumentRequest $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function store()//DocumentRequest $request
    {
        $model = $this->form->store($this->input[$this->form->hash()]);
//        return $this->response(['success'],compact('model'),route('documents.index'));
    }


    public function edit(string $id)
    {
        $model = $this->repository->findById($id);
        $attributes = (new FormRender)->render($this->form,$model->toArray());

        return $this->view('edit',compact('attributes','model','id'));
    }


    public function update(string $id)
    {

    }
}
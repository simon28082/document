<?php

/**
 * @author simon <crcms@crcms.cn>
 * @datetime 2018-04-29 20:14
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Document\Http\Controllers\Api\Manage;

use CrCms\Document\Attributes\DocumentAttribute;
use CrCms\Document\Http\Requests\Document\DocumentRequest;
use CrCms\Document\Http\Requests\Document\StoreRequest;
use CrCms\Document\Models\Model;
use CrCms\Document\Repositories\DocumentRepository;
use CrCms\Document\Repositories\ModelRepository;
use CrCms\Document\Services\Documents\Document;
use CrCms\Document\Services\Documents\DocumentFactory;
use CrCms\Document\Services\Documents\Form;
use CrCms\Document\Services\Documents\Many;
use CrCms\Foundation\App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection;

//use CrCms\Foundation\App\Http\Resources\ResourceCollection;

/**
 * Class DocumentController
 * @package CrCms\Modules\document\src\Http\Controllers\Api\Manage
 */
class DocumentController extends Controller
{
    protected $modelRepository;

    public function __construct(ModelRepository $modelRepository)
    {
        $this->modelRepository = $modelRepository;
    }

    public function index(Model $model)
    {
//        $search =
//        $fields = $this->modelRepository->fields($model);

        $paginate = $this->repository($model)->paginate();

        $paginate = DocumentFactory::handle(
            DocumentAttribute::ROLE_LIST,
            $this->modelFields($model),
            $paginate
        );

        return new ResourceCollection($paginate);
    }

    public function create(Model $model)
    {
        $elements = DocumentFactory::handle(DocumentAttribute::ROLE_CREATE, $this->modelFields($model));

        return $this->response->data($elements);
    }

    public function edit(Model $model, string $id)
    {
        $document = $this->repository($model)->byStringIdOrFail($id);

        $elements = DocumentFactory::handle(
            DocumentAttribute::ROLE_EDIT,
            $this->modelFields($model),
            $document
        );

        return $this->response->data($elements);
    }

    public function store(Request $request, Model $model)
    {
        $this->validate(
            $request,
            DocumentFactory::handle(
                DocumentAttribute::ROLE_STORE_RULE,
                $this->modelFields($model)
            )
        );

        $document = DocumentFactory::handle(
            DocumentAttribute::ROLE_STORE,
            $this->modelFields($model),
            $request->all()
        );

        $document = $this->repository($model)->create($document);

        $document = DocumentFactory::handle(
            DocumentAttribute::ROLE_SINGLE,
            $this->modelFields($model),
            $document
        );

        return $this->response->data($document);
    }

    protected function repository(Model $model): DocumentRepository
    {
        return app(DocumentRepository::class, ['model' => $model]);
    }

    protected function modelFields(Model $model): Collection
    {
        return $this->modelRepository->fields($model);
    }
}
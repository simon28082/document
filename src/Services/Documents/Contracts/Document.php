<?php

/**
 * @author simon <crcms@crcms.cn>
 * @datetime 2018-04-29 20:25
 * @link http://crcms.cn/
 * @copyright Copyright &copy; 2018 Rights Reserved CRCMS
 */

namespace CrCms\Document\Services\Documents\Contracts;

use CrCms\Document\Models\DocumentModel;
use Illuminate\Support\Collection;

/**
 * Interface Document
 * @package CrCms\Document\Services\Documents\Contracts
 */
interface Document
{
    public function list(Collection $collects): Collection;

    public function create(): Collection;

    public function update(array $data): array;

    public function store(array $data): array;

    public function edit(DocumentModel $model): Collection;

    public function search(array $data): array;

    public function single(DocumentModel $model): array ;

    public function destroy(array $data): array;
}
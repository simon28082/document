<?php
/**
 * @author: zx (attempt321@163.com)
 * Date: 2018/7/31
 * Time: 15:56
 * Created by PhpStorm.
 */

namespace CrCms\Document\Services;

use CrCms\Document\Models\DefaultModel;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

interface DocumentContract
{
    public function init();

    public function index(Request $request);

    public function store(Request $request): DefaultModel;

    public function update(Request $request, string $id): DefaultModel;

    public function destroy(Request $request, string $id): int;
}
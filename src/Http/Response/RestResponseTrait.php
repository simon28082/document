<?php
/**
 * @author: zx (attempt321@163.com)
 * Date: 2018/7/20
 * Time: 16:30
 * Created by PhpStorm.
 */

namespace CrCms\Document\Http\Response;

trait RestResponseTrait
{
    // 需要展示的信息
    protected $msg = '';
    /**
     *  [POST/PUT/PATCH]：用户新建或修改数据成功。
     */
    public function created($data = []): self
    {
        $code = 201;
        $this->setStatusCode($code);
        //$this->setContent([
        //    'data'=>$data,
        //    'code' => $code,
        //    'msg'=> $this->msg ?? trans('document::app.response.created')
        //]);
        return $this;
    }

    /**
     * 表示一个请求已经进入后台排队（异步任务）
     */
    public function accepted(): void
    {
        $this->setStatusCode(202);
        $this->setContent('已接受正在处理');
    }

    /**
     * [DELETE]：用户删除数据成功。
     */
    public function noContent()
    {
        $this->setStatusCode(204);
        $this->setContent('数据已删除');
    }

    /**
     * [POST/PUT/PATCH]：用户发出的请求有错误，服务器没有进行新建或修改数据的操作，该操作是幂等的。
     */
    public function invalidRequest()
    {
        $this->setStatusCode(400);
        $this->setContent('请求有误,请检查携带参数是否符合要求');
    }

    /**
     * [*]：表示用户没有权限（令牌、用户名、密码错误）。
     */
    public function unauthorized()
    {
        $this->setStatusCode(401);
        $this->setContent('权限认证错误');
    }

    /**
     * [*] 表示用户得到授权（与401错误相对），但是访问是被禁止的。
     */
    public function forbidden()
    {
        $this->setStatusCode(403);
        $this->setContent('无授权访问');
    }

    /**
     * [*]：用户发出的请求针对的是不存在的记录，服务器没有进行操作，该操作是幂等的。
     */
    public function notFound()
    {
        $this->setStatusCode(404);
        $this->setContent('请求的资源不存在');
    }

    /**
     * [GET]：用户请求的格式不可得（比如用户请求JSON格式，但是只有XML格式）。
     */
    public function notAcceptable()
    {
        $this->setStatusCode(406);
        $this->setContent('请求的响应格式不存在');
    }

    /**
     * [GET]：用户请求的资源被永久删除，且不会再得到的。
     */
    public function gone()
    {
        $this->setStatusCode(410);
        $this->setContent('资源被永久性删除');
    }

    /**
     * [POST/PUT/PATCH] 当创建一个对象时，发生一个验证错误
     */
    public function unprocessableEntity()
    {
        $this->setStatusCode(422);
        $this->setContent('验证错误');
    }

    // 响应信息
    public function withMsg(String $msg)
    {
        $this->msg = $msg;
    }


}
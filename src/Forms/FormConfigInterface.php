<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/11/9
 * Time: 15:12
 */

namespace CrCms\Document\Forms;


interface FormConfigInterface
{

    /**
     * @return array
     */
    public function attributes() : array ;


    /**
     * @return array
     */
    public function rules() : array ;


    /**
     * @return string
     */
    public function table() : string ;


}
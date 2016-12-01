<?php

/*
 * 基底クラス
 *
 * @package user
 * @author Mukaiyama
 * @created 2014-10-06
 * @updated 2014-10-06
 *
 */

namespace Facade;

/**
 * 本アプリケーションで、facadeが継承するクラス
 */
class Base 
{
    /**
     * DIコンテナ
     */
    protected $di = null;


    /**
     * 初期化処理
     */
    public function initialize($di)
    {
        $this->di = $di;
        $this->dlog = $this->di->get('debug', array());

    }


}

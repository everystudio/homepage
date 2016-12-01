<?php

//namespace Controllers;

require_once __DIR__.'/Base.php';
/**
 * テスト
 */
class TestController extends Controllers\Base
{
    public function __construct()
    {
        // 基底クラスの初期設定。controller配下では必ず呼び出す
        $this->initialize();
    }
    
    public function index()
    {
       

        $this->dlog->log("test");
        $this->dlog->log("test2");
       
        // 設定ファイル読み込み
        $config = $this->di->get('config');
        $appDbh = $this->di->get('appDbh');
        $smarty = $this->di->get('smarty');
        
        // facadeテスト
        $test = $this->di->get('facade', array("TestFacade"));
        $test->index();

        $smarty->assign('test1', 'テスト2です。');
        $id = 1;

        // db名を指定する
        $appDbh["user"]->beginTransaction();

        try {
            $sql = 'select * from userParam where id = :id';
            $stmt = $appDbh["user"]->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $ret = $stmt->execute();
            if (!$ret) {
                throw new PDOException('select 失敗');
            }

            while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
                print($result['uid']);
                print($result['name']);
            }

            //commit
            $appDbh["user"]->commit();

        } catch (PDOException $e) {
            //rollback
            $appDbh["user"]->rollBack();

            die(mb_convert_encoding($e->getMessage(), 'UTF-8','auto'));
        }

        $smarty->display('test.html');
    }
}


?>

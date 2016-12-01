<?php


require_once __DIR__.'/Base.php';
/**
 * テスト
 */
class TestFacade extends Facade\Base
{
    public function __construct($di)
    {
        // 基底クラスの初期設定。
        $this->initialize($di);
    }
    
    public function index() {
        // 設定ファイル読み込み
        $config = $this->di->get('config');
        $dbh = $this->di->get('dbh');

        $id = 1;

        // db名を指定する
        $dbh["user_official"]->beginTransaction();

        try {
            $sql = 'select * from user where id = :id';
            $stmt = $dbh["user_official"]->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $ret = $stmt->execute();
            if (!$ret) {
                throw new PDOException('select 失敗');
            }

            //commit
            $dbh["user_official"]->commit();

        } catch (PDOException $e) {
            //rollback
            $dbh["user_official"]->rollBack();

            die(mb_convert_encoding($e->getMessage(), 'UTF-8','auto'));
        }

        return true;
    }
}



//$str_name = basename(__FILE__,"php")."html";
//echo basename(__FILE__,"php")."html";
//$smarty->display(basename(__FILE__,"php")."html");
//$smarty->display($str_name);

//$smarty->display('test.html');

?>

<?php

require_once __DIR__.'/Base.php';
/**
 * 認証処理
 * 
 * @author mukaiyama
 * @created 2014-10-09
 * @updated 2014-10-09
 * 
 */

class AcceptFacade extends Facade\Base
{

    public function __construct($di)
    {
        // 基底クラスの初期設定。
        $this->initialize($di);
    }
    
    /**
     * 新規会員登録時の認証チェック
     * @param type $obj
     * @return boolean
     */
    public function checkRegist()
    {
        $uid = $_SESSION["uid"];
        $chk = $_SESSION["chk"];
        
        $config = $this->di->get('config');
        $appDbh = $this->di->get('appDbh');
        
        $sql = 'select * from userParam where uid = :uid';
        $stmt = $appDbh["user"]->prepare($sql);
        $stmt->bindParam(':uid', $uid, PDO::PARAM_INT);
        $ret = $stmt->execute();
        if (!$ret) {
            return false;
        }

        $userParam = $stmt->fetch(PDO::FETCH_ASSOC);
        
        $csv = $this->getQuestionCode($userParam["id"]);            
        
        $secret_code = $csv["qid"];
        // 任意のキー
        $acceptKey = $config['accept_key'];

        
        $sum = $uid.$secret_code;
        
        $checkAccept = $this->checkAccept($sum, $acceptKey, $chk);
        
        $result = array();
        if($checkAccept === true){
            $result = array("uid" => $uid, "secret_code" => $secret_code);
        }
        
        return $result;
    }
    
    /**
     * 問い合わせコード取得
     * 
     * @param int $id ユーザーパラムのID
     * @return array
     */
    public function getQuestionCode($id)
    {
        $num = floor($id/50000);
        $csvId = $id - $num * 50000;
        $fileNum = $num + 1;
        
        $fileName = sprintf("%04d", $fileNum);
        //$data[$id]["qid"] = $fileNum;

        $dao = $this->di->get('csv', array('QuestionCodeData'));
        $data = $dao->getquestioncode($fileName);
        
        if(empty($data[$csvId])){
            return false;
        }

        return $data[$csvId];
    }
    
    /**
     * 暗号生成し実際にチェックするメソッド
     * @param type $sum
     * @param type $acceptKey
     * @param type $chk_sum
     * @return boolean
     * @throws error\AcceptError
     */
    private function checkAccept($sum, $acceptKey, $chk_sum)
    {
        $checkNum = hash_hmac("sha256", $sum, $acceptKey);

        // 送られてきた値と同じでなければ認証失敗
        if($checkNum !== $chk_sum){
            return false;
        }
        return true;
    }

}

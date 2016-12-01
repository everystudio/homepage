<?php


require_once __DIR__.'/Base.php';
/**
 * ログインに関する処理
 */
class LoginFacade extends Facade\Base
{
	public function __construct($di)
	{
		// 基底クラスの初期設定。
		$this->initialize($di);
	}

	/**
	ログイン状態を保持しているかどうかのチェック
	*/
	public function is_login( $id ){

		$id_check = false;

		// そもそもIDが有効なのかどうか
		if( !isset($id) ){
			$id_check = false;
		}
		else if( $id == 0 ){
			$id_check = false;
		}
		else {
			$id_check = true;
		}

		// そもそもIDがダメ
		if( $id_check == false ){
			return false;
		}

		// 何か複雑なことするかと思ったけど、とりあえずはこれだけでいいや
		if( 0 < $_SESSION['login'] ){
			return true;
		}
		else {
			return false;
		}
	}

	/**
	自動ログイン用キー生成&クッキー,DB保存
	*/
    public function createAutoLoginKey ($use_dbh,$user_id) {
        $sql = "UPDATE personalInfo set ";
        $sql.= "auto_login_key = :auto_login_key , ";
        $sql.= "lastlogin = :lastlogin ";
        $sql.= "where id = :id ";
        $stmt = $use_dbh->prepare($sql);
        $auto_login_key = sha1(uniqid().mt_rand(1,999999999));
        $stmt->bindParam(':auto_login_key',$auto_login_key,PDO::PARAM_STR);
        $stmt->bindParam(':lastlogin',date("Y-m-d H:i:s"),PDO::PARAM_STR);
        $stmt->bindParam(':id',$user_id,PDO::PARAM_INT);
        $ret = $stmt->execute();
        if( !$ret ){
            throw new PDOException('UpdateError');
        }
        setcookie("alk", $auto_login_key, time()+60*60*24*30,"/mypage");
        setcookie("i", $user_id, time()+60*60*24*30,"/mypage");
    }

	/**
	ログイン日の更新
	*/
    public function updateLastLogin ($use_dbh,$user_id) {
        $sql = "UPDATE personalInfo set ";
        $sql.= "lastlogin = :lastlogin ";
        $sql.= "where id = :id ";
        $stmt = $use_dbh->prepare($sql);
        $auto_login_key = sha1(uniqid().mt_rand(1,999999999));
        $stmt->bindParam(':lastlogin',date("Y-m-d H:i:s"),PDO::PARAM_STR);
        $stmt->bindParam(':id',$user_id,PDO::PARAM_INT);
        $ret = $stmt->execute();
        if( !$ret ){
            throw new PDOException('UpdateError');
        }
    }

	/**
	ユーザ情報取得
	*/
    public function getUserInfo ($use_dbh,$user_id) {
        $sql = "SELECT * FROM personalInfo WHERE id = :id";
        $stmt = $use_dbh->prepare($sql);
        $stmt->bindParam(':id',$user_id,PDO::PARAM_INT);
        $ret = $stmt->execute();
        if( !$ret ){
            return false;
        } else {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
    }

	/**
	自動ログインクッキー削除
	*/
    public function deleteAutoLoginCookie () {
    	if (isset($_COOKIE['i'])) {
	        unset($_COOKIE['i']);
            setcookie("i","", time() - 1800,"/mypage");
    	}
    	if (isset($_COOKIE['alk'])) {
            unset($_COOKIE['alk']);
            setcookie("alk","", time() - 1800,"/mypage");
    	}
    }
}
























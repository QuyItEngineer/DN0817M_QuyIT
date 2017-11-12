<?
/**
 * DBクラス
 *
 * @copyright (C) 2015 Rapitec LLC
 */
class BaseDB {
	/**
	 * ホスト
	 *
	 * @since 1.0.0
	 */
	protected $Host;

	/**
	 * ユーザ名
	 *
	 * @since 1.0.0
	 */
	protected $UserName;

	/**
	 * パスワード
	 *
	 * @since 1.0.0
	 */
	protected $Password;

	/**
	 * データベース名
	 *
	 * @since 1.0.0
	 */
	protected $DatabaseName;

	/**
	 * 文字セット
	 *
	 * @since 1.0.0
	 */
	protected $CharacterSet;

	/**
	 * クエリ
	 *
	 * @since 1.0.0
	 */
	public $QueryString;

	/**
	 * リザルトセット
	 *
	 * @since 1.0.0
	 */
	protected $ResultSet;

	/**
	 * エラー
	 *
	 * @since 1.0.0
	 */
	protected $Error;

	/**
	 * コンストラクター
	 *
	 * @since 1.0.0
	 */
	function __construct() {
		$this->Host         = "";
		$this->UserName     = "";
		$this->Password     = "";
		$this->DatabaseName = "";
		$this->CharacterSet = "";
		$this->QueryString  = "";
		$this->ResultSet    = "";
		$this->Error        = "";
	}

	/**
	 * クエリ設定
	 *
	 * @since 1.0.0
	 */
	function setSql($queryString) {
		$this->QueryString = $queryString;
	}

	/**
	 * クエリ取得
	 *
	 * @since 1.0.0
	 */
	function getSql() {
		return $this->QueryString;
	}

	/**
	 * エラー取得
	 *
	 * @since 1.0.0
	 */
	function getErr() {
		return $this->Error;
	}
}

/**
 * MySQLクラス
 *
 * @author  Yasotaka NUMATA / Rapitec LLC
 * @date    2013/03/06
 * @version 1.0.0
 */
class Mysql extends BaseDB {
	/**
	 * mysqliオブジェクト
	 *
	 * @since 1.0.0
	 */
	private $mysql;

	/**
	 * コンストラクター
	 *
	 * @since 1.0.0
	 */
	function __construct($host = "", $userName = "", $password = "",$databaseName = "", $characterSet = "") {
		parent::__construct();

		$this->Host         = $host         === "" ? $GLOBALS["clientConfiguration"]["DBHost"] : $host;
		$this->UserName     = $userName     === "" ? $GLOBALS["clientConfiguration"]["DBUser"] : $userName;
		$this->Password     = $password     === "" ? $GLOBALS["clientConfiguration"]["DBPass"] : $password;
		$this->DatabaseName = $databaseName === "" ? $GLOBALS["clientConfiguration"]["DBName"] : $databaseName;
		$this->CharacterSet = $characterSet === "" ? $GLOBALS["clientConfiguration"]["DBCset"] : $characterSet;
	}

	/**
	 * DB接続
	 *
	 * @since 1.0.0
	 */
	function Connect() {
		$this->mysql = new mysqli($this->Host, $this->UserName, $this->Password, $this->DatabaseName);
		if (mysqli_connect_error()) {
			return false;
		} else {
			$this->setSql("SET CHARACTER SET {$this->CharacterSet}");
			$this->Query();
			return true;
		}
	}

	/**
	 * クエリ発行処理
	 *
	 * @since 1.0.0
	 */
	function Query() {
		$this->ResultSet = $this->mysql->query($this->QueryString);

		if ($this->mysql->error) {
			$this->Error = $this->Error();
			return false;
		} else {
			return $this->ResultSet;
		}
	}

	/**
	 * トランザクション開始
	 *
	 * @since 1.0.0
	 */
	function Begin() {
		$this->setSql("START TRANSACTION");
		if ($this->Query()) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * トランザクションコミット
	 *
	 * @since 1.0.0
	 */
	function Commit() {
		$this->setSql("COMMIT");
		if ($this->Query()) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * トランザクションロールバック
	 *
	 * @since 1.0.0
	 */
	function Rollback() {
		$this->setSql("ROLLBACK");
		if ($this->Query()) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * DBクローズ
	 *
	 * @since 1.0.0
	 */
	function Close() {
		return $this->mysql->close();
	}

	/**
	 * リザルトセットを連想配列で取得
	 * 　mysqli_result::fetch_assoc
	 *
	 * @since 1.0.0
	 */
	function Fetch() {
		return $this->ResultSet->fetch_assoc();
	}

	/**
	 * リザルトセットの任意行にポインタ移動
	 * 　mysqli_result::data_seek
	 *
	 * @since 1.0.0
	 */
	function Data_seek($i) {
		return $this->ResultSet->data_seek($i);
	}

	/**
	 * リザルトセットを数値添字配列で取得
	 * 　mysqli_result::fetch_row
	 *
	 * @since 1.0.0
	 */
	function Fetch_row() {
		return $this->ResultSet->fetch_row();
	}

	/**
	 * リザルトセットの行数を取得
	 * 　mysqli_result::$num_rows
	 *
	 * @since 1.0.0
	 */
	function Num_rows() {
		return $this->ResultSet->num_rows;
	}

	/**
	 * 直前のクエリで変更された行数を取得
	 * 　mysqli::$affected_rows
	 *
	 * @since 1.0.0
	 */
	function Affected_rows() {
		return $this->mysql->affected_rows;
	}

	/**
	 * 直前のクエリで挿入されたデータのオートインクリメント値を取得
	 * 　mysqli::$insert_id
	 *
	 * @since 1.0.0
	 */
	function Insert_id() {
		return $this->mysql->insert_id;
	}

	/**
	 * エスケープ
	 * 　mysqli::real_escape_string
	 *
	 * @since 1.0.0
	 */
	function Escape($val) {
		return $this->mysql->real_escape_string($val);
	}

	/**
	 * エラー取得
	 *
	 * @since 1.0.0
	 */
	function Error() {
		return $this->mysql->error;
	}
}
?>
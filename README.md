# Stdo

## メモ
### db_helper
- `get_db_connect()`
  - DBへ接続を行う
  - `return $dbh;`
- `acId_exists($dbh, $std_id)`
  - アカウントが存在するかの確認
  - 存在するなら`TRUE`、存在しなければ`FALSE`
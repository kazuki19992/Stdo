# Stdo

## バッジ
- [![Build Status](https://travis-ci.com/kazuki19992/Stdo.svg?branch=master)](https://travis-ci.com/kazuki19992/Stdo)
  - ビルド結果だよ！緑になっているとうれしいね！🙃赤くなっているとかなしいね😢
- [![MIT License](http://img.shields.io/badge/license-MIT-blue.svg?style=flat)](LICENSE)
  - ライセンスだよ！MITライセンスだね！オープンソースだね！うれしいね！
## メモ
### db_helper
- `get_db_connect()`
  - DBへ接続を行う
  - `return $dbh;`
- `acId_exists($dbh, $std_id)`
  - アカウントが存在するかの確認
  - 存在するなら`TRUE`、存在しなければ`FALSE`
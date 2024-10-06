# ローカルサーバの立ち上げ方法

リポジトリをクローンする

```bash
git clone https://github.com/tetsu72688/george-remind-app.git
```
Visual Studio Codeで`george-remind-app`フォルダを開く

コマンドプロンプトを開き、カーソルの前の文字列が`C:\<中略>\george-remind-app>`であることを確認し、次のコマンドを実行

```bash
composer install
```

```bash
npm install
```

`.env.example`ファイルをコピーし、`.env`というファイル名で保存する

次のコマンドを実行する

```bash
php artisan key:generate
```

<!-- `database`ディレクトリに`database.sqlite`ファイル(空でよい)を作成 -->
<!-- MySQLを用いる場合は必要ない -->

XAMPP Control Panelを起動する
Apache -> MySQLの順に起動する

次のコマンドを実行

```bash
php artisan migrate
```
ここでartisanが使えないエラーが出る場合はディレクトリを正しく選択できてない
george-remind-appの階層までcdすること。

次のコマンドでNodeのプログラムを立ち上げる

```bash
npm run dev
```
ここでエラーが出る場合、Node.jsのバージョンが不適切である。nvm-windowsなどを使用してNode.jsのバージョン管理を行うとよい。

```bash
node -v #バージョンを確認する
nvm list available  #利用可能なバージョンをリストアップする
nvm install バージョン名    #LTSの最新版が推奨
nvm use バージョン名    #installしたバージョンを使用する
```

Visual Studio Codeでターミナル右上の+ボタンから[新しいターミナル]を開き、同時に次のコマンドを実行する

```bash
php artisan serve
```

このときに出力されたURLにアクセスして実際に立ち上がったかを確かめる。

2回目以降は`npm run dev`と`php artisan serve`だけ実行すればよい。

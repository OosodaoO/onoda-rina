<?php 
    // フォームのボタンが押されたら
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // フォームから送信されたデータを各変数に格納
        $name = $_POST["name"];
        $email = $_POST["email"];
        $contentbox  = $_POST["contentbox"];
    }

    // 送信ボタンが押されたら
    if (isset($_POST["submit"])) {
        // 送信ボタンが押された時に動作する処理をここに記述する
            
        // 日本語をメールで送る場合のおまじない
            mb_language("ja");
        mb_internal_encoding("UTF-8");
        
        //mb_send_mail("kanda.it.school.trial@gmail.com", "メール送信テスト", "メール本文");

            // 件名を変数subjectに格納
            $subject = "［自動送信］お問い合わせの確認";

            // メール本文を変数bodyに格納
        $subbody = <<< EOM
{$name}　様

お問い合わいただきました。

===================================================
【 お名前 】 
{$name}

【 メール 】 
{$email}


【 お問い合わせ内容 】 
{$contentbox}
===================================================

EOM;
        
 $body = <<< EOM
{$name}　様

お問い合わせありがとうございます。
以下のお見積り内容を、メールにて確認させていただきました。

===================================================
【 お名前 】 
{$name}

【 メール 】 
{$email}


【 お問い合わせ内容 】 
{$contentbox}
===================================================

EOM;
        
        // 送信元のメールアドレスを変数fromEmailに格納
        $fromEmail = "smilemazic0108@outlook.jp";

        // 送信元の名前を変数fromNameに格納
        $fromName = "OnodaRina";

        // ヘッダ情報を変数headerに格納する      
        $header = "From: " .mb_encode_mimeheader($fromName) ."<{$fromEmail}>";
        $subheader = "From: " .mb_encode_mimeheader($name) ."<{$email}>";

        // メール送信を行う
        mb_send_mail($fromEmail, $subject, $subbody, $subheader);
        mb_send_mail($email, $subject, $body, $header);
        
         // サンクスページに画面遷移させる
        header("Location: https://oosodaoo.github.io/onoda-rina/thanxs.php");
        exit;
    }
?>
<html lang="ja">
    <head>
        <meta charset="utf-8">
      <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
        <tittle>ONODA RINA'S PORTFORIO</tittle>
        <div class="contact-head"><a href="help.html">CONTACT</a></div>
        <meta name="description" content="Web・アプリのデザインを行っています。企画からデザイン・コーディングまでの一連の流れをこなすことが可能です。お気軽にお問い合わせください">
        <meta name="kyewords" content="Portforio,ポートフォリオ,Webサイト,スマホアプリ,アプリ,デザイン,イラスト,コーディング,ウェブ,制作">
        <meta name="format-detection" content="telephone=no,addr=no,emai=no">
        <meta name="viewport" content="width==device-width,initial-scale=1.0,maximum-scale=1.0,user-scale=0">
        <meta property="og:title" content="ONODA RINA'S PORTFORIO">
        <meta property="og:image" content="メイン画像URL">
        <meta property="og:type" content="Website">
        <meta property="og:site_name" content="ONODA RINA'S PORTFORIO">
        <meta property="og:description" content="Portforio,ポートフォリオ,Webサイト,スマホアプリ,アプリ,デザイン,イラスト,コーディング,ウェブ,制作">
        <meta property="fb:app_id" content="App-ID（15文字の半角数字）">
        <meta name="twitter:card" content="summary">
        <meta name="twitter:site" content="サイトのURL貼る">
        <meta name="twitter:image" content="ogpのURL貼る">
        
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        
        <link rel="stylesheet" href="../onoda-rina/css/help.css?20130420-1100" media="all">
        <script type="text/javascript" src="../onoda-rina/js/fadein.js"></script>
        <script type="text/javascript" src="../onoda-rina/js/fadeout.js"></script>
        <script src="https://code.createjs.com/createjs-2015.11.26.min.js"></script> 
    </head>
    <body id>
        <div id="content" style="display:block; opacity:1">
        <div id="gnav">
             <div id="menu">
                    <a href="index.html" class="fadelink"><img src="img/batu.png"></a>
            </div>
            <div class="contact-box">
                 <a href="https://facebook.com/rina.onoda.90" class="btn facebook"><i class="fab fa-facebook-f"></i></a>
       <a href="https://twitter.com/@oO48931155" class="btn twitter"><i class="fab fa-twitter"></i></a>
            </div>
     </div>
            </div>
            <div class="helpbox">
              <form action="confirm_home.php" method="post">
            <input type="hidden" name="name"class="name" value="<?php echo $name; ?>">
            <input type="hidden" name="email"class="text" value="<?php echo $email; ?>">
            <input type="hidden" name="contentbox" class="contentbox"value="<?php echo $contentbox; ?>">
            <h1 class="contact-title">お問い合わせ 内容確認</h1>
            <p>お問い合わせ内容はこちらで宜しいでしょうか？<br>よろしければ「送信する」ボタンを押して下さい。</p>
        <div>
          <div class="dname">
                    <label>Name</label>
                    <p><?php echo $name; ?></p>
                </div>
                <div class="demail">
                    <label>メールアドレス</label>
                    <p><?php echo $email; ?></p>
                </div>
                <div class="dcontent">
                    <label>メッセージ</label>
                    <p><?php echo nl2br($contentbox); ?></p>
                </div>
        </div>
        <input type="button" value="内容を修正する" onclick="history.back(-1)">
        <button type="submit" name="submit" class="submit">送信する</button>
    </form>
    </div>
        
    </body>
</html>
<?php
//vae_dump($_POST);
//最初に変数を定義しておかないとエラーになる
$err_msg1="";
$err_msg2="";
$message="";
$name=(isset( $_POST["name"])=== true) ?$_POST["name"]: "";
$comment =(isset( $_POST["comment"])=== true) ? trim($_POST["comment"]) : "";
$txt="C:xampp\htdocs\php1\data.txt";
if(isset($_POST["send"])==true){
    if($name=="")$err_msg1="名前を入力してください";

    if ($comment) $err_msg2="コメントを入力してください";

    if($err_msg1==""&& $err_msg2=""){
        $fp=fopen($txt,"a");
        fwrite($fp, $ma."\t".$comment."\n");
        $message="書き込みに成功しました。";
    }
}

$fp =fopen($txt,"r");

$dataArr=array();
while ($res=fgets($fp)) {
    $tmp=explode("\t",$res);
    $arr=array(
        "name"=>$tmp[0],
        "comment"=>$tmp[1]
    );
    $dataArr[]=$arr;
    // code...
}


 ?>
 <!DOCTYPE html>
 <html lang="ja" dir="ltr">
     <head>
         <meta charset="utf-8">
         <title>掲示板</title>
     </head>
     <body>
         <?php echo $message; ?>
         <form action="" method="post">
             名前 <br>
             <input type="text" name="name" value="<?php echo $name ?>">
             <?php echo $err_msg1; ?> <br>
             コメント <br>
              <textarea name ="comment" rows="4" cols="40"><?php echo $comment; ?></textarea>
             <?php echo $err_msg2; ?><br>
<br>
        <input type="submit" name="send" value="送信">

         </form>
         <dl>
             <?php foreach ($dataArr as $data):?>
                <p> <span><?php echo $data["name"]; ?></span>:<span><?php echo "comment"; ?></span> </p>
            <?php endforeach;?>

         </dl>

     </body>
 </html>

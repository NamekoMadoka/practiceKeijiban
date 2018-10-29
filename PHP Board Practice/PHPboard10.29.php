<?php
//vae_dump($_POST);
//最初に変数にしておかないとエラーになる。
$err_msg1="";
$err_msg2="";
$message="";
$name=(isset($_POST["name"])==true) ?$_POST["name"]:"Nameless";
$comment=(isset($_POST["comment"])==true)?trim($_POST["comment"]):"";
$txt="C:xampp\htdocs\php1\data2.txt";
$date=Date("(Y/m/d H:i:s)");
if(isset($_POST["send"])===true){
    if($name=="")$err_msg1="名前を入力してください";
    if($comment=="")$err_msg2="コメントを入力してください";
    if($err_msg1==""&&$err_msg2==""){
        $fp=fopen($txt,"a");
        fwrite($fp,$name."\t".$date."\t".$comment."\n");
        $message="Welcome to TEA PARTY...";
    }
}

$fp=fopen($txt,"r");

$dataArr = array();
while($res=fgets($fp)){
    $tmp=explode("\t",$res);
    $arr=array(
        "name"=>$tmp[0],
        "date"=>$tmp[1],
        "comment"=>$tmp[2]
    );
        $dataArr[]=$arr;
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
            Name <br>
            <input type="text" name="name" value="<?php echo $name; ?>">
            <?php echo $err_msg1; ?> <br>
            Comment <br>
            <textarea name="comment" rows="2" cols="40"><?php echo $comment; ?></textarea>
            <?php echo $err_msg2; ?>
<br>
        <input type="submit" name="send" value="送信">
        </form>
        <dl>
            <?php foreach ($dataArr as $data) :?>
                 <dt><?php echo $data["name"];  ?>:</dt>
                    <dd><?php echo $data["comment"]; ?></dd>
            <?php endforeach; ?>
        </dl>
    </body>
</html>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name=isset($_POST["name"]) ? $_POST["name"] : "";
    $section=isset($_POST["section"]) ? $_POST["section"] : "";
    $cardnumber=isset($_POST["cardnumber"]) ? $_POST["cardnumber"] : "";
    $card=isset($_POST["card"]) ? $_POST["card"] : "";
}
$valid=true;


if (!($_POST["name"] || $_POST["name"]===NULL)==NULL) {
  $valid=false;
}
if (!($_POST["section"] || $_POST["section"]===NULL)==NULL) {
  $valid=false;
}
if (!($_POST["cardnumber"] || $_POST["cardnumber"]===NULL)==NULL) {
  $valid=false;
}
if (!($_POST["card"] || $_POST["card"]===NULL)==NULL) {
  $valid=false;


}
  $file='sucker.txt';
  $arr = array($name ,$section,$cardnumber,$card,"\n" );
  $date= implode(";",$arr);
  file_put_contents($file, $date, FILE_APPEND | LOCK_EX);


  $currentSucker=file_get_contents($file);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Buy Your Way to a Better Education!</title>
    <link href="buyagrade.css" type="text/css" rel="stylesheet" />
  </head>

  <body>
<?php if($valid==true)
{
?>
    <h1>Thanks, sucker!</h1>

    <p>Your information has been recorded.</p>

    <dl>
      <dt>Name</dt>
      <dd><?= $name ?></dd>

      <dt>Section</dt>
      <dd><?= $section ?></dd>

      <dt>Credit Card</dt>
      <dd><?= $cardnumber . "($card)" ?></dd>
    </dl>

    <p>Here all suckers</p>
    <pre>
<?=$currentSucker ?>
    </pre>
<?php
}
  else
  {

?>


<p>Sorry.<a href="buyagrade.php">Try again?</a></p>
<?php } ?>
  </body>
</html>

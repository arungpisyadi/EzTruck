<?php header('Content-Type: text/html; charset=UTF-8'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>


<!-- ***** head ************************************************************ -->
<title>PHPDevel Popup Window</title>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<link rel="stylesheet" type="text/css" href="popup-window.css" />

<script type="text/javascript" src="jquery/jquery.js"></script>
<script type="text/javascript" src="popup-window.js"></script>

<style type="text/css">
dl   { margin:  0px 0px  0px  0px; }
dt   { margin:  0px 0px  0px  0px; }
dd   { margin:  0px 0px  0px 25px; }
form { margin:  0px 0px  0px  0px; }
h1   { margin:  0px 0px 20px  0px; }
h2   { margin: 20px 0px 10px  0px; }
p    { margin:  0px 0px  5px  0px; }

body  { font: 100  13px   Arial, Sans-Serif; }
b     { font: 900 1.0em   Arial, Sans-Serif; }
h1    { font: 900 1.4em   Arial, Sans-Serif; }
h2    { font: 900 1.4em   Arial, Sans-Serif; }
small { font: 100 0.8em Verdana, Sans-Serif; }
</style>
<!-- ***** head ************************************************************ -->


</head>
<body>


<h1>PHPDevel Popup Window</h1>


<?php if ( count($_POST)) { ?>
<!-- ***** Get code ******************************************************** -->
<?php

$id   = 'popup_window_id_' . strtoupper(md5(serialize(array(microtime(), rand(), $_REQUEST, $_SERVER))));

$url  = preg_replace('/\\/(|index\\.php)(|\\?.*)$/sDX', '/', "http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}");

$head = file_get_contents('templates/head.html');
$body = file_get_contents('templates/body.html');

$head = str_replace('{$url}',      $url,               $head);
$body = str_replace('{$url}',      $url,               $body);
$body = str_replace('{$id}',       $id,                $body);
$body = str_replace('{$title}',    $_POST['title'   ], $body);
$body = str_replace('{$contents}', $_POST['contents'], $body);
$body = str_replace('{$position}', $_POST['position'], $body);
$body = str_replace('{$x}',        $_POST['x'       ], $body);
$body = str_replace('{$y}',        $_POST['y'       ], $body);
$body = str_replace('{$width}',    $_POST['width'   ], $body);

?>

<h2>Get code</h2>

<dl><dt><b>&lt;head&gt;</b></dt><dd><textarea cols="100" rows="5" onclick="this.select();"><?=htmlspecialchars($head, ENT_NOQUOTES, 'UTF-8');?></textarea><br /><small>Insert this code into head section (inside &lt;head&gt;&lt;/head&gt; tags). Note that this code should be inserted only once per webpage.</small></dd><dt><b>&lt;/head&gt;</b></dt>
    <dt><b>&lt;body&gt;</b></dt><dd><textarea cols="100" rows="5" onclick="this.select();"><?=htmlspecialchars($body, ENT_NOQUOTES, 'UTF-8');?></textarea><br /><small>Insert this code into body section (inside &lt;body&gt;&lt;/body&gt; tags).                                                              </small></dd><dt><b>&lt;/body&gt;</b></dt></dl>

<br />Click this link to test the code: <?=$body;?>
<br />
<br /><a href="#" onclick="window.history.back(); return false;">&lt;&lt;back</a>
<!-- ***** Get code ******************************************************** -->
<?php } ?>


<?php if (!count($_POST)) { ?>
<!-- ***** Get code ******************************************************** -->
<h2>Get code</h2>

<form action="" method="post" onsubmit="return validate(this);">

<p>Use the form bellow to create code snippet for insertion on your website:</p>

<p><b>   Title:</b><br /><input    name="title" /></p>
<p><b>Contents:</b><br /><textarea name="contents" cols="50" rows="10"></textarea></p>

<p>
<b>Position:</b><br />
<select name="position">
<option value="tag-right-down"     >Right-down                </option>
<option value="tag-right-up"       >Right-up                  </option>
<option value="tag-bottom-right"   >Bottom-right              </option>
<option value="tag-bottom-left"    >Bottom-left               </option>
<option value="tag-top-right"      >Top-right                 </option>
<option value="tag-top-left"       >Top-left                  </option>
<option value="tag-left-down"      >Left-down                 </option>
<option value="tag-left-up"        >Left-up                   </option>
<option value="window-center"      >Window center             </option>
<option value="window-left-top"    >Window left-top corner    </option>
<option value="window-left-bottom" >Window left-bottom corner </option>
<option value="window-right-top"   >Window right-top corner   </option>
<option value="window-right-bottom">Window right-bottom corner</option>
</select>
</p>

<p><b>Horizontal offset:</b><br /><input name="x" value="0" /></p>
<p><b>  Vertical offset:</b><br /><input name="y" value="0" /></p>

<p><b>Width:</b><br /><input name="width" value="auto" /><br /><small>Enter popup window width: auto, 100px, 10em, etc</small></p>

<p><input type="submit" value="Submit" /> <input type="reset" value="Reset" /></p>

</form>

<script type="text/javascript">
function validate(sender)
{
  if ($(sender).find(   'input[name=title]'   ).val() == '') { alert('Please, fill in all required fields'); $(sender).find(   'input[name=title]'   ).select(); return false; }
  if ($(sender).find('textarea[name=contents]').val() == '') { alert('Please, fill in all required fields'); $(sender).find('textarea[name=contents]').select(); return false; }

  if (isNaN($(sender).find('input[name=x]').val())) { alert('Offset must be a valid number'); $(sender).find('input[name=x]').select(); return false; }
  if (isNaN($(sender).find('input[name=y]').val())) { alert('Offset must be a valid number'); $(sender).find('input[name=y]').select(); return false; }

  return true;
}
</script>
<!-- ***** Get code ******************************************************** -->
<?php } ?>


<?php if (!count($_POST)) { ?>
<!-- ***** Samples ********************************************************* -->
<h2>Samples</h2>

<form action="">

<p>Click one of the buttons bellow to open popup window in different positions:</p>

<p>
<input type="button" onclick="popup_window_show('#sample', { pos : 'tag-right-down',   parent : this, width : '270px' });" value="Right-down" />
<input type="button" onclick="popup_window_show('#sample', { pos : 'tag-right-up',     parent : this, width : '270px' });" value="Right-up" />
<input type="button" onclick="popup_window_show('#sample', { pos : 'tag-bottom-right', parent : this, width : '270px' });" value="Bottom-right" />
<input type="button" onclick="popup_window_show('#sample', { pos : 'tag-bottom-left',  parent : this, width : '270px' });" value="Bottom-left" />
<input type="button" onclick="popup_window_show('#sample', { pos : 'tag-top-right',    parent : this, width : '270px' });" value="Top-right" />
<input type="button" onclick="popup_window_show('#sample', { pos : 'tag-top-left',     parent : this, width : '270px' });" value="Top-left" />
<input type="button" onclick="popup_window_show('#sample', { pos : 'tag-left-down',    parent : this, width : '270px' });" value="Left-down" />
<input type="button" onclick="popup_window_show('#sample', { pos : 'tag-left-up',      parent : this, width : '270px' });" value="Left-up" />
</p>

<p>
<input type="button" onclick="popup_window_show('#sample', { pos : 'window-center',       width : '270px' });" value="Window center" />
<input type="button" onclick="popup_window_show('#sample', { pos : 'window-left-top',     width : '270px' });" value="Window left-top corner" />
<input type="button" onclick="popup_window_show('#sample', { pos : 'window-left-bottom',  width : '270px' });" value="Window left-bottom corner" />
<input type="button" onclick="popup_window_show('#sample', { pos : 'window-right-top',    width : '270px' });" value="Window right-top corner" />
<input type="button" onclick="popup_window_show('#sample', { pos : 'window-right-bottom', width : '270px' });" value="Window right-bottom corner" />
</p>

</form>

<div   class="popup_window_css" id="sample">
<table class="popup_window_css">
<tr    class="popup_window_css">
<td    class="popup_window_css">
<div   class="popup_window_css_head"><img src="images/close.gif" alt="" width="9" height="9" />Sample popup window</div>
<div   class="popup_window_css_body"><div style="border: 1px solid #808080; padding: 6px; background: #FFFFFF;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div></div>
<div   class="popup_window_css_foot"><a href="http://www.php-development.ru/javascripts/popup-window.php" title="Powered by PHPDevel Popup Window | PHPDevel web scripts collection"><img src="images/about.gif" alt="" width="6" height="6" /></a></div></td></tr></table></div>
<!-- ***** Samples ********************************************************* -->
<?php } ?>


</body>
</html>
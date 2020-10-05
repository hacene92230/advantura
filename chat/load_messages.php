<?php
include_once "../../include/verif_membres.php";
include_once "../../include/config.php";
	$allmsg = $bdd->query('SELECT * FROM chat ORDER BY id DESC LIMIT 0, 5');
	while($msg = $allmsg->fetch())
	{
		$grade_req = $bdd->prepare('SELECT id FROM chat WHERE pseudo = ?');
		$grade_req->execute(array($msg['pseudo']));
		$grade = $grade_req->rowCount();
		if($grade > 0 AND $grade < 10) {
			$grade = 'Membre junior';
		} elseif($grade >= 10 AND $grade < 50) {
			$grade = 'Membre habitué';
		} else {
			$grade = 'Membre expert';
		}
		$emoji_replace = array(':)',':-)','(angry)',':3',":'(",':|',':(',':-(',';)',';-)');
		$emoji_new = array('<img src="emojis/emo_smile.png" />','<img src="emojis/emo_smile.png" />','<img src="emojis/emo_angry.png" />','<img src="emojis/emo_cat.png" />','<img src="emojis/emo_cry.png" />','<img src="emojis/emo_noreaction.png" />','<img src="emojis/emo_sad.png" />','<img src="emojis/emo_sad.png" />','<img src="emojis/emo_wink.png" />','<img src="emojis/emo_wink.png" />');
		$msg['message'] = str_replace($emoji_replace, $emoji_new, $msg['message']);
?>
		<b><?php echo $msg['pseudo']; ?></b> (<?= $grade ?>) : <?php echo $msg['message']; ?><br />
<?php
	}
?>
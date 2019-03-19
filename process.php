<?php
// get the input
$n = $_POST["n"];
// prepare the cards
$cards = array();
// prepare the types of Spade, Heart, Diamond, and Club
$types = array('S','H','D','C');
// insert 1-13 of each types into the cards
foreach($types as $t)
{
	$cards[]=$t."-A";
	$cards[]=$t."-2";
	$cards[]=$t."-3";
	$cards[]=$t."-4";
	$cards[]=$t."-5";
	$cards[]=$t."-6";
	$cards[]=$t."-7";
	$cards[]=$t."-8";
	$cards[]=$t."-9";
	$cards[]=$t."-X";
	$cards[]=$t."-J";
	$cards[]=$t."-Q";
	$cards[]=$t."-K";
}
// shuffle the cards to make random order
shuffle($cards);
$message = "Output:";
// decide how many cards per people
	// if more than 52 people, return for 52 people only
	if($n>=52)
	{
		foreach($cards as $c){$message.= "<br/>".$c;}
	}
	elseif($n>0 && $n<52)
	{
		// number of card
		$ncard = count($cards);
		// number of card per people
		$cpeople = (int)($ncard/$n);$message.=$cpeople."--";
		// distribute the cards to per people
		$control = 1;$people = array();$cp = 0;$extra = 1;
		foreach($cards as $c)
		{
			if($extra==1)
			{
				if($control==1){$people[$cp] = "";}
				else{$people[$cp].=',';}
				$people[$cp].= $c;
				$control++;
				if($control>$cpeople){$control = 1;$cp++;}
			}else{
				$people[$cp].=','.$c;$cp++;
			}
			if($cp==$n){$cp = 0;$extra = 2;}
		}
		// distribute extra cards to people till finish
		foreach($people as $p)
		{
			$message.="<br/>".$p;
		}
	}
	else{
		
	}


echo $message;
?>
<?php
	// 使用了PHP7的高强度随机函数random_int
	
    // 1代表法拉利
	$combination = array(
		array(0, 0, 1),
		array(0, 1, 0),
		array(1, 0, 0)
	);

	$win_count = 0;
	$lose_count = 0;
	
	$number_of_trials = 1000000;
	
	foreach(range(1, $number_of_trials) as $no_of_trial) {
		// 随机选出一个法拉利和羊的组合
		$combo = $combination[random_int(0, 2)];
		
		// 用户选择
		$user_select_index = random_int(0, 2);

		// 主持人选一个山羊出来，同时是用户没有选择的
		$goat_index = null;
		for($j = 0; $j <=2; $j++) {
			if($j != $user_select_index && $combo[$j] != 1) {
				$goat_index = $j;
				break;
			}
		}

		// 选择换, 就是要选取一个既不等于用户选择的下标，也不等于$goat_index
		for($j = 0; $j <=2; $j++) {
			if( ($j != $user_select_index) && ($j != $goat_index)) {
				$user_select_index = $j;
			}
		}			
		// 选择不换，就是把上面的代码去掉就行了
	
		if($combo[$user_select_index] == 1) {
			$win_count++;	
		} else {
			$lose_count++;
		}
		
	}

	echo " win $win_count : lose $lose_count ";
	
/*

推理：
不改变选择，得到车的概率依旧是1/3。
改变选择，得到车的概率是2/3，因为第一次选择选到羊的几率是2/3，而选到羊，换门就得车，所以换门得车的几率就是2/3 。

*/

?>
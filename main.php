<?php
	// 使用了PHP7的高强度随机函数random_int
	
    // 1代表法拉利， 0代表羊
	$combination = array(
		array(1, 0, 0),
		array(0, 1, 0),
		array(0, 0, 1)
	);
	$win_count = 0;
	$lose_count = 0;
	
	$number_of_trials = 1000000;
	
	foreach(range(1, $number_of_trials) as $no_of_trial) {
		// 随机选出一个法拉利和羊的组合
		$combo = $combination[random_int(0, 2)];
		
		// 玩家随机选择一扇门
		$user_select_index = random_int(0, 2);
		
		// 主持人选一个山羊出来，同时是玩家没有选择的

		// 先找出所有玩家没有选择的而且后面有山羊的门
		$goat_indexs = array();
		for($j = 0; $j <=2; $j++) {
			if(($j != $user_select_index) && ($combo[$j] != 1)) {
				$goat_indexs[] = $j;
			}
		}

		// 如果有2个就随机选一个
		if(count($goat_indexs) == 1) {
			$goat_index = $goat_indexs[0];
		} else {
			$goat_index = $goat_indexs[random_int(0, 1)];
		}
		
		// 选择换, 就是要选取一个既不等于玩家选择的下标，也不等于$goat_index
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

	// 测试结果显示换门胜率为50%
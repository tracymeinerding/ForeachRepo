foreach ($arrHistory as $idZak0 => $vid0) {
			$class = '';
			getClass(1);
			foreach ($vid0 as $CODE0 => $vVal10) {
				$class = '';
				getClass(1);
				if($CODE0 == 'UF_QUANTITY_FACT'){
					// foreach ($vVal10 as $keyDay0 => $valDay0) {

						foreach ($vVal10 as $idProp => $props) {
					        	if(empty($class)){
					        		$class = '';//getClass();
					        	}
							if(!$arrCount[$idZak0][$props['UF_DATE']->format('d.m.Y')])$arrCount[$idZak0][$props['UF_DATE']->format('d.m.Y')] = 0;
							if(!$countSobr[$idZak0][$props['UF_DATE']->format('d.m.Y')])$countSobr[$idZak0][$props['UF_DATE']->format('d.m.Y')]['COUNT'] = [];

							if($props['UF_SOURCE'] == 'zakazy_new'){
						
								$countSobr[$idZak0][$props['UF_DATE']->format('d.m.Y')]['COUNT'][$arrCount[$idZak0][$props['UF_DATE']->format('d.m.Y')]+1] = $props['UF_VALUE_AFTER'];
								$countSobr[$idZak0][$props['UF_DATE']->format('d.m.Y')]['CLASS'] = $class;

								
							}elseif($props['UF_SOURCE'] == 'sklad'){
								
								$arrCount[$idZak0][$props['UF_DATE']->format('d.m.Y')]['COUNT'] = count($countSobr[$idZak0][$props['UF_DATE']->format('d.m.Y')]['COUNT']);
								$countSobr[$idZak0][$props['UF_DATE']->format('d.m.Y')]['CLASS2'] = $class;
								$class = '';

							}
						}
					// }
					$arrHistory[$idZak0]['COUNT_SOBR'] = $countSobr[$idZak0];

				}elseif($CODE0 == 'UF_BRAK_MODEL' || $CODE0 == 'UF_BRAK_SIZE' || $CODE0 == 'UF_BRAK' || $CODE0 == 'UF_BRAK_REJECT' || $CODE0 == 'UF_BRAK_NOFOUND' || $CODE0 == 'UF_CHECK' || $CODE0 == 'UF_BRAK_SORT' || $CODE0 == 'UF_RECHECK' || $CODE0 == 'UF_SORT_FAKT' || $CODE0 == 'UF_UPAK_FAKT'){


						foreach ($vVal10 as $idProp => $props) {
							if(!$countTransfer[$idZak0][$CODE0]['COUNT'])$countTransfer[$idZak0][$CODE0]['COUNT'] = 0;
							$countTransfer[$idZak0][$CODE0]['COUNT'] = $props['UF_VALUE_AFTER'];
						}
								
					$arrHistory[$idZak0]['COUNT_TRANSFER'][$CODE0] = $countTransfer[$idZak0][$CODE0];			
				}
			}
		}

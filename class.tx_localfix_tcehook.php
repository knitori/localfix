<?php
/**
 * Created by PhpStorm.
 * User: Lars Peter Søndergaard
 * Date: 24.04.2015
 * Time: 14:15
 */

//namespace LFM\Localfix\Hooks;


class tx_localfix_tcehook {

	/**
	 * @param string $status
	 * @param string $table
	 * @param mixed $id
	 * @param array $fieldArray
	 * @param mixed $pObj
	 */
	function processDatamap_postProcessFieldArray($status, $table, $id, &$fieldArray, &$pObj) {
		if($table == 'tt_content') {
			if(in_array($status, array('update'))) {
				// if sys_language_id is set, it's being changed. if it has a truthy value of "false", it's set to default.
				if(isset($fieldArray['sys_language_uid']) && !$fieldArray['sys_language_uid']) {
					$fieldArray['l18n_parent'] = 0;
				}
			}
		}
	}
}
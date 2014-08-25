<?php

class Pagination {

	public static function getPaginationURLs ($items, $page, $limit) {

		$pages = intval ($items/$limit) - 1;

		$urls = array ('previous' => false, 'next' => false);

		if ($pages < 1) {
			return false;	// no pagination
		}
		else if ($items % $limit) {
			$pages++;
		}

		if ($page < $pages) {
			$urls['previous'] = URL_SITE . '/'. ($page + 1);
		}	

		if ($page === 1) {
			$urls['next'] = URL_SITE;
		}		
		elseif ($page > 0) {
			$urls['next'] = URL_SITE . '/'. ($page - 1);
		}

		return $urls;
	}

	public static function getPaginationURLsPost ($current, $items) {
		$keys = array_flip(array_keys($items));
		$values = array_values($items);
		$previous = isset($values[$keys[$current['alias']] + 1]) ? URL_SITE . '/'. $values[$keys[$current['alias']] + 1]['alias'] : false;
		$next = isset($values[$keys[$current['alias']] - 1]) ? URL_SITE . '/'. $values[$keys[$current['alias']] - 1]['alias'] : false;
		return array('previous' => $previous, 'next' => $next);
	}

}

?>
<?php
/*
 * Name: ImportantWordExtractor
 * Author: Max Base
 * Date: 22 Sep, 2021
 * Repository: https://github.com/BaseMax/ImportantWordExtractor
 */

class WordExtractor {
	private $filepath = '';

	function __construct($filepath) {
		$this->filepath = $filepath;
	}

	public function extract() {
		if(!file_exists($this->filepath)) {
			return false;
		}

		$data = file_get_contents($this->filepath);
		$data = preg_replace('/[\(\)\[\]\{\}.\?\!\,\.\;\"\']/i', '', $data);
		$data = preg_replace('/[ \r\n\t]+/i', ' ', $data);
		// return $data;

		$words = explode(" ", $data);
		$words = array_map(function($value) {
			return mb_strtolower($value);
		}, $words);

		$this->saveWords($words);

		$_words = $words;
		$words = [];
		foreach($_words as $word) {
			if(isset($words[$word])) {
				$words[$word]++;
			} else {
				$words[$word] = 1;
			}
		}
		// $words = array_filter(array_map((function ($v) { return $v > 1 ? $v : 0; }), array_count_values($words)));

		asort($words);
		$words = array_reverse($words);
		return $words;
	}

	public function saveFile($words) {
		$data = "";
		foreach($words as $word=>$repeat) {
			$data.= "$repeat\t: $word\n";
		}
		file_put_contents("output.txt", $data);
		return true;
	}

	public function saveWords($words) {
		$data = "";
		foreach($words as $word) {
			$data.= "$word\n";
		}
		file_put_contents("words.txt", $data);
		return true;
	}
}

<?php

class Newses implements ICRUD {
	private $db;

	public function __construct($db) {
		$this->db = $db;
	}


	public function add(IItem $item) {
		$sql = '
			INSERT INTO news (title, content, date_added, image) 
			VALUES (
				"'.$item->title.'",
				"'.$item->content.'",
				"'.$item->date_added.'",
				"'.$item->image.'"
			)
		';
		mysqli_query($this->db, $sql);
	}

	public function update($id, IItem $item) {

		$sql = '
			UPDATE news 
			SET 
			title = "' . $item->title . '",
			content = "' . $item->content . '",
			data = "'.$item->date_added.'",
			img = "'.$item->image.'"
			WHERE id = ' . $id;

		mysqli_query($this->db, $sql);

	}


	public function delete($id) {

		$sql = '
			DELETE FROM news WHERE id = '. $id;

		mysqli_query($this->db, $sql);

	}

	public function get($id) {

		$sql = '
			SELECT * FROM news 
			WHERE id = '.$id;

		$res = mysqli_query($this->db, $sql);
		return mysqli_fetch_assoc($res);

	}

	public function getAll() {

		$sql = 'SELECT * FROM news';
		$res = mysqli_query($this->db, $sql);
		$result = array();
		while ( $row = mysqli_fetch_assoc($res) ) {
			$result[] = $row;
		}

		return $result;

	}

}
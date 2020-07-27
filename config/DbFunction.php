<?php
require('Database.php');
//$db = Database::getInstance();
//$mysqli = $db->getConnection();
class DbFunction{

	// Function: Check login account
	// Parameter: $loginid, $password
	function checkLogin($loginid,$password){

		if(!ctype_alnum($loginid) || !ctype_alnum($password)){
			header("location:login.php?Error=Please enter valid character in fill");
		}		
		else{		
			$db = Database::getInstance();
			$mysqli = $db->getConnection();
			$query = "SELECT loginid, password FROM account where loginid=? and password=? ";
			$stmt= $mysqli->prepare($query);
			if(false===$stmt){

				trigger_error("Error in query: " . mysqli_connect_error(),E_USER_ERROR);
			}

			else{

				$stmt->bind_param('ss',$loginid,$password);
				$stmt->execute();
				$stmt -> bind_result($loginid,$password);
				$rs=$stmt->fetch();
				if(!$rs)
				{
					header("location:login.php?Error=Please enter valid character in fill");
				}
				else{
					header('location:home.php?logged=true');
				}
			}

		}
	}

	// Function: Check login account
	// Parameter: $loginid, $password
	function getAccountInfor($loginid){
		if ($loginid == null) {
			header('location:home.php');
		}
		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query = "SELECT *
					FROM account where loginid = '$loginid'";
		$stmt= $mysqli->query($query);
		return $stmt;
	}

	// Function: Insert new information
	// Parameter: $loginid, $password
	function createNewsInfor($news_title, $news_type, $news_source, $news_content, $loginid){
		if ($loginid == null) {
			header('location:home.php');
		}
		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query = "INSERT INTO news_infor (title, news_type, news_source, cotent, create_id) VALUES (?, ?, ?, ?, ?) ";
		echo "xxx:" .$query;
		$stmt= $mysqli->prepare($query);
		if(false===$stmt){
			trigger_error("Error in query: " . mysqli_connect_error(),E_USER_ERROR);
		}
		else{
			$stmt->bind_param('sssss',$news_title,$news_type,$news_source,$news_content,$loginid);
			$stmt->execute();
			echo "<script>alert('Course Added Successfully')</script>";
		}
		return $stmt;
	}


	// Function: Get list of news 
	// Parameter: 
	// - news_id; 0: select all; <> 0: select by ID
	// - news_type; 0:  select all; <> 0: select news list by news_type parameter
	function getNewsInfor($news_id, $news_type, $news_source, $search_key){
		
		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query = "SELECT ni.id, nt.type_cd, nt.type_name, ns.source_cd, ns.source_name, ni.title, ni.cotent, ni.view_number, ni.vote_star, ni.create_date , ni.update_date
					FROM news_infor ni 
					LEFT JOIN news_type nt 
					ON (ni.news_type = nt.type_cd) 
					LEFT JOIN news_source ns 
					ON (ni.news_source = ns.source_cd) 
					WHERE ni.delete_flg = 0 
					AND nt.delete_flg = 0 
					AND ns.delete_flg = 0 ";
		// case: have news_id
		if ($news_id != NULL) {
			$query = $query . " AND ni.id = $news_id ";
		}
		// case: Click on News_Type
		if ($news_type != NULL) {
			$query = $query . " AND ni.news_type = $news_type ";
		}
		// case: Click on news_source
		if ($news_source != NULL) {
			$query = $query . " AND ni.news_source = $news_source ";
		}
		// case: search button
		if ($search_key != NULL) {
			$query = $query . " AND ni.title LIKE '%$search_key%' ";
		} 
		// echo "$query";
		$stmt= $mysqli->query($query);
		return $stmt;
	}

	// Function: Get list of news 
	// Parameter: 
	// - news_id; 0: select all; <> 0: select by ID
	// - getdata_mode; 0: select all; 1: select newest news list, 2: select most reading news.
	function getNewsTitle($news_id, $getdata_mode, $num_of_news){
		
		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query = "SELECT ni.id, ns.source_cd, ns.source_name, ni.title 
					FROM news_infor ni 
					LEFT JOIN news_source ns 
					ON (ni.news_source = ns.source_cd) 
					WHERE ni.delete_flg = 0 
					AND ns.delete_flg = 0 ";
		// case: have news_id
		if ($news_id != NULL) {
			$query = $query . " AND ni.id = $news_id ";
		}
		// 0: Normal
		// 1: get 5 newest news
		// 2: get 5 news that has been read
		if ($getdata_mode != NULL) {
			if ($getdata_mode === CN_newest_news_code) {
				$query = $query . " ORDER BY ni.create_date DESC ";
			}
			else {
				$query = $query . " ORDER BY ni.view_number DESC ";
			}
			$query = $query . " LIMIT $num_of_news ";
		}

		$stmt= $mysqli->query($query);
		return $stmt;
	}
	// Function: Get list of news type
	// Parameter: news_type
	// Case 0: select all
	// Case <>: select by ID
	function getNewsType($news_type){
		
		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query = "SELECT nt.type_cd, nt.type_name
					FROM  news_type nt 
					WHERE nt.delete_flg = 0 ";
		if ($news_type != NULL) {
			$query = $query . " AND nt.type_cd = $news_type";
		}
		$stmt= $mysqli->query($query);
		return $stmt;
	}

	// Function: Get list of news source
	// Parameter: news_source
	// Case 0: select all
	// Case <>: select by ID
	function getNewsSource($news_source){
		
		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query = "SELECT ns.source_cd, ns.source_name
					FROM  news_source ns 
					WHERE ns.delete_flg = 0 ";
		if ($news_source != NULL) {
			$query = $query . " AND ns.source_cd = $news_source";
		}
		$stmt= $mysqli->query($query);
		return $stmt;
	}

	// Function: Get list of related news 
	// Parameter: 
	// - news_id; 0: select all; <> 0: select by ID
	// - news_type; 0:  select all; <> 0: select news list by news_type parameter
	function getRelatedNews($news_type, $news_source, $num_of_news){
		
		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query = "SELECT ni.id, nt.type_cd, nt.type_name, ns.source_cd, ns.source_name, ni.title, ni.view_number, ni.create_date , ni.update_date
					FROM news_infor ni 
					LEFT JOIN news_type nt 
					ON (ni.news_type = nt.type_cd) 
					LEFT JOIN news_source ns 
					ON (ni.news_source = ns.source_cd) 
					WHERE ni.delete_flg = 0 
					AND nt.delete_flg = 0 
					AND ns.delete_flg = 0 ";
		// case: Click on News_Type
		if ($news_type != NULL && $news_source != NULL) {
			$query = $query . " AND (ni.news_type = $news_type OR ni.news_source = $news_source ) ";
		}
		// case: search button
		if ($num_of_news != NULL) {
			$query = $query . " ORDER BY ni.create_date DESC ";
			$query = $query . " LIMIT $num_of_news ";
		} 
		$stmt= $mysqli->query($query);
		return $stmt;
	}
}

?>
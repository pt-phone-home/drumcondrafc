<?php

/**
 * Result 
 * 
 * Score from a previous game
 */

 class Result {

    public $id;
    public $date;
    public $week_start;
    public $result_list;
    public $squad;
    public $home_team;
    public $away_team;
    public $home_team_score;
    public $away_team_score;
    public $errors = [];

    public static function getFeatured($conn) {

        $sql = "SELECT *
                FROM featured_score
                ORDER BY id DESC
                LIMIT 1";

        $results = $conn->query($sql);

        return $results->fetchall(PDO::FETCH_ASSOC);
    }

    public function createFeatured($conn) {
        
        $sql = "INSERT INTO featured_score (date, squad, home_team, away_team, home_team_score, away_team_score)
                VALUES (:date, :squad, :home_team, :away_team, :home_team_score, :away_team_score);";

        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':date', $this->date, PDO::PARAM_STR);
        $stmt->bindValue(':squad', $this->squad, PDO::PARAM_STR);
        $stmt->bindValue(':home_team', $this->home_team, PDO::PARAM_STR);
        $stmt->bindValue(':away_team', $this->away_team, PDO::PARAM_STR);
        $stmt->bindValue(':home_team_score', $this->home_team_score, PDO::PARAM_INT);
        $stmt->bindValue(':away_team_score', $this->away_team_score, PDO::PARAM_INT);
        

        return $stmt->execute();
    }

    public function resultList($conn) {

        $sql = "INSERT INTO results (week_start, result_list)
                VALUES (:week_start, :result_list)";

        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':week_start', $this->week_start, PDO::PARAM_STR);
        $stmt->bindValue(':result_list', $this->result_list, PDO::PARAM_STR);

        return $stmt->execute();

    }

    public static function getAll($conn) {

        $sql = "SELECT * 
                FROM results
                ORDER BY id DESC
                LIMIT 10";

        $results = $conn->query($sql);

        return $results->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getByID($conn, $id, $columns = '*') {
        $sql = "SELECT $columns
                FROM results
                WHERE id = :id";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Fixture');

        if ($stmt->execute()) {
            return $stmt->fetch();
        }
        
    }
 }
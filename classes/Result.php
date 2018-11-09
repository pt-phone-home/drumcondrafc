<?php

/**
 * Result 
 * 
 * Score from a previous game
 */

 class Result {

    public $id;
    public $date;
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
 }
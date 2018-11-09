<?php

/**
 * Fixture 
 * 
 * Upcoming or previous game
 */

 class Fixture {

    public $id;
    public $date;
    public $squad;
    public $home_team;
    public $away_team;
    public $location;
    public $time;
    public $errors = [];

    public static function getFeatured($conn) {

        $sql = "SELECT *
                FROM featured_fixture
                ORDER BY id DESC
                LIMIT 1";

        $results = $conn->query($sql);

        return $results->fetchall(PDO::FETCH_ASSOC);
    }

    public function createFeatured($conn) {
        
        $sql = "INSERT INTO featured_fixture (date, squad, home_team, away_team, location, time)
                VALUES (:date, :squad, :home_team, :away_team, :location, :time);";

        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':date', $this->date, PDO::PARAM_STR);
        $stmt->bindValue(':squad', $this->squad, PDO::PARAM_STR);
        $stmt->bindValue(':home_team', $this->home_team, PDO::PARAM_STR);
        $stmt->bindValue(':away_team', $this->away_team, PDO::PARAM_STR);
        $stmt->bindValue(':location', $this->location, PDO::PARAM_STR);
        $stmt->bindValue(':time', $this->time, PDO::PARAM_STR);

        return $stmt->execute();
    }
 }
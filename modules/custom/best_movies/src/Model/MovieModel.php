<?php
namespace Drupal\best_movies\Model;

use Drupal\Core\Database\Connection;
use DateTime;
class MovieModel {
  
    protected $database;

    // Constructor with Dependency Injection for database connection
    public function __construct(Connection $database) {
        $this->database = $database;
    }

    //helper method to build the base query for movies
    protected function buildMovieQuery($year = NULL){
        $query = $this->database->select('node_field_data', 'n');
        $query->fields('n', ['title', 'nid']);
        $query->join('node__field_release_year', 'rd', 'n.nid = rd.entity_id');
        $query->join('node__body', 'bd', 'n.nid = bd.entity_id');
        $query->join('node__field_type', 'mt', 'n.nid = mt.entity_id');
        $query->condition('n.type', 'movies');
        $query->addField('rd', 'field_release_year_value', 'release_date');
        $query->addField('mt', 'field_type_value', 'field_type');
        $query->addField('bd', 'body_value', 'description');

        // Apply the year filter if provided
        if ($year != '') {
            $dateTime = new DateTime($year);
            $dateTime->modify('+1 year');
            $increaseDate = $dateTime->format('Y-m-d');
            $query->condition('rd.field_release_year_value', $year, '>=');
            $query->condition('rd.field_release_year_value', $increaseDate, '<');
        }

        return $query;
    }

    // Fetch upcoming movies based on a specific year
    public function getUpcomingMovies($year) {
       
       $query = $this->buildMovieQuery($year);

       $results = $query->execute()->fetchAll();
      
      return $results;
    }

    // Fetch all movies
    public function getMovies() {
        
        $query = $this->buildMovieQuery(); //create the base query for movie table
        
        $results = $query->execute()->fetchAll();

        return $results;
    }
}

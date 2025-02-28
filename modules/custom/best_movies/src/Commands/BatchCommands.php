<?php

namespace Drupal\best_movies\Commands;

use GuzzleHttp\Client;
use Drush\Commands\DrushCommands;
use Drupal\Core\Datetime\DrupalDateTime;

class BatchCommands extends DrushCommands {

       /**
    * call this for all movies
    *
    * @command best_movies:movies
    *
    * @aliases gmovies
    *
    * @usage best_movies:movies
    *
    */
    public function populateMovies() {
        $url='https://moviesdatabase.p.rapidapi.com/titles/x/upcoming';
        $headers = [
            'X-RapidAPI-Key' => '41a9415fa1msha91e2bbbd85ac07p137e6ajsnd8f20be40467',
            'X-RapidAPI-Host' => 'moviesdatabase.p.rapidapi.com',
        ];

        //create http client
        $client= new Client();

        //put the get parameters onto $response 
        $response = $client->request('GET', $url, ['headers'=> $headers]);
        
        $data=$response->getBody()->getContents();

        $data_array=json_decode($data,TRUE);
        $results=$data_array['results'];  //put only results into php array
        
            for($i=0; $i<count($results);$i++){
                $title=$results[$i]['titleText']['text'];
                $titleType=$results[$i]['titleType']['text'];
                $releaseday=$results[$i]['releaseDate']['day'];
                $releasemonth=$results[$i]['releaseDate']['month'];
                $releaseyear=$results[$i]['releaseDate']['year'];
                $original=$results[$i]['originalTitleText']['text'];
                $timestamp = strtotime($releaseyear . '-' . $releasemonth . '-' . $releaseday);
                $dateformat = date('Y-m-d',$timestamp);
                $releaseDate = DrupalDateTime::createFromTimestamp($timestamp);
                
                $node = \Drupal::entityTypeManager()->getStorage('node')->
                create(['type' => 'movies', 'title' => $title,
                'body'=>$original,
                'field_type' => $titleType,
                'field_release_year' => $dateformat,
                ]);
                
                $node->save();
            }   

        echo"the upcomming movies stored in db!";
        echo"\n";
    }
    
}
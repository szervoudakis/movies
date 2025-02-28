<?php

namespace Drupal\best_movies\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\ReplaceCommand;
use Drupal\Core\Ajax\CommandInterface;
use Drupal\Core\Ajax\HtmlCommand;
use Drupal\best_movies\Controller\MoviesController;

class FiltersForm extends FormBase{

    /**
      * {@inheritdoc}
    */
    public function getFormId() {
        return 'movie_filter';
    }
    
    public function buildForm(array $form, FormStateInterface $form_state) {
       
        $form['date'] = array(
            '#title' =>'Search by date',
            '#type' => 'select',
            '#description' => '',
            '#attributes' => array('class'=>array('date-option')),
            '#options' => array(
              '' => t('--Upcomming Movies By Year--'),
              '2023-01-01' => t('2023 Upcomming Movies'),
              '2024-01-01' => t('2024 Upcomming Movies'),
              '2025-01-01' => t('2025 Upcomming Movies'),
              '2026-01-01' => t('2026 Upcomming Movies'),
              '2027-01-01' => t('2027 Upcomming Movies')), 
            '#default_value'=> '',
            '#ajax' => [
                'callback' => '::renderItems',
                'event' => 'change', 
              ],
        );
        

        return $form;
    }

    public function renderItems(array &$form, FormStateInterface $form_state){
      $themename = 'render_movies';
      $results = [];
      $date=$form_state->getValue('date');
  
      // Instantiate MovieModel and get upcoming movies
      $movieModel = \Drupal::service('best_movies.movie_model');
      $results = $movieModel->getUpcomingMovies($date);
  
      // Create a render array for the updated content
      $output = [
          '#theme' => $themename,
          '#movies' => $results,
      ];
  
      // Create an AjaxResponse
      $response = new AjaxResponse();
      $response->addCommand(new ReplaceCommand('#movie-items', $output));
  
      // **Explicitly attach the JS library**
      $response->setAttachments([
          'library' => [
              'best_movies/js/moreinfo',
          ],
      ]);
  
      return $response;    
    }

    public function validateForm(array &$form, FormStateInterface $form_state) {
        //check if the user enter....
    }

    public function submitForm(array &$form, FormStateInterface $form_state) {
      return 0;
    }
}
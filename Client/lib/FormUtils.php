<?php

class FormUtils {

    public static function getPostValue($index, $sanitize_func, $validate_func) {

      $was_posted = isset($index);
      if (!$was_posted) {
        return [
          'value'    => '',
          'is_valid' => false
        ];
      }

      $value = $index;
      if ($sanitize_func !== NULL) {
        $value = filter_var($value, $sanitize_func);
      }

      $is_valid = true;
      if ($validate_func !== NULL) {
        $is_valid = filter_var($value, $validate_func);
      }

      return [
        'value'    => $value,
        'is_valid' => $is_valid
      ];
    }

    public static function getPostInt($index, $min = PHP_INT_MIN, $max = PHP_INT_MAX) {

      $rawVal = FormUtils::getPostValue($index, FILTER_SANITIZE_NUMBER_INT, FILTER_VALIDATE_INT);
  
      if ($rawVal['is_valid']) {
  
        $rawVal['value'] = (int)$rawVal['value'];
  
        if ($rawVal['value'] < $min || $rawVal['value'] > $max) {
          $rawVal['is_valid'] = false;
        }
      }
      return $rawVal;
    }

    public static function getPostFloat($index, $min = PHP_INT_MIN, $max = PHP_INT_MAX) {

      $raw_value = FormUtils::getPostValue($index, NULL, FILTER_VALIDATE_FLOAT);
      if ($raw_value['is_valid']) {

        $raw_value['value'] = (float)$raw_value['value'];

        if ($raw_value['value'] < $min || $raw_value['value'] > $max) {
            $raw_value['is_valid'] = false;
        }
        //input must be like preg_match below
        if(!preg_match("@^[0-9]*\.?[0-9]{2}$@", $raw_value['value'])) {
            $raw_value['is_valid'] = false;
        }
      }            
      return $raw_value;
    }

    public static function getPostName($index, $allow_empty = false) {
      $raw_value = FormUtils::getPostValue($index, FILTER_SANITIZE_STRING, NULL);

      if ($raw_value['is_valid']) {

        $raw_value['value'] = trim($raw_value['value']);

        if (!$allow_empty && empty($raw_value['value'])) {
            $raw_value['is_valid'] = false;
        }
        
        //input must be like preg_match below
        if(!preg_match("@^[A-Za-z.-]+(\s*[A-Za-z.-]+)*$@", $raw_value['value'])) {
            $raw_value['is_valid'] = false;
        }
      }
      return $raw_value;
    }

    //built in method to check  that the email is of correct format and sanitize the email
    public static function getPostEmail($index, $allow_empty = false) 
    {
        return FormUtils::getPostValue($index, FILTER_SANITIZE_EMAIL, FILTER_VALIDATE_EMAIL);
    }

    public static function getPostString($index, $allow_empty = false) {
      $raw_value = FormUtils::getPostValue($index, FILTER_SANITIZE_STRING, NULL);

      if ($raw_value['is_valid']) {

          $raw_value['value'] = trim($raw_value['value']);
  
          if (!$allow_empty && empty($raw_value['value'])) {
              $raw_value['is_valid'] = false;
          }
      }
      return $raw_value;
    }

} ?>
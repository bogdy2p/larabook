<?php
namespace Larabook\Forms;

use Laracasts\Validation\FormValidator;

class PublishStatusForm extends FormValidator {
 /**
  * Validates the form of publishing a new status.
  */
    protected $rules= [
        'body' => 'required',
    ];

//put your code here
}

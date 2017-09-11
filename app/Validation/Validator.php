<?php

namespace SlimBlog\Validation;

use Respect\Validation\Exceptions\NestedValidationException;

/**
 * Class Validator
 *
 * @package SlimBlog\Validation
 */
class Validator {

  /**
   * @var array $errors
   *   Invalid fields.
   */
  protected $errors;

  /**
   * Method to validate submitted fields.
   *
   * @param $request
   * @param array $rules
   *    Array with fields which must be validated.
   *
   * @return $this
   */
  public function validate($request, array $rules) {
        foreach ($rules as $field => $rule) {
            try {
                $rule->setName(ucfirst($field))->assert($request->getParam($field));
            } catch (NestedValidationException $e) {
                $this->errors[$field] = $e->getMessages();
            }
        }

        $_SESSION['errors'] = $this->errors;

        return $this;
    }

  /**
   * Method to check for failed validation.
   *
   * @return bool
   */
  public function failed() {
        return !empty($this->errors);
    }
}
<?php

namespace App\Util\Form;

use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * FormHandler
 * 
 * @author Panteley Panteleev <p_panteleev@abv.bg>
 */
class FormHandler
{

    /**
     * @param FormInterface $form
     * @return JsonResponse
     */
    public static function handleFormErrors(FormInterface $form)
    {
        $formErrors = array();
        foreach ($form->getErrors() as $error) {
            $formErrors['global'][] = $error->getMessage();
        }

        $serializeErrors = function($form) use (&$serializeErrors) {
            $localErrors = array();
            foreach ($form->getIterator() as $key => $child) {
                foreach ($child->getErrors() as $error) {
                    $localErrors[$key] = $error->getMessage();
                }

                if (count($child->getIterator()) > 0) {
                    $localErrors[$key] = $serializeErrors($child);
                }
            }

            return $localErrors;
        };
        
        return new JsonResponse(array(
            'status' => 'ERROR',
            'errors' => array_merge($formErrors, $serializeErrors($form)),
        ), Response::HTTP_BAD_REQUEST);
    }
}

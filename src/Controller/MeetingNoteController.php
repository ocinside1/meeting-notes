<?php

namespace App\Controller;

use App\Form\MeetingNoteType;
use App\Util\Form\FormHandler;
use App\Service\MeetingNoteService;
use Symfony\Component\HttpFoundation\Request;

class MeetingNoteController extends BaseController
{
    /**
     * @param  int $id
     * @return Response
     */
    public function getAction(int $id)
    {
        return $this->sendResponse(['a' => 'test']);
    }

    public function postAction(Request $request, MeetingNoteService $meetingNoteService)
    {
        $form = $this->createForm(MeetingNoteType::class);
        $form->submit($request->request->all());
        if ($form->isValid() === false) {
            return FormHandler::handleFormErrors($form);
        }
        
        try {
            $meetingNoteService->store($form->getData());
        } catch (\Exception $e) {
            throw $e;
        }
        
        return $this->sendResponse(['status' => 'SUCCESS', 'message' => 'Successfully added meeting note']);
    }
}

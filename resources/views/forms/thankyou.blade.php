@php
    flash()->success($form->thankyou_template ? $form->thankyou_template : 'Inquiry has been received.');
    header('Location: '.url()->previous());
@endphp
OK
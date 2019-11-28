require('./style.css');
{
  const init = () => {
    document.documentElement.classList.add('has-js');

    const $form = document.querySelector(`.activity__form`);

    if ($form) {
      $form.noValidate = true;
      $form.addEventListener('submit', handleSubmitForm);
      const fields = $form.querySelectorAll(`.input`);
      addValidationListeners(fields);
    }

    form();
  };

  // Form
  const form = () => {
    //Select the buttons
    const $next = document.querySelectorAll('.next');
    //Add the event listener to go to the next / prev step
    $next.forEach(next => next.addEventListener('click', handleNextPhase));

    const $prev = document.querySelectorAll('.prev');
    $prev.forEach(prev => prev.addEventListener('click', handlePrevPhase));
  };

  const handleNextPhase = e => {
    e.preventDefault();

    const $id = parseFloat(e.currentTarget.dataset.id);

    //Sets the current page invisble
    const $currentPhase = document.querySelector(`.phase${$id}`);
    $currentPhase.style.display = 'none';

    //Sets the next page visible
    const $nextPhase = document.querySelector(`.phase${$id + 1}`);
    $nextPhase.style.display = 'block';
  };

  const handlePrevPhase = e => {
    e.preventDefault();

    const $id = parseFloat(e.currentTarget.dataset.id);

    //Sets the current page invisble
    const $currentPhase = document.querySelector(`.phase${$id}`);
    $currentPhase.style.display = 'none';

    //Sets the previous page visible
    const $prevPhase = document.querySelector(`.phase${$id - 1}`);
    $prevPhase.style.display = 'block';
  };

  const handleSubmitForm = e => {
    const $form = e.currentTarget;
    if (!$form.checkValidity()) {
      e.preventDefault();

      const fields = $form.querySelectorAll(`.input`);
      fields.forEach(showValidationInfo);

      $form.querySelector(`.jserror`).innerHTML = `Some errors occured`;
    } else {
      console.log(`Form is valid => submit form`);
    }
  };

  const showValidationInfo = $field => {
    let message;
    if ($field.validity.valueMissing) {
      message = `Required`;
    }
    if ($field.validity.typeMismatch) {
      message = `Type not right`;
    }
    if ($field.validity.rangeOverflow) {
      const max = $field.getAttribute(`max`);
      message = `Too big, max ${max}`;
    }
    if ($field.validity.rangeUnderflow) {
      const min = $field.getAttribute(`min`);
      message = `Too small, min ${min}`;
    }
    if ($field.validity.tooShort) {
      const min = $field.getAttribute(`minlength`);
      message = `Too short, minimum length is ${min}`;
    }
    if ($field.validity.tooLong) {
      const max = $field.getAttribute(`maxlength`);
      message = `Too long, maximum length is ${max}`;
    }
    if (message) {
      $field.parentElement.querySelector(`.jserror`).textContent = message;
    }
  };

  const handeInputField = e => {
    const $field = e.currentTarget;
    if ($field.checkValidity()) {
      $field.parentElement.querySelector(`.jserror`).textContent = ``;
      if ($field.form.checkValidity()) {
        $field.form.querySelector(`.jserror`).innerHTML = ``;
      }
    }
  };

  const handeBlurField = e => {
    const $field = e.currentTarget;
    showValidationInfo($field);
  };

  const addValidationListeners = fields => {
    fields.forEach($field => {
      $field.addEventListener(`input`, handeInputField);
      $field.addEventListener(`blur`, handeBlurField);
    });
  };

  init();
}

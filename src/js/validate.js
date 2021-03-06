export const handleSubmitForm = e => {
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

export const addValidationListeners = fields => {
  fields.forEach($field => {
    $field.addEventListener(`input`, handeInputField);
    $field.addEventListener(`blur`, handeBlurField);
  });
};

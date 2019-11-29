require('./style.css');
import {handleSubmitForm, addValidationListeners} from './js/validate.js';

{
  const init = () => {
    document.documentElement.classList.add('has-js');

    const $form = document.querySelector(`.activity__form`);

    if ($form) {
      $form.noValidate = true;
      $form.addEventListener('submit', handleSubmitForm);
      const $videoInput = $form.querySelector('.video-input');
      $videoInput.addEventListener('input', handleVideoInput);
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

  const handleVideoInput = e => {
    const $link = e.currentTarget.value;
    const embedLink = $link.split('=').pop();
    const $videoContainer = e.currentTarget.parentElement.parentElement.querySelector('.detail_video');

    $videoContainer.innerHTML = `<iframe width="560" height="315" src="https://www.youtube.com/embed/${embedLink}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`;
  };


  init();
}

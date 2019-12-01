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

      const $timestamp = $form.querySelector('#time');
      $timestamp.addEventListener('input', handleTimeInput);
      $timestamp.addEventListener('mouseup', handleTimeMouseUp);

      const $minutes = $form.querySelector('#time1');
      $minutes.addEventListener('input', handleMinuteInput);
      const $seconds = $form.querySelector('#time2');
      $seconds.addEventListener('input', handleSecondInput);

      const $amount = $form.querySelector('#amount');
      $amount.addEventListener('input', handleAmountInput);


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

    $videoContainer.innerHTML = `<iframe class="frame" width="560" height="315" src="https://www.youtube.com/embed/${embedLink}?autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`;
  };

  const convertToMinutes = sec => {
    const minutes = Math.floor(sec / 60);
    let seconds = sec - minutes * 60;
    seconds = (`0${seconds}`).slice(- 2);
    return `${minutes}:${seconds}`;
  };

  const handleTimeInput = e => {
    const value = e.currentTarget.value;
    const seconds = Math.floor(value * 60);
    const time = convertToMinutes(seconds);
    document.querySelector('.timestamp__text').textContent = `Timestamp: ${time}`;
  };

  const handleTimeMouseUp = e => {
    const value = e.currentTarget.value;
    const seconds = Math.floor(value * 60);
    const link = document.querySelector('.video-input').value;
    if (link) {
      const $videoContainer = e.currentTarget.parentElement.parentElement.querySelector('.detail_video');
      $videoContainer.innerHTML = `<iframe class="frame" width="560" height="315" src="https://www.youtube.com/embed/${link.split('=').pop()}?autoplay=1&start=${seconds}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`;
    }
  };

  const handleMinuteInput = e => {
    const $mins = e.currentTarget.value * 60;
    const $secs = parseInt(document.querySelector('#time2').value);
    const time = $mins + $secs;
    const $totalTime = document.querySelector('.activity__extra-time__total');
    const amount = document.querySelector('#amount').value;
    $totalTime.textContent = convertToMinutes(time * amount);
  };

  const handleSecondInput = e => {
    const $secs = parseInt(e.currentTarget.value);
    const $mins = parseInt(document.querySelector('#time1').value) * 60;
    const time = $mins + $secs;
    const $totalTime = document.querySelector('.activity__extra-time__total');
    const amount = document.querySelector('#amount').value;
    $totalTime.textContent = convertToMinutes(time * amount);
  };

  const handleAmountInput = e => {
    const amount = e.currentTarget.value;

    const $text = document.querySelector('.amount__text');
    $text.textContent = amount;
    $text.style.marginLeft = `${(amount * 25) - 25}%`;

    const $mins = parseInt(document.querySelector('#time1').value) * 60;
    const $secs = parseInt(document.querySelector('#time2').value);
    const time = ($mins + $secs) * amount;
    const $totalTime = document.querySelector('.activity__extra-time__total');
    $totalTime.textContent = convertToMinutes(time);

  };



  init();
}

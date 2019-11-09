require('./style.css');
{
  const init = () => {
    document.documentElement.classList.add('has-js');
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

    //validation!

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

  init();
}

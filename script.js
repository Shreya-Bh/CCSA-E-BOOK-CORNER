const quizData = [
    {
      question: 'Javascript is an _______ language?',
      options: ['Object-Oriented', 'Object-Based', 'Procedural', 'None of the above'],
      answer: 'Object-Oriented',
    },
    {
      question: 'Upon encountering empty statements, what does the Javascript Interpreter do?',
      options: ['Throws an error', 'Ignores the statements', 'Gives a warming', 'None of the above'],
      answer: 'Ignore the statements',
    },
    {
      question: 'Who invented Java Programming?',
      options: ['Guido van Rossum', 'James Gosling', 'Dennis Ritchie', 'Bjarne Stroustrup'],
      answer: 'James Gosling',
    },
    {
      question: 'Which component is used to compile, debug and execute the java programs?',
      options: ['JRE', 'JIT', 'JDK', 'JVM'],
      answer: 'JDK',
    },
    {
      question: 'What is the range of values that can be stored by int datatype in C?',
      options: [
        '-(2^31) to (2^31)-1',
        '-256 to 255',
        '-(2^63) to (2^63)-1',
        '0 to (2^31)-1',
      ],
      answer: '-(2^31) to (2^31)-1',
    },
    {
      question: 'How is the 3rd element in an array accessed based on pointer notation in c?',
      options: ['*a+3', '*(a+3)', '*(*a+3)', '&(a+3)'],
      answer: '*(a+3)',
    },
    {
      question: 'What is HTML?',
      options: [
        'HTML describes the structure of a webpage',
        'HTML is the standard markup language mainly used to create web pages',
        'HTML consists of a set of elements that helps the browser how to view the content',
        'All of the mentioned',
      ],
      answer: 'All of the mentioned',
    },
    {
      question: 'What is the correct syntax of doctype in HTML5?',
      options: ['</doctype html>', '<doctype html>', '<doctype html!>', '<!doctype html>'],
      answer: '<!doctype html>',
    },
    {
      question: 'What is data in a MySQL database organized into?',
      options: [
        'Objects',
        'Tables',
        'Networks',
        'File systems',
      ],
      answer: 'Tables',
    },
    {
      question: 'Which of the following sorting algorithms is the fastest for sorting small arrays?',
      options: ['Quick sort', 'Shell sort', 'Insertion sort', 'Heap sort'],
      answer: 'Insertion sort',
    },
  ];
  
  const quizContainer = document.getElementById('quiz');
  const resultContainer = document.getElementById('result');
  const submitButton = document.getElementById('submit');
  const retryButton = document.getElementById('retry');
  const showAnswerButton = document.getElementById('showAnswer');
  
  let currentQuestion = 0;
  let score = 0;
  let incorrectAnswers = [];
  
  function shuffleArray(array) {
    for (let i = array.length - 1; i > 0; i--) {
      const j = Math.floor(Math.random() * (i + 1));
      [array[i], array[j]] = [array[j], array[i]];
    }
  }
  
  function displayQuestion() {
    const questionData = quizData[currentQuestion];
  
    const questionElement = document.createElement('div');
    questionElement.className = 'question';
    questionElement.innerHTML = questionData.question;
  
    const optionsElement = document.createElement('div');
    optionsElement.className = 'options';
  
    const shuffledOptions = [...questionData.options];
    shuffleArray(shuffledOptions);
  
    for (let i = 0; i < shuffledOptions.length; i++) {
      const option = document.createElement('label');
      option.className = 'option';
  
      const radio = document.createElement('input');
      radio.type = 'radio';
      radio.name = 'quiz';
      radio.value = shuffledOptions[i];
  
      const optionText = document.createTextNode(shuffledOptions[i]);
  
      option.appendChild(radio);
      option.appendChild(optionText);
      optionsElement.appendChild(option);
    }
  
    quizContainer.innerHTML = '';
    quizContainer.appendChild(questionElement);
    quizContainer.appendChild(optionsElement);
  }
  
  function checkAnswer() {
    const selectedOption = document.querySelector('input[name="quiz"]:checked');
    if (selectedOption) {
      const answer = selectedOption.value;
      if (answer === quizData[currentQuestion].answer) {
        score++;
      } else {
        incorrectAnswers.push({
          question: quizData[currentQuestion].question,
          incorrectAnswer: answer,
          correctAnswer: quizData[currentQuestion].answer,
        });
      }
      currentQuestion++;
      selectedOption.checked = false;
      if (currentQuestion < quizData.length) {
        displayQuestion();
      } else {
        displayResult();
      }
    }
  }
  
  function displayResult() {
    quizContainer.style.display = 'none';
    submitButton.style.display = 'none';
    retryButton.style.display = 'inline-block';
    showAnswerButton.style.display = 'inline-block';
    resultContainer.innerHTML = `You scored ${score} out of ${quizData.length}!`;
  }
  
  function retryQuiz() {
    currentQuestion = 0;
    score = 0;
    incorrectAnswers = [];
    quizContainer.style.display = 'block';
    submitButton.style.display = 'inline-block';
    retryButton.style.display = 'none';
    showAnswerButton.style.display = 'none';
    resultContainer.innerHTML = '';
    displayQuestion();
  }
  
  function showAnswer() {
    quizContainer.style.display = 'none';
    submitButton.style.display = 'none';
    retryButton.style.display = 'inline-block';
    showAnswerButton.style.display = 'none';
  
    let incorrectAnswersHtml = '';
    for (let i = 0; i < incorrectAnswers.length; i++) {
      incorrectAnswersHtml += `
        <p>
          <strong>Question:</strong> ${incorrectAnswers[i].question}<br>
          <strong>Your Answer:</strong> ${incorrectAnswers[i].incorrectAnswer}<br>
          <strong>Correct Answer:</strong> ${incorrectAnswers[i].correctAnswer}
        </p>
      `;
    }
  
    resultContainer.innerHTML = `
      <p>You scored ${score} out of ${quizData.length}!</p>
      <p>Incorrect Answers:</p>
      ${incorrectAnswersHtml}
    `;
  }
  
  submitButton.addEventListener('click', checkAnswer);
  retryButton.addEventListener('click', retryQuiz);
  showAnswerButton.addEventListener('click', showAnswer);
  
  displayQuestion();
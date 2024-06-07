let questionData = {};
document.addEventListener("DOMContentLoaded", async function () {
  try {
    questionData = await fetchQuestion(); // Assign the result of fetchQuestion() to questionData
    console.log(questionData);
    generateDemographic(questionData);
  } catch (error) {
    console.error("Error:", error);
  }
});

// Store every upcoming responses
let response = {};

// Fetch question in JSON file
async function fetchQuestion() {
  const response = await fetch("questions.json");
  if (!response.ok) {
    throw new Error(`HTTP error! Status: ${response.status}`);
  }
  return response.json();
}

function generateDemographic(questionData) {
  // Get demographic options
  let demographicOptions = document.getElementById("demographic");
  questionData.demographic.options.forEach((option) => {
    demographicOptions.innerHTML += `<option value="${option}">${option}</option>`;
  });
}

function submitDemographic() {
  response = {
    name: document.getElementById("name").value,
    demographic: document.getElementById("demographic").value,
  };
  // console.log(response);
  generateQuestions(response);
}


// Generate question based on demographic
function generateQuestions(response) {
  let financialForm = document.getElementById("financialForm");
  financialForm.style.visibility = "visible";
  questionData.categories.forEach((category) => {
    if (category.demographic === response.demographic) {
      category.questions.forEach((question) => {
        let html = ""; 
        switch (question.type) {
          case "number":
            html = generateNumberQuestion(question);
            break;
          case "select":
            html = generateSelectQuestion(question);
            break;
        }
        financialForm.innerHTML += html;
        if(question.followUp) {
          generateFollowUpQuestion(question, financialForm);
        }
      });
    }
  });
  financialForm.innerHTML += `<button type="button" class="btn btn-primary mt-2" onclick="submitFinancial()">Submit</button>`;
}

function generateNumberQuestion(question) {
  return `
  <div class="form-group my-3">
    <label for="${question.name}">${question.question}</label>
    <input type="${question.type}" class="form-control" id="${question.name}" placeholder="${question.placeholder}">
  </div>
  `;
}

function generateSelectQuestion(question) {
  let html = `
  <div class="form-group my-3">
    <label for="${question.name}" class="form-label">${question.question}</label>
    <select class="form-select" id="${question.name}">
      <option selected disabled>Choose One</option>
  `;
  question.options.forEach((option) => {
    html += `<option value="${option}">${option}</option>`;
  });
  html += `
    </select>
  </div>
  `;
  return html;
}

function generateTextQuestion(question) {
  return `
  <div class="form-group my-4">
    <label for="${question.name}">${question.question}</label>
    <input type="${question.type}" class="form-control" id="${question.name}" placeholder="${question.placeholder}">
  </div>
  `;
}

function generateFollowUpQuestion(question, financialForm) {
  let containerID = question.followUp.name + "Container";
  let html = `<div id="${containerID}" style="display:none">`;
  switch (question.followUp.type) {
    case "text":
      html += generateTextQuestion(question.followUp);
      break;
    case "select":
      html += generateSelectQuestion(question.followUp);
      break;
  }
  html += `</div>`;
  financialForm.innerHTML += html;

  // MutationObserver callback
  const callback = function(mutationsList, observer) {
    for (const mutation of mutationsList) {
      if (mutation.type === 'childList') {
        let inputElement = document.getElementById(question.name);
        if (inputElement) {
          console.log(inputElement) ;
          let container = document.getElementById(containerID);
          inputElement.addEventListener("input", function() {
            if (inputElement.value === question.followUp.key) {
              container.style.display = "block"; 
            } else {
              container.style.display = "none";
            }
          });
          observer.disconnect(); 
          break;
        }
      }
    }
  };


  const observer = new MutationObserver(callback);
  observer.observe(financialForm, { childList: true, subtree: true });
}

function submitFinancial(){
  getFinancialData();
}

function getFinancialData(){
  let financialData = {};
  questionData.categories.forEach((category) => {
    if (category.demographic === response.demographic) {
      category.questions.forEach((question) => {

        let inputElement = document.getElementById(question.name);
        if(question.followUp) {
          inputElement = document.getElementById(question.followUp.name);
        }else{
          inputElement = document.getElementById(question.name);
        }
        
        if (inputElement) {
          financialData[question.name] = inputElement.value;
        }
      });
    }
  });
  console.log(financialData);
}

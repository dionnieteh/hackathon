const quesSection = Object.freeze({
  students: [
    "Assets",
    "Financial Dependency",
    "Expenditure",
    "Biggest Expenditure",
    "Savings",
    "Household",
  ],
  retiree: [
    "Assets",
    "EPF",
    "Expenditure",
    "Biggest Expenditure",
    "Savings",
    "Household",
  ],
  adult: [
    "Employment",
    "Expenditure",
    "Biggest Expenditure",
    "Savings",
    "Household",
  ],
});

let questionData = {};
let sections = 0;

document.addEventListener("DOMContentLoaded", async function () {
  try {
    questionData = await fetchQuestion(); // Assign the result of fetchQuestion() to questionData
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
  financialData = {
    name: document.getElementById("name").value,
    demographic: document.getElementById("demographic").value,
  };

  // document.getElementById('container').classList.add('container-hidden');
  // console.log("User Demographic: ", response);
  // setTimeout(function() {
  // generateQuestions(response);
  // }, 560);

  console.log("User Demographic: ", financialData);

  let demographicForm = document.getElementById("demographicForm");
  demographicForm.style.display = "none";
  generateQuestions();
}

let seq = null;
// Generate question based on demographic
function generateQuestions() {
  let financialForm = document.getElementById("financialForm");
  financialForm.style.display = "block";
  switch (financialData.demographic) {
    case "High School/University Student":
      seq = quesSection.students;
      break;
    case "Retiree":
      seq = quesSection.retiree;
      break;
    case "Adults":
      seq = quesSection.adult;
      break;
  }
  let length = seq.length;
  if (sections < length) {
    generateQuestionsBasedOnSection(sections, seq, length);
    sections = updateSection(sections);
  }
}

function generateQuestionsBasedOnSection(sections, seq, length) {
  let part = seq[sections];
  let form = document.getElementById("financialForm");

  questionData.categories.forEach((category) => {
    // let type = seq[sections]
    if (category.questionCategory == part) {
      // console.log(category.questions);
      category.questions.forEach((question) => {
        let html = "";
        switch (question.type) {
          case "number":
            html = generateNumberQuestion(sections, question);
            break;
          case "select":
            html = generateSelectQuestion(sections, question);
            break;
          case "radio":
            html = generateRadioQuestion(sections, question);
            break;
        }
        // console.log(html)
        form.innerHTML += html;
        if (question.followUp) {
          generateFollowUpQuestion(sections, question, form);
        }
      });
    }
  });
  // console.log("Sections: ", part, sections, length-1)

  if (sections != length - 1) {
    // console.log("Sections: ", sections, seq);
    form.innerHTML += `<button type="button" class="btn btn-primary mt-2 btn-next" onclick="validateInput('${part}');" visibility="visible">Next</button>`;
  } else {
    form.innerHTML += `<button type="button" class="btn btn-primary mt-2 btn-next" onclick="validateInput('${part}');storeFinancialData('${part}');submitFinancial();" visibility="visible">Submit</button>`;
  }
}

function validateInput(part) {
  let emptyFields = [];
  let valid = true;
  questionData.categories.forEach((category) => {
    if (category.questionCategory == part) {
      category.questions.forEach((question) => {
        let inputElement = document.getElementById(question.name);
        if (inputElement) {
          if (inputElement.value === "" || inputElement.value === "Choose One") {
            emptyFields.push(question.question);
            valid = false;
          }
        }
      });
    }
  });

  if (!valid) {
    let emptyFieldsMessage = "Please answer the following questions.\n" + emptyFields.join("\n");
    alert(emptyFieldsMessage);
    return;
  }else{
    storeFinancialData(part);
    generateQuestions();
  }
}

function updateSection(sections) {
  return ++sections;
}

function storeFinancialData(part) {
  console.log(part);
  questionData.categories.forEach((category) => {
    if (category.questionCategory == part) {
      category.questions.forEach((question) => {
        // console.log(question.name);
        let inputElement = document.getElementById(question.name);
        // console.log(inputElement)

        // Update with follow up value
        if (question.followUp && inputElement.value === question.followUp.key) {
          inputElement = document.getElementById(question.followUp.name);
        } else {
          inputElement = document.getElementById(question.name);
        }

        // Get selected radio button
        if (question.type === "radio") {
          let radioButtons = document.getElementsByName(question.name);
          radioButtons.forEach((radioButton) => {
            if (radioButton.checked) {
              financialData[question.name] = radioButton.value;
            }
          });
        }

        if (inputElement) {
          // console.log(inputElement.value)
          financialData[question.name] = inputElement.value;
        }
      });
    }
  });
  console.log(financialData);
  hideQuestions();
}

function hideQuestions(section) {
  section = document.getElementsByClassName(`section-${sections - 1}`);
  for (let i = 0; i < section.length; i++) {
    section[i].style.display = "none";
  }
  let sectionButton = document.getElementsByClassName(`btn-next`);
  for (let i = 0; i < sectionButton.length; i++) {
    sectionButton[i].style.display = "none";
  }
}

function generateNumberQuestion(sections, question) {
  return `
  <div class="form-group my-3 section-${sections}" style="visibility:visible;">
    <label for="${question.name}">${question.question}</label>
    <input type="${question.type}" class="form-control" id="${question.name}" placeholder="${question.placeholder}">
  </div>
  `;
}

function generateSelectQuestion(sections, question) {
  let html = `
  <div class="form-group my-3 section-${sections}">
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

function generateRadioQuestion(question) {
  let html = `
  <div class="form-group my-3 sections-${sections}">
    <label for="${question.name}" class="form-label">${question.question}</label>
    `;
  let count = 1;
  question.options.forEach((option) => {
    id = question.name + count;
    html += `
      <div class="form-check">
        <input class="form-check-input" type="radio" name="${question.name}" value="${option}" id="${id}">
        <label class="form-check-label" for="${id}">
          ${option}
        </label>
      </div>
    `;
    count++;
  });
  html += `</div>`;
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

function generateFollowUpQuestion(sections, question, financialForm) {
  let containerID = question.followUp.name + "Container";
  let html = `<div id="${containerID}" style="display:none">`;
  switch (question.followUp.type) {
    case "text":
      html += generateTextQuestion(sections, question.followUp);
      break;
    case "select":
      html += generateSelectQuestion(sections, question.followUp);
      break;
  }
  html += `</div>`;
  financialForm.innerHTML += html;

  // MutationObserver callback
  const callback = function (mutationsList, observer) {
    for (const mutation of mutationsList) {
      if (mutation.type === "childList") {
        let inputElement = document.getElementById(question.name);
        if (inputElement) {
          // console.log(inputElement);
          let container = document.getElementById(containerID);
          inputElement.addEventListener("input", function () {
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

// Generate and display the final response from the model
function submitFinancial() {
  var response = document.getElementById("response");
  let finalPrompt = generatePrompt();

  fetch("response.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({
      userText: finalPrompt,
      // modelText: model,
    }),
  })
    .then((res) => res.text())
    .then((res) => {
      response.innerHTML = res;
    });
}

function generatePrompt() {
  let finalPrompt = "";
  fetchPrompt()
    .then((promptData) => {
      finalPrompt = classifyPrompt(promptData);
    })
    .catch((error) => {
      console.error("Error:", error);
    });

  console.log("Final Prompt: ", finalPrompt);
  return finalPrompt;
}

function fetchPrompt() {
  return fetch("prompts.json").then((response) => {
    if (!response.ok) {
      throw new Error(`HTTP error! Status: ${response.status}`);
    }
    return response.json();
  });
}

function classifyPrompt(promptData) {
  console.log("Financial Data: ", financialData);
  let finalPrompt = "";

  // Filter prompts based on demographic
  promptData.categories.forEach((category) => {
    if (category.demographic === financialData.demographic) {
      // console.log(category);
      category.prompts.forEach((prompt) => {
        let promptText = "";

        // Identify type of condition to process

        let condition = financialData[prompt.condition];
        let value = prompt.conditionValue; // To store user dynamic input

        switch (prompt.type) {
          case "greater":
            if (condition > value) {
              promptText = prompt.trueText;
            } else {
              promptText = prompt.falseText;
            }
            break;
          case "equal":
            if (condition == value) {
              promptText = prompt.trueText;
            } else {
              promptText = prompt.falseText;
            }
            break;
          case "none":
            promptText = prompt.text;
            break;
        }

        prompt.names.forEach((name) => {
          value = financialData[name];
          if (promptText) {
            promptText = promptText.replace(`{${name}}`, value);
          }
        });

        finalPrompt += promptText;
      });
    }
    console.log("Final Prompt: ", finalPrompt);
    return finalPrompt;
  });
}

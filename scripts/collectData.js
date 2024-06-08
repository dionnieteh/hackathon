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
    questionData = await fetchQuestion();
    generateDemographic(questionData);
  } catch (error) {
    console.error("Error:", error);
  }
});

let response = {};

async function fetchQuestion() {
  const response = await fetch("questions.json");
  if (!response.ok) {
    throw new Error(`HTTP error! Status: ${response.status}`);
  }
  return response.json();
}

function generateDemographic(questionData) {
  let demographicOptions = document.getElementById("demographic");
  questionData.demographic.options.forEach((option) => {
    demographicOptions.innerHTML += `<option value="${option}">${option}</option>`;
  });
}

function submitDemographic() {
  const name = document.getElementById("name").value;
  const demographic = document.getElementById("demographic").value;
  if (name === "" || /\d/.test(name) || demographic === "Choose One") {
    if (name !== "" && /\d/.test(name)) {
      alert("Name should not contain numbers.");
    } else {
      alert("Please fill in all the required fields correctly.");
    }
    return;
  }


  financialData = {
    name: name,
    demographic: demographic,
  };

  console.log("User Demographic: ", financialData);

  let demographicForm = document.getElementById("demographicForm");
  demographicForm.style.display = "none";
  generateQuestions();
}

let seq = null;

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
  let html=`        
  <h4 class="mb-1" style="color:#036D19;">Financial Analysis</h4>
    <p class="text-muted mb-4" style="font-size:0.9rem" id="subtitle">Fill in the questions below</p>
  `;

  questionData.categories.forEach((category) => {
    if (category.questionCategory == part) {
      category.questions.forEach((question) => {
        switch (question.type) {
          case "number":
            html += generateNumberQuestion(sections, question);
            break;
          case "select":
            html += generateSelectQuestion(sections, question);
            break;
          case "radio":
            html += generateRadioQuestion(sections, question);
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

  let percentage = ((sections + 1) / length) * 100;
  html += `
  <div class="d-flex justify-content-between align-items-center mt-5">
    <div class="col-7 d-flex justify-content-start align-items-center">
      <div class="w-75 progress" role="progressbar" aria-valuenow="${percentage}" aria-valuemin="${percentage}" aria-valuemax="100">
        <div class="progress-bar" style="width: ${percentage}%; background-color:#14CC60"></div>
      </div>
      <p class="mb-0 ms-3">${sections + 1} of ${length}</p>
    </div>
    <div class="col-5 d-flex justify-content-end align-items-center">
      <button type="button" id="button" class="btn btn-success" 
  `;
  let isFinal = (sections == length - 1) ? true : false;

  if (isFinal) {
    // console.log("Sections: ", sections, seq);
    html += `onclick="handleNext('${part}', ${isFinal});" visibility="visible">Next`;
  } else {
    html += `onclick="handleNext('${part}', ${isFinal}); " visibility="visible">Submit`;
  }
  html += `
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="ms-2 bi bi-arrow-right" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
        </svg>
      </button>
    </div>
  </div>
  `;
  form.innerHTML = html;
}

function updateSection(sections) {
  return ++sections;
}

function storeFinancialData(part) {
  questionData.categories.forEach((category) => {
    if (category.questionCategory == part) {
      category.questions.forEach((question) => {
        let inputElement = document.getElementById(question.name);

        if (question.followUp && inputElement.value === question.followUp.key) {
          financialData[question.followUp.name] = document.getElementById(
            question.followUp.name
          ).value;
        }

        if (question.type === "radio") {
          let radioButtons = document.getElementsByName(question.name);
          radioButtons.forEach((radioButton) => {
            if (radioButton.checked) {
              financialData[question.name] = radioButton.value;
            }
          });
        }

        if (inputElement) {
          financialData[question.name] = inputElement.value;
        }
      });
    }
  });
  console.log(financialData);
  hideQuestions();
}

function validateInputs(part) {
  let isValid = true;
  let invalidFields = new Set();

  questionData.categories.forEach((category) => {
    if (category.questionCategory == part) {
      category.questions.forEach((question) => {
        let inputElement = document.getElementById(question.name);

        if (inputElement && inputElement.type === "number") {
          if (inputElement.value === "" || parseFloat(inputElement.value) < 0) {
            invalidFields.add("Number fields should not be empty or negative.");
            isValid = false;
          }
        }

        if (inputElement && inputElement.type === "text") {
          if (inputElement.value === "") {
            invalidFields.add("Text fields should not be empty.");
            isValid = false;
          }
        }

        if (inputElement && inputElement.tagName.toLowerCase() === 'select') {
          if (inputElement.value === "Choose One") {
            invalidFields.add("Select fields should not be empty.");
            isValid = false;
          }
        }

        if (question.type === "radio") {
          let radioButtons = document.getElementsByName(question.name);
          let radioChecked = false;
          radioButtons.forEach((radioButton) => {
            if (radioButton.checked) {
              radioChecked = true;
            }
          });
          if (!radioChecked) {
            invalidFields.add("Please select an option for all radio fields.");
            isValid = false;
          }
        }
      });
    }
  });

  if (!isValid) {
    alert("Please fill in all the required fields correctly.\n" + Array.from(invalidFields).join("\n"));
  }

  return isValid;
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

function handleNext(part, isFinal) {
  if (validateInputs(part)) {
    storeFinancialData(part);
    if (!isFinal) {
      generateQuestions();
    } else {
      submitFinancial();
    }
  }
}

function generateNumberQuestion(sections, question) {
  return `

  <div class="col-12 form-group my-3 section-${sections}" style="visibility:visible;">
    <label for="${question.name}" class="pb-1 fw-semibold">${question.question}</label>
    <input type="${question.type}" class="form-control" id="${question.name}" placeholder="${question.placeholder}">
  </div>
  `;
}

function generateSelectQuestion(sections, question) {
  let html = `
  <div class="form-group mt-4 section-${sections}">
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
  <div class="form-group mt-4 sections-${sections}">
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
  <div class="form-group mt-4">
    <label for="${question.name}">${question.question}</label>
    <input type="${question.type}" class="form-control pb-1 fw-semibold" id="${question.name}" placeholder="${question.placeholder}">
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

  const callback = function (mutationsList, observer) {
    for (const mutation of mutationsList) {
      if (mutation.type === "childList") {
        let inputElement = document.getElementById(question.name);
        if (inputElement) {
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

function submitFinancial() {
  let finalPrompt = generatePrompt();
  let modelRole =
    "You're a financial advisor in Malaysia that studies the spending behaviour and financial literacy of " +
    financialData.demographic +
    " in Malaysia.";

  let financialForm = document.getElementById("financialForm");
  financialForm.style.display = "none";

  var response = document.getElementById("response");
  response.style.display = "block";
  response.innerHTML = `
  <div class="d-flex justify-content-center align-items-center flex-column">
    <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
      <span class="visually-hidden">Loading...</span>
    </div>
    <p class="mt-4 mb-0">Generating Report...</p>
  </div>
  `;

  fetch("response.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({
      userText: finalPrompt,
      modelText: modelRole,
    }),
  })
    .then((res) => res.text())
    .then((res) => {
      res = res.replace(/```html/g, "").replace(/```/g, "");
      response.innerHTML = res;
    });
}

function generatePrompt() {
  let prompt = "";
  fetchPrompt()
    .then((promptData) => {
      prompt = classifyPrompt(promptData);
      console.log("Final Prompt: ", prompt);
    })
    .catch((error) => {
      console.error("Error:", error);
    });
  return prompt;
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

  let processedPrompt =
    "My name is " +
    financialData.name +
    " and I am a(n) " +
    financialData.demographic +
    ". ";

  promptData.categories.forEach((category) => {
    if (seq.includes(category.category)) {
      category.prompts.forEach((prompt) => {
        let promptText = "";

        let condition = financialData[prompt.condition];
        let value = prompt.conditionValue;

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
          case "nested-if":
            prompt.cases.forEach((caseData) => {
              condition = financialData[caseData.condition];
              if (condition == caseData.conditionValue) {
                if (caseData.innerIf) {
                  caseData.innerIf.forEach((innerCaseData) => {
                    condition = financialData[innerCaseData.condition];
                    if (condition == innerCaseData.conditionValue) {
                      promptText = innerCaseData.trueText;
                    } else {
                      promptText = innerCaseData.falseText;
                    }
                  });
                } else {
                  promptText = caseData.text;
                }
              }
            });
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

        processedPrompt += promptText;
      });
    }
  });
  return processedPrompt;
}

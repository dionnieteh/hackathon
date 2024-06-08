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
  console.log("User Demographic: ", response);
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
          case "radio":
            html = generateRadioQuestion(question);
            break;
        }
        financialForm.innerHTML += html;
        if (question.followUp) {
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

function generateRadioQuestion(question) {
  let html = `
  <div class="form-group my-3">
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
  const callback = function (mutationsList, observer) {
    for (const mutation of mutationsList) {
      if (mutation.type === "childList") {
        let inputElement = document.getElementById(question.name);
        if (inputElement) {
          console.log(inputElement);
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
  getFinancialData();
  let finalPrompt = generatePrompt();
  let model = `
    You're a financial advisor in Malaysia that studies the spending behavior and financial literacy of teenagers in the country. 
    Based on their spending lifestyle, provide personalized advise cater to them and analyze whether their financial literacy is sufficient. 
    Explain to them as if you're explaining to people aging between 12 - 18 years old.
  `;
  console.log("Submit: ", finalPrompt);

  fetch("response.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({
      userText: finalPrompt,
      modelText: model,
    }),
  })
    .then((res) => res.text())
    .then((res) => {
      response.innerHTML = res;
    });
}

function getFinancialData() {
  let financialData = {
    name: response.name,
    demographic: response.demographic,
  };
  questionData.categories.forEach((category) => {
    if (category.demographic === response.demographic) {
      category.questions.forEach((question) => {
        let inputElement = document.getElementById(question.name);

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
          financialData[question.name] = inputElement.value;
        }
      });
    }
  });
  return financialData;
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
  // Get user input
  let financialData = getFinancialData();
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
            if (condition === value) {
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

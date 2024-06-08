<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Questionnaire</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDzwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

    <style>
        .card {
            transition: transform 0.3s ease;
        }
        .card:hover {
            transform: scale(1.05);
            cursor: pointer;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light p-3 m-3">
        <a class="navbar-brand" href="#" style="color: #50B359; font-weight: bold;">
            <img src="" width="30" height="30" class="d-inline-block align-top" alt="">
            Site name
        </a>
        <div class="navbar-expand ml-auto" id="navbarText;">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link mx-2" href="#" style="padding:10px; width: 85px; background-color: #50B359; border-radius: 10px; text-align: center; color: white;">Page <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link" href="#">Page</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link" href="#">Page</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="row" style="margin:30px">
            <h1 style="color: #70A8C2">Questions</h1>
        </div>
        <div class="row" style="margin:30px">
            <h6>A subheading with a brief description of you, your work, and what you’re all about—no biggie</h6>
        </div>

        <div id="questions-container" class="row">
            <!-- Questions will be inserted here -->
        </div>

        <div class="row m-5">
            <div class="col-md-12 d-flex align-items-center">
                <div class="progress" style="background-color: #EDE8E3; width: 100%; height: 35px; border-radius: 10px;">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                </div>
            </div>

        </div>
    </div>


    <div class="row m-5">
        <div class="col-md-12 d-flex align-items-center">
            <div class="progress" style="background-color: #EDE8E3; width: 100%; height: 35px; border-radius: 10px;">
                <div class="progress-bar bg-success" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            fetch('questions.json')
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('JSON data:', data);  // Log the JSON data to the console
                    displayQuestions(data);
                })
                .catch(error => {
                    console.error('Error fetching JSON:', error);
                });
        });

        function displayQuestions(data) {
            const container = document.getElementById('questions-container');
            container.innerHTML = '';  // Clear any existing content
            data.categories.forEach(category => {
                const categoryDiv = document.createElement('div');
                categoryDiv.classList.add('mb-4');

                const categoryTitle = document.createElement('h3');
                categoryTitle.textContent = category.questionCategory;
                categoryDiv.appendChild(categoryTitle);

                category.questions.forEach(question => {
                    const cardDiv = document.createElement('div');
                    cardDiv.classList.add('card', 'mb-3');
                    cardDiv.style.backgroundColor = '#E7F4F9';
                    cardDiv.style.border = 'none';

                    const cardBody = document.createElement('div');
                    cardBody.classList.add('card-body');
                    cardBody.style.textAlign = 'center';

                    const cardTitle = document.createElement('h5');
                    cardTitle.classList.add('card-title');
                    cardTitle.textContent = question.question;
                    cardBody.appendChild(cardTitle);

                    const cardInput = createInputField(question);
                    cardBody.appendChild(cardInput);

                    cardDiv.appendChild(cardBody);
                    categoryDiv.appendChild(cardDiv);
                });

                container.appendChild(categoryDiv);
            });
        }

        function createInputField(question) {
            let inputField;
            switch (question.type) {
                case 'number':
                    inputField = document.createElement('input');
                    inputField.type = 'number';
                    inputField.classList.add('form-control');
                    inputField.name = question.name;
                    inputField.placeholder = question.placeholder;
                    break;
                case 'select':
                    inputField = document.createElement('select');
                    inputField.classList.add('form-control');
                    inputField.name = question.name;
                    question.options.forEach(option => {
                        const optionElement = document.createElement('option');
                        optionElement.value = option;
                        optionElement.textContent = option;
                        inputField.appendChild(optionElement);
                    });
                    break;
                default:
                    inputField = document.createElement('input');
                    inputField.type = 'text';
                    inputField.classList.add('form-control');
                    inputField.name = question.name;
                    inputField.placeholder = question.placeholder;
            }
            return inputField;
        }
    </script>
</body>
</html>

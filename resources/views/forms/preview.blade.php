@extends('layout')

@section('title', 'Welcome to My Website')

@section('content')
<section class="bg-white dark:bg-gray-900">
    <div id="new-form-display-2" class="grid gap-4 max-w-2xl m-auto"></div>

  </section>
@endsection

@section('js-script')
<script>

    new_form_input_data = [
        {
            "title": "What is your first name",
            "input_type" : "text",
        },
        {
            "title": "What is your gender",
            "input_type" : "radio",
            "options": [
                {
                    "title":"Male",
                    "value":"M"
                },
                {
                    "title":"Female",
                    "value":"F"
                }
            ]
        },
        {
            "title": "Select your courses of study",
            "input_type" : "select",
            "options": [
                {
                    "title": "Software Engineer",
                    "value": "Software Engineer"
                },
                {
                    "title": "DevOp",
                    "value": "DevOp"
                },
                {
                    "title": "ML/AI",
                    "value": "ML/AI"
                }
            ]
        },
        {
            "title":"Did you have any question?",
            "input_type": "textarea",
        },
        {
            "title": "Select your courses of study",
            "input_type" : "checkbox",
            "options": [
                {
                    "title": "Software Engineer",
                    "value": "Software Engineer"
                },
                {
                    "title": "DevOp",
                    "value": "DevOp"
                },
                {
                    "title": "ML/AI",
                    "value": "ML/AI"
                },
                
            ]
        }
    ]



    function updateInnerHTML() {
            // Get the element by its ID
            var element = document.getElementById("new-form-display-2");

            if (element) {
                // Clear any existing content
                element.innerHTML = "";

                // Loop through the input data and create form elements
                for (var i = 0; i < new_form_input_data.length; i++) {
                    var item = new_form_input_data[i];

                    var label = document.createElement("label");
                    label.textContent = item.title;
                    label.className = "block mb-2 text-sm font-medium text-gray-900 dark:text-white";

                    element.appendChild(label);

                    if (item.input_type === "text") {
                        var input = document.createElement("input");
                        input.type = "text";
                        input.className = "bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5";
                        element.appendChild(input);
                    } else if (item.input_type === "radio") {
                        var radioContainer = document.createElement("div");
                        radioContainer.className = "space-x-4";
                        for (var j = 0; j < item.options.length; j++) {
                            var option = item.options[j];
                            var radio = document.createElement("input");
                            radio.type = "radio";
                            radio.className ='w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600'
                            radio.name = "gender";
                            radio.value = option.value;
                            radioContainer.appendChild(radio);
                            var radioLabel = document.createElement("span");
                            radioLabel.textContent = option.title;
                            radioContainer.appendChild(radioLabel);
                        }
                        element.appendChild(radioContainer);
                    } else if (item.input_type === "select") {
                        var select = document.createElement("select");
                        select.className = "bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5";
                        for (var j = 0; j < item.options.length; j++) {
                            var option = item.options[j];
                            var selectOption = document.createElement("option");
                            selectOption.className = ''
                            selectOption.value = option.value;
                            selectOption.textContent = option.title;
                            select.appendChild(selectOption);
                        }
                        element.appendChild(select);
                    } else if (item.input_type === "textarea") {
                        var textarea = document.createElement("textarea");
                        textarea.rows = "8"
                        textarea.className = "block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500";
                        element.appendChild(textarea);
                    }else if (item.input_type === "checkbox") {

                        var checkboxContainer = document.createElement("div");
                        checkboxContainer.className = "space-x-2";
                        for (var j = 0; j < item.options.length; j++) {
                            var option = item.options[j];
                            var checkbox = document.createElement("input");
                            checkbox.className ="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                            checkbox.type = "checkbox";
                            checkbox.name = "courses";
                            checkbox.value = option.value;
                            checkboxContainer.appendChild(checkbox);
                            var checkboxLabel = document.createElement("span");
                            checkboxLabel.textContent = option.title;
                            checkboxLabel.className = "ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                            checkboxContainer.appendChild(checkboxLabel);
                        }
                        element.appendChild(checkboxContainer);
                    }
                }
            } else {
                console.log("Element not found.");
            }
        }

        updateInnerHTML();

    console.log('JSinitialisae')



    // const categorySelect = document.getElementById('category');
    // const dynamicFields = document.getElementById('dynamic-fields');
    // const addFieldButton = document.getElementById('add-field');
    // let keyValuePairs = 1;

    // categorySelect.addEventListener('change', function () {
    //     dynamicFields.innerHTML = '';
    //     keyValuePairs = 1; // Reset the count when the option type changes.

    //     const selectedOption = categorySelect.value;

    //     if (selectedOption === 'link' || selectedOption === 'radio' || selectedOption === 'select') {
    //         // Display the initial key-value pair
    //         addKeyValuePair();
    //         addFieldButton.style.display = 'block'; // Show the "Add Another Key-Value Pair" button
    //     } else {
    //         addFieldButton.style.display = 'none'; // Hide the button for other option types
    //     }
    // });

    // addFieldButton.addEventListener('click', function () {
    //     // Add another key-value pair when the button is clicked
    //     addKeyValuePair();
    // });

    // function addKeyValuePair() {
    //     const keyLabel = document.createElement('label');
    //     keyLabel.textContent = `Option name ${keyValuePairs}:`;
    //     keyLabel.className = 'block text-sm font-medium text-gray-900 dark:text-white';

    //     const keyInput = document.createElement('input');
    //     keyInput.type = 'text';
    //     keyInput.className = 'w-full px-2 py-1 border rounded';

    //     const valueLabel = document.createElement('label');
    //     valueLabel.textContent = `Option value ${keyValuePairs}:`;
    //     valueLabel.className = 'block text-sm font-medium text-gray-900 dark:text-white';

    //     const valueInput = document.createElement('input');
    //     valueInput.type = 'text';
    //     valueInput.className = 'w-full px-2 py-1 border rounded';

    //     dynamicFields.appendChild(keyLabel);
    //     dynamicFields.appendChild(keyInput);
    //     dynamicFields.appendChild(valueLabel);
    //     dynamicFields.appendChild(valueInput);

    //     keyValuePairs++;
    // }
    
</script>
@endsection





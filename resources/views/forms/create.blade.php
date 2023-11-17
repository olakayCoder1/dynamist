<x-auth-layout >

    <section class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <section class="bg-white">
            <form id="dynamic-form" class="grid gap-4 p-8 py-12 rounded-lg">
                <h2 class=" text-xl">New Input Setup</h2>
                <div class="sm:col-span-2">
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Enter Input Question</label>
                    <input id="input-question" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500" placeholder="Enter input question"></input>
                </div>   
                
                <div class="sm:col-span-2">
                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option type</label>
                    <select id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                        <option selected disabled >Choose answer type</option>
                        @foreach($inputs as $input)
                        <option value="{{ $input->name }}">{{ $input->name }}</option>
                        @endforeach
                    </select>
                </div>
                
        
                <div id="dynamic-fields" class="mt-4 sm:col-span-2"></div>
                
                <button id="add-field" class="bg-blue-500 text-white rounded p-2 mt-2" style="display: none;">
                    Add an option
                </button>
                <div class="flex items-center sm:col-span-2">
                    <input id="input-required" type="checkbox" value="yes" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="link-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Is the input field required? check the box if yes</label>
                </div>
                <div id="checkboxList" style="display: none;"></div>
                <button id="add_inputs" class="bg-green-500 text-white rounded p-2 mt-4">Submit</button>
            </form>
        
        </section>
        
        <section class="bg-white p-4 space-y-3">
            <h2 class=" text-xl">Form Preview</h2>
            <div id="new-form-display-2" class="grid gap-4 "></div>
        </section>
    </section>


<div id="error_message"></div>

    


<script>

    const new_form_input_data = [
        {
            "title": "What is your first name",
            "input_type" : "Short text",
        },
        {
            "title": "What is your gender",
            "input_type" : "Radio",
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
        // {
        //     "title": "Select your courses of study",
        //     "input_type" : "select",
        //     "options": [
        //         {
        //             "title": "Software Engineer",
        //             "value": "Software Engineer"
        //         },
        //         {
        //             "title": "DevOp",
        //             "value": "DevOp"
        //         },
        //         {
        //             "title": "ML/AI",
        //             "value": "ML/AI"
        //         }
        //     ]
        // },
        // {
        //     "title":"Did you have any question?",
        //     "input_type": "textarea",
        // },
        // {
        //     "title": "Select your courses of study",
        //     "input_type" : "checkbox",
        //     "options": [
        //         {
        //             "title": "Software Engineer",
        //             "value": "Software Engineer"
        //         },
        //         {
        //             "title": "DevOp",
        //             "value": "DevOp"
        //         },
        //         {
        //             "title": "ML/AI",
        //             "value": "ML/AI"
        //         },
                
        //     ]
        // }
    ]


    const categorySelect = document.getElementById('category');
    const dynamicFields = document.getElementById('dynamic-fields');
    const addFieldButton = document.getElementById('add-field');
    const formValues = document.getElementById('form-values');
    const isRequiredField = document.getElementById('input-required');
    const errorButton = document.getElementById('error_button');
    const dynamicForm = document.getElementById('dynamic-form');
    const inputQuestion = document.getElementById('input-question');
    const rulesCheckboxListContainer = document.getElementById('checkboxList');

    let keyValuePairs = 1;
    let isSelectingOption = false;
    let optionInput;
    let formData = {
        title: '',
        is_required: false ,
        input_type: '',
        options: []
    };


    inputQuestion.addEventListener('change', function () {
        formData.title = inputQuestion.value;
    });

    isRequiredField.addEventListener('change', function () {
        if (isRequiredField.value){
            formData.is_required = true
        }else{
            formData.is_required = false
        }
    });


    dynamicForm.addEventListener('submit', function (e){
        e.preventDefault()
        console.log(formData)
        if (formData.title === ''){
            alert('Input question is required')
        }else{
            if (formData.input_type === ""){
                alert('Input type is required')
            }
            if (formData.input_type === 'Radio' || formData.input_type === 'Select' || formData.input_type === 'Checkbox'){
                if(formData.options.length < 1){
                    alert(`Provide option value for : ${formData.input_type } input`)
                }
            }

            
            
        }
        new_form_input_data.push(formData)
        console.log(new_form_input_data)

        this.reset();
        formData = {
            title: '',
            is_required: false ,
            input_type: '',
            options: []
        }
        updateInnerHTML()
        
        // formValues.textContent = JSON.stringify(formData, null , 2);
    })

    categorySelect.addEventListener('change', function (e) {
        dynamicFields.innerHTML = '';
        keyValuePairs = 1; // Reset the count when the option type changes.
        // formData.title = '';
        formData.input_type = e.target.value ;
        formData.options = [];

        var inputs = @json($inputs);

        console.log(inputs)

        const selectedOption = categorySelect.value;

        if (selectedOption === 'Radio' || selectedOption === 'Select' || selectedOption === 'Checkbox') {
            // Display the initial key-value pair

            // Loop through the array
            for (var i = 0; i < inputs.length; i++) {
                // Check if k is equal to the "name" property
                if (selectedOption === inputs[i].name) {
                    const selectedObject = inputs[i]
                    // Check if the object has "rules"
                    if (inputs[i].rules.length > 0) {
                        console.log("Yes");
                        selectedObject.rules.forEach(function(rule) {
                            var checkbox = document.createElement('input');
                            checkbox.type = 'checkbox';
                            checkbox.name = 'rules';
                            checkbox.value = rule.name;

                            var label = document.createElement('label');
                            label.appendChild(checkbox);
                            label.appendChild(document.createTextNode(rule.name));

                            rulesCheckboxListContainer.appendChild(label);
                            rulesCheckboxListContainer.style.display = 'block'
                        });
                    } else {
                        console.log("No rules");
                    }
                    // Break the loop since you found a match
                    break;
                }
            }

            // If you want to handle the case when no match is found
            if (i === inputs.length) {
                console.log("No match found");
            }

            addKeyValuePair();
            addFieldButton.style.display = 'block'; // Show the "Add Another Key-Value Pair" button
            formData.input_type = selectedOption;
        } else {
             // Loop through the array
             for (var i = 0; i < inputs.length; i++) {
                // Check if k is equal to the "name" property
                if (selectedOption === inputs[i].name) {
                    // Check if the object has "rules"
                    const selectedObject = inputs[i]
                    if (inputs[i].rules.length > 0) {
                        console.log("Yes");
                        selectedObject.rules.forEach(function(rule) {
                            var checkbox = document.createElement('input');
                            checkbox.type = 'checkbox';
                            checkbox.name = 'rules';
                            checkbox.value = rule.name;

                            var label = document.createElement('label');
                            label.appendChild(checkbox);
                            label.appendChild(document.createTextNode(rule.name));

                            rulesCheckboxListContainer.appendChild(label);
                            rulesCheckboxListContainer.style.display = 'block'

                        });
                    } else {
                        console.log("No rules");
                    }
                    // Break the loop since you found a match
                    break;
                }
            }

            // If you want to handle the case when no match is found
            if (i === inputs.length) {
                console.log("No match found");
            }
            addFieldButton.style.display = 'none'; // Hide the button for other option types
        }
    });

    addFieldButton.addEventListener('click', function (e) {
        e.preventDefault()
        console.log(formData.options.length)
        if (!optionInput){
                alert("Provide a title and value for your option")
            }
        
        if (isSelectingOption) {
            formData.options.push({
                title: optionInput[0].value,
                value: optionInput[1].value
            });
            isSelectingOption = false;
            addKeyValuePair();
        }
        
    });

    function addKeyValuePair() {
        if (formData.input_type === 'Select' || formData.input_type === 'Radio' || formData.input_type === 'Checkbox') {
            if (!isSelectingOption) {
                // Display the input fields for a new option
                const keyLabel = document.createElement('label');
                keyLabel.textContent = `Option ${keyValuePairs} Name:`;
                keyLabel.className = 'block text-sm font-medium text-gray-900 dark:text-white';

                const keyInput = document.createElement('input');
                keyInput.type = 'text';
                keyInput.className = 'w-full px-2 py-1 border rounded';

                const valueLabel = document.createElement('label');
                valueLabel.textContent = `Option ${keyValuePairs} Value:`;
                valueLabel.className = 'block text-sm font-medium text-gray-900 dark:text-white';

                const valueInput = document.createElement('input');
                valueInput.type = 'text';
                valueInput.className = 'w-full px-2 py-1 border rounded';

                dynamicFields.appendChild(keyLabel);
                dynamicFields.appendChild(keyInput);
                dynamicFields.appendChild(valueLabel);
                dynamicFields.appendChild(valueInput);

                keyInput.addEventListener('input', function () {
                    isSelectingOption = true;
                    optionInput = [keyInput, valueInput];
                });

                keyValuePairs++;
            } else {
                isSelectingOption = false;
            }
        } else {
            isSelectingOption = false;
        }
    }

  
    function showError(text) {



        const popupHtml = `
            <div id="popup-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-md max-h-full">
                    <div class="relative bg-red-500 text-white rounded-lg shadow max-h-[150px]">
                        <button type="button" class="absolute top-3 right-2.5 text-gray-100 bg-transparent hover:bg-gray-200 hover-text-red-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center " data-modal-hide="popup-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="p-6 text-center">
                            <svg class="mx-auto mb-4 text-gray-100 w-12 h-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                            </svg>
                            <h3 class="mb-5 text-lg font-normal text-gray-100 dark-text-gray-400">${text}</h3>
                            
                        </div>
                    </div>
                </div>
            </div>
            `;

        const errorMessageDiv = document.getElementById('error_message');
        errorMessageDiv.innerHTML = popupHtml;

    }


    // Form Preview code 
    // Form Preview code 
    // Form Preview code 
    
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
                label.textContent = `${i + 1} . ${item.title}`;
                label.className = "block mb-2 text-sm font-medium text-gray-900 dark:text-white";

                element.appendChild(label);

                if (item.input_type === "Short text") {
                    var input = document.createElement("input");
                    input.type = "text";
                    input.className = "bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5";
                    element.appendChild(input);
                } else if (item.input_type === "Radio") {
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
                } else if (item.input_type === "Select") {
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
                } else if (item.input_type === "Long text") {
                    var textarea = document.createElement("textarea");
                    textarea.rows = "3"
                    textarea.className = "block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500";
                    element.appendChild(textarea);
                }else if (item.input_type === "Checkbox") {

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

    
    console.log('JSinitialisae')

    updateInnerHTML();



    
    
    

</script>
</x-auth-layout>



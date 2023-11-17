<x-auth-layout >

<h1 class="font-semibold text-2xl">Hello AbdulKabeer</h1>
<div class="my-4 rounded-lg" id="statistics" role="tabpanel" aria-labelledby="statistics-tab">
    <dl class="grid max-w-screen-xl grid-cols-1 sm:grid-cols-2 gap-8 py-4 mx-auto text-gray-900 md:grid-cols-4">
        <x-cards.dashboard count='1234' card_title='Total Forms' > </x-cards.dashboard>
        <x-cards.dashboard count='1234' card_title='Total Forms' > </x-cards.dashboard>
        <x-cards.dashboard count='1234' card_title='Total Forms' > </x-cards.dashboard>
    </dl>
</div>

<button type="button" data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" 
class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 
    hover:bg-gradient-to-br focus:outline-none  
    font-medium rounded-lg text-sm px-5 py-5 text-center mr-2 mb-2">Create New Form</button>

  <!-- Main modal -->
  <div id="authentication-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative w-full max-w-md max-h-full">
          <!-- Modal content -->
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
              <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-modal">
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                  </svg>
                  <span class="sr-only">Close modal</span>
              </button>
              <div class="px-6 py-6 lg:px-8">
                  <h3 class="mb-4 text-xl font-medium text-gray-900 ">Add new form</h3>
                  <form class="space-y-6" id="new-form" >
                      <div>
                          <label for="form-title" class="block mb-2 text-sm font-medium text-gray-900 ">What is your form title?</label>
                          <input type="text" name="form-title" id="form-title" 
                          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 
                          focus:border-blue-500 block w-full p-2.5 400 " placeholder="">
                      </div>

                        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 ">Your message</label>
                        <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 
                        focus:ring-blue-500 focus:border-blue-500 " placeholder=""></textarea>

                      <button class="w-full text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 
                                hover:bg-gradient-to-br focus:outline-none font-medium rounded-lg text-sm px-5 py-3 text-center mr-2 mb-">
                                Create Form</button>
                    
                  </form>
              </div>
          </div>
      </div>
  </div> 



<script>

    window.addEventListener('load', function () {
        
        const dynamicForm = document.getElementById('new-form');
        const message = document.getElementById('message');
        const firmTitle = document.getElementById('form-title');

        const myNewForData = {name:null,description: null}

        dynamicForm.addEventListener('submit', function (e) {
            e.preventDefault()
            const name = document.getElementById('form-title').value
            const message = document.getElementById('message').value

            const requestData = {title:name,description:message}
            console.log(requestData)

            if (!requestData.title){
                alert('Form title is required')
            }else{
                url = '{{ route("createNewForm")}}';
                fetch(url, {
                    method : 'POST',
                    header: {
                        'Content-Type':'application/json'
                    },
                    body: JSON.stringify(requestData),   
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data); 
                });
            }; 
        });

        message.addEventListener('change', function (e) {
            console.log(myNewForData)
            myNewForData.description = e.target.value;
        });

        firmTitle.addEventListener('change', function (e) {
            console.log(myNewForData)
            myNewForData.name = e.target.value;
        });

    })
    
</script>
</x-auth-layout>

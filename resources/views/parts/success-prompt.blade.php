@if (Session::has('success'))
    <div id="successMessage" class="flex flex-row justify-between items-center rounded-md border-t-2 border-l-2 border-green-400 bg-gradient-to-t from-green-200 via-green-100 to-white px-4 py-2 mx-0 my-2">
        <span class="block sm:inline  text-green-500"><b class="text-green-700">Success! </b>{{ Session::get('success') }}</span>
        <a  onclick="closeAlert('successMessage')"><i class="fa-solid fa-xmark  text-green-700 hover:scale-110"></i></a>
    </div>
@elseif (Session::has('error')||Session::has('errors')) 
    <div id="errorMessage" class="flex flex-row justify-between items-center rounded-md border-t-2 border-l-2 border-red-400 bg-gradient-to-t from-red-200 via-red-100 to-white px-4 py-2 mx-0 my-2">
        <span class="block sm:inline  text-red-500"><b class="text-red-700">Error! </b>{{ Session::has('error') ? Session::get('error') : 'Check the input field' }}  </span>
        <a  onclick="closeAlert('errorMessage')"><i class="fa-solid fa-xmark  text-red-700 hover:scale-110"></i></a> 
    </div>
@endif
<script>
    function closeAlert(alertId) {
        var element = document.getElementById(alertId);
        if (element) {
        element.style.display = 'none';
        } else {
        console.error('No element found with ID:', alertId);
        }
    }
</script>
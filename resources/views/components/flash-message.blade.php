@if (Session::has('success'))
    <div id="flash-message"
        class="p-2 mb-4 bg-green-600 text-white rounded-lg shadow transition-opacity duration-500 ease-in-out">
        {{ Session::get('success') }}
    </div>
@endif

@if (Session::has('failure'))
    <div id="flash-message"
        class="p-2 mb-4 bg-red-600 text-white rounded-lg shadow transition-opacity duration-500 ease-in-out">
        {{ Session::get('failure') }}
    </div>
@endif

<script>
    setTimeout(() => {
        const message = document.getElementById('flash-message');
        if (message) {
            message.style.opacity = '0';
        }
        "{{ Session::forget('failure')}}"
        "{{ Session::forget('success') }}"
    }, 3000);
</script>

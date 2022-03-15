<script>
    function hideMessage() {
        document.getElementById("pradingti").style.display = "none";
    };
    setTimeout(hideMessage, 2000);

</script>

@if (session('success'))
<div class="container col-4 mx-auto py-3 pb-0 mb-0">
    <div id="pradingti" class="alert alert-success text-center">
        <strong class="text-center">{{ session('success') }}</strong>
    </div>
</div>
@endif

@if (session('error'))
<div class="container col-4 mx-auto py-3 pb-0 mb-0">
    <div id="pradingti" class="alert alert-danger text-center">
        <strong class="text-center">{{ session('error') }}</strong>
    </div>
</div>
@endif

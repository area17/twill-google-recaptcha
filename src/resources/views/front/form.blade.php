@if ($errors ?? false)
    @foreach ($errors->all() as $error)
        <div style="color:red">
            {{ $error }}<br>
        </div>
    @endforeach

    <br>
@endif
<form id="google-recaptcha-3-form"
      action="/debug/google-recaptcha-3"
      method="POST">
    @csrf

    <label for="input1">Label</label>

    <input id="input1"
           name="input1"
           type="text">

    @if ($google_recaptcha['enabled'])
        <input id="g-recaptcha-response"
               name="g-recaptcha-response"
               type="hidden">

        <button type="button"
                onclick="return onSubmitClick();">
            Submit
        </button>
    @else
        <button type="button">Submit</button>
    @endif

    <br>

    <div>Site key: {{ $google_recaptcha['site_key'] }}</div>
</form>

@if ($google_recaptcha['enabled'])
    <script src="{{ $google_recaptcha['asset'] }}"></script>

    <script>
        console.log('Google Recaptcha 3 loaded');

        function onSubmitClick(e) {
            grecaptcha.ready(function() {
                grecaptcha.execute('{{ $google_recaptcha['site_key'] }}', {
                    action: 'submit'
                }).then(function(token) {
                    document.getElementById("g-recaptcha-response").value = token;
                    document.getElementById("google-recaptcha-3-form").submit();
                });
            });
        }
    </script>
@endif

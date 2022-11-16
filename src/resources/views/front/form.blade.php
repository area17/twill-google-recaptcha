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

    @if ($twillGoogleRecaptcha['enabled'])
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

    <div>Site key: {{ $twillGoogleRecaptcha['keys']['site'] }}</div>
</form>

@if ($twillGoogleRecaptcha['enabled'])
    <script src="{{ $twillGoogleRecaptcha['asset'] }}"></script>

    <script>
        console.log('Google Recaptcha 3 loaded');

        function onSubmitClick(e) {
            grecaptcha.ready(function() {
                grecaptcha.execute('{{ $twillGoogleRecaptcha['keys']['site'] }}', {
                    action: 'submit'
                }).then(function(token) {
                    document.getElementById("g-recaptcha-response").value = token;
                    document.getElementById("google-recaptcha-3-form").submit();
                });
            });
        }
    </script>
@endif

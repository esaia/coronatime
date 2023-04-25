@props(['url'])

<!DOCTYPE html>
<html>

<head>
    <title>Reset Password</title>
</head>



<body style="
      font-family: Arial, sans-serif;
    ">
    <div style="text-align: center;">
        <img src="https://i.ibb.co/zhMYGzr/Landing-Worldwide-2.png" alt="Image"
            style="
          max-width: 100%;
          height: auto;
          border-radius: 10px;
          margin-bottom: 10px;
        " />
        <h1 style="font-weight: bold; color: #000;">{{ __('email.recover_password') }}</h1>
        <p style="margin-top: -10px;">
            {{ __('email.click_to_recover') }}
        </p>
        <a href="{{ $url }}"
            style="display: inline-block; background-color: #0fba68; color: #fff; text-decoration: none; font-weight: bold; padding: 15px 100px;  border-radius: 10px; margin-top: 10px;">
            {{ __('email.recover_password') }}
        </a>

    </div>
</body>

</html>

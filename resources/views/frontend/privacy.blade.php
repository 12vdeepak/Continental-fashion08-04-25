@extends('frontend.layouts.app')
@section('content')
    <main>
        <style>
            .cookie-notice {
                max-width: 800px;
                margin: 50px auto;
                padding: 30px;
                background-color: #f9f9f9;
                border: 1px solid #ddd;
                border-radius: 10px;
                font-family: Arial, sans-serif;
                color: #333;
            }

            .cookie-notice h2 {
                font-size: 24px;
                margin-bottom: 20px;
                color: #222;
            }

            .cookie-notice p {
                font-size: 16px;
                line-height: 1.6;
                margin-bottom: 15px;
            }

            .cookie-notice a {
                color: #0066cc;
                text-decoration: none;
            }

            .cookie-notice a:hover {
                text-decoration: underline;
            }
        </style>

        <div class="cookie-notice">
            <h2>Privacy Notice for Cookies</h2>
            <p>
                The website <strong>www.basicwear-international.com</strong> uses its own cookies to operate the site
                ("functional cookies")
                and for convenience features, as well as cookies from service providers to continuously improve the site.
            </p>
            <p>
                By clicking the <strong>"Accept all"</strong> button, you agree to this. Your consent can be revoked or
                changed at any time
                with future effect. Functional cookies will also be executed without your consent.
            </p>
            <p>
                You can adjust personal settings by clicking the <strong>"Select"</strong> button. In our
                <a href="{{ url('/privacy-policy') }}">Privacy Policy</a>, we provide detailed information about the type and
                scope of data processing,
                as well as your rights. Further information can be found under
                <a href="#">Legal Notice</a>

            </p>
        </div>

    </main>
@endsection

@extends('frontend.layouts.app')
@section('content')
    <main>
        <div class="container">
            <strong>
                <h2 style="text-align: center; margin-bottom: 20px;">FAQs</h2>
            </strong>

            @foreach ($faqs as $faq)
                <div class="faq-item">
                    <h3 class="faq-title">{{ $faq->question }}</h3>
                    <div class="faq-content">
                        <p>{!! $faq->answer !!}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </main>

    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        .faq-item {
            border: 1px solid #ddd;
            margin-bottom: 10px;
            border-radius: 5px;
            overflow: hidden;
            text-align: center;
            padding: 10px;
        }

        .faq-title {
            background: linear-gradient(135deg, #54114C, #54114C);
            color: white;
            padding: 15px;
            cursor: pointer;
            font-size: 18px;
            transition: background 0.3s;
        }

        .faq-title:hover {
            background: linear-gradient(135deg, #7A1A6E, #7A1A6E);
        }

        .faq-content {
            display: none;
            padding: 15px;
            background: #f9f9f9;
            border-top: 1px solid #ddd;
            text-align: center;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.faq-title').forEach(item => {
                item.addEventListener('click', () => {
                    const content = item.nextElementSibling;
                    const isVisible = content.style.display === "block";
                    document.querySelectorAll('.faq-content').forEach(section => section.style
                        .display = "none");
                    content.style.display = isVisible ? "none" : "block";
                });
            });
        });
    </script>
@endsection

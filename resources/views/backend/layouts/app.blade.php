<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - Dashboard</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('backend/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('toastr/toastr.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 45px;
            height: 20px;
            vertical-align: middle;
            margin-top: 8px;
        }

        .switch input {
            display: none;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #A1A6AB;
            -webkit-transition: .4s;
            transition: .4s;

        }

        .slider:before {
            position: absolute;
            content: "";
            height: 16px;
            width: 14px;
            left: 2px;
            bottom: 2px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: #6cd46c;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }

        .action-buttons {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .action-button {
            margin-right: 10px;
        }

        /* Hide Google Translate Navbar */
        .goog-te-banner-frame {
            display: none !important;
        }

        body {
            top: 0px !important;
        }

        /* Custom styling for the select dropdown */
        .goog-te-combo {
            font-size: 14px;
            color: #002c8f;
            padding-left: 5px;
        }
    </style>
    @yield('style')



</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- The Modal -->
        <div id="myModal" class="modal">

            <!-- The Close Button -->
            <span class="close">&times;</span>

            <!-- Modal Content (The Image) -->
            <img class="modal-content" id="img01">

            <!-- Modal Caption (Image Text) -->
            <div id="caption"></div>
        </div>

        <!-- Navbar -->
        @include('backend.layouts.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('backend.layouts.sidebar')

        <!-- Content Wrapper. Contains page content -->
        @yield('content')
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-left d-none d-sm-inline">
                Developed By <a href="https://quantumitinnovation.com/" target="_blank"
                    class="text-primary">QuantumIT</a>
            </div>

            <!-- Default to the left -->


        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    @yield('script')


    <script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    {{--  <script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>  --}}
    <!-- AdminLTE App -->
    <script src="{{ asset('backend/dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('toastr/toastr.min.js') }}"></script>
    <!-- DataTables -->
    <script src="{{ asset('backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Bootstrap JS (necessary for the modal) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const masterCrudMenu = document.querySelector(".nav-item.has-treeview");
            const masterCrudLink = masterCrudMenu.querySelector(".nav-link");

            masterCrudLink.addEventListener("click", function(event) {
                event.preventDefault(); // Prevent default behavior
                masterCrudMenu.classList.toggle("menu-open");
                masterCrudLink.classList.toggle("active");
            });
        });
    </script>


    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info("{{ Session::get('message') }}");
                    break;
                case 'success':
                    toastr.success("{{ Session::get('message') }}");
                    break;
                case 'warning':
                    toastr.warning("{{ Session::get('message') }}");
                    break;
                case 'error':
                    toastr.error("{{ Session::get('message') }}");
                    break;
            }
        @endif
    </script>


    <script>
        document.querySelectorAll('.toggle-password').forEach(function(el) {
            el.addEventListener('click', function() {
                const input = document.querySelector(el.getAttribute('toggle'));
                const icon = el.querySelector('i');

                if (input.type === 'password') {
                    input.type = 'text';
                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash');
                } else {
                    input.type = 'password';
                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye');
                }
            });
        });
    </script>


    <!-- Add this JavaScript to the bottom of your form -->
    {{--  <script>
        // When product images are selected
        document.getElementById('product_images').addEventListener('change', function(event) {
            const files = event.target.files;
            const container = document.getElementById('imagePreviewContainer');
            container.innerHTML = ''; // Clear previous previews

            const colorOptions = [{
                    id: "",
                    name: "Default (All Colors)"
                }
                @foreach ($colors as $color)
                    , {
                        id: "{{ $color->id }}",
                        name: "{{ $color->name }} ({{ $color->color_code }})"
                    }
                @endforeach
            ];

            Array.from(files).forEach((file, index) => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const col = document.createElement('div');
                    col.className = 'col-md-3 mb-3';

                    const card = document.createElement('div');
                    card.className = 'card';

                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = 'card-img-top';
                    img.style.height = '150px';
                    img.style.objectFit = 'cover';

                    const cardBody = document.createElement('div');
                    cardBody.className = 'card-body';

                    const formGroup = document.createElement('div');
                    formGroup.className = 'form-group';

                    const label = document.createElement('label');
                    label.textContent = 'Assign to Color:';

                    const select = document.createElement('select');
                    select.className = 'form-control';
                    select.name = 'color_specific_images[]'; // FIXED: Corrected name attribute

                    colorOptions.forEach(color => {
                        const option = document.createElement('option');
                        option.value = color.id;
                        option.textContent = color.name;
                        select.appendChild(option);
                    });

                    formGroup.appendChild(label);
                    formGroup.appendChild(select);
                    cardBody.appendChild(formGroup);

                    card.appendChild(img);
                    card.appendChild(cardBody);
                    col.appendChild(card);
                    container.appendChild(col);
                };
                reader.readAsDataURL(file);
            });
        });
    </script>  --}}

    <script>
        $(document).on("click", "#delete", function(e) {
            e.preventDefault();
            var link = $(this).attr("href");
            swal({
                    title: "Are you sure you want to delete?",
                    text: "The data will be moved to Trash",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location.href = link;
                    } else {
                        // swal("Operation cancelled. Data is safe!");
                    }
                });
        });


        $(document).on("click", "#fdelete", function(e) {
            e.preventDefault();
            var link = $(this).attr("href");
            swal({
                    title: "Are you sure you want to delete the record permanently?",
                    text: "The data will not be recovered!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location.href = link;
                    } else {
                        // swal("Operation cancelled. Data is safe!");
                    }
                });
        });

        $(document).on("click", "#delete_all", function(e) {
            e.preventDefault();
            var link = $(this).attr("href");
            swal({
                    title: "Delete all trashed records permanently?",
                    text: "The data will not be recovered!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location.href = link;
                    } else {
                        // swal("Operation cancelled. Data is safe!");
                    }
                });
        });

        $(document).on("click", "#approve", function(e) {
            e.preventDefault();
            var link = $(this).attr("href");
            swal({
                    title: "Approve this Shop Owner?",
                    text: "Once done, you cannot revoke their approval",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location.href = link;
                    } else {
                        // swal("Operation cancelled. Data is safe!");
                    }
                });
        });

        $(document).on("click", "#approve-receipt", function(e) {
            e.preventDefault();
            var link = $(this).attr("href");
            swal({
                    title: "Approve this receipt?",
                    text: "Once verified, you cannot revoke the approval",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location.href = link;
                    } else {
                        // swal("Operation cancelled. Data is safe!");
                    }
                });
        });
    </script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["colvis"],
                "paging": true,
                "ordering": true, // Keep ordering (sorting) for other columns
                "info": true,
                "searching": true, // Enable searching
                "columnDefs": [{
                        "orderable": false,
                        {{--  "targets": [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15]  --}}
                    } // Disable sorting for the 'Name' column (index 1)
                ]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": false,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    </script>
    <!-- jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            // Initialize Summernote
            $('#summernote_about_us').summernote({
                tabsize: 2,
                height: 200,
                callbacks: {
                    onChange: function(contents) {
                        // Remove error styling when user starts typing
                        $('.note-editor').removeClass('is-invalid');
                        $('.error-message').remove(); // Remove any existing error message
                    }
                },
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['view', ['fullscreen', 'codeview']]
                ]
            });

            // Add client-side validation
            $('#aboutUsForm').on('submit', function(e) {
                let description = $('#summernote_about_us').summernote('code');
                let plainText = $('<div>').html(description).text().trim();

                $('.error-message').remove(); // Remove any existing error message

                if (plainText.length === 0) {
                    e.preventDefault();
                    $('.note-editor').addClass('is-invalid');
                    $('<span class="invalid-feedback d-block error-message"><strong>The description field is required.</strong></span>')
                        .insertAfter('.note-editor');
                    return false;
                }
            });

            // Apply error styling if validation failed
            if ($(".is-invalid").length > 0) {
                $('.note-editor').addClass('is-invalid');
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            // Initialize Summernote
            $('#summernote_terms').summernote({
                tabsize: 2,
                height: 200,
                callbacks: {
                    onChange: function(contents) {
                        // Remove error styling when user starts typing
                        $('.note-editor').removeClass('is-invalid');
                        $('.error-message').remove(); // Remove any existing error message
                    }
                },
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['view', ['fullscreen', 'codeview']]
                ]
            });

            // Add client-side validation
            $('#termsForm').on('submit', function(e) {
                let description = $('#summernote_terms').summernote('code');
                let plainText = $('<div>').html(description).text().trim();

                $('.error-message').remove(); // Remove any existing error message

                if (plainText.length === 0) {
                    e.preventDefault();
                    $('.note-editor').addClass('is-invalid');
                    $('<span class="invalid-feedback d-block error-message"><strong>The description field is required.</strong></span>')
                        .insertAfter('.note-editor');
                    return false;
                }
            });

            // Apply error styling if validation failed
            if ($(".is-invalid").length > 0) {
                $('.note-editor').addClass('is-invalid');
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            // Initialize Summernote
            $('#summernote_privacy').summernote({
                tabsize: 2,
                height: 200,
                callbacks: {
                    onChange: function(contents) {
                        // Remove error styling when user starts typing
                        $('.note-editor').removeClass('is-invalid');
                        $('.error-message').remove(); // Remove any existing error message
                    }
                },
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['view', ['fullscreen', 'codeview']]
                ]
            });

            // Add client-side validation
            $('#privacyForm').on('submit', function(e) {
                let description = $('#summernote_privacy').summernote('code');
                let plainText = $('<div>').html(description).text().trim();

                $('.error-message').remove(); // Remove any existing error message

                if (plainText.length === 0) {
                    e.preventDefault();
                    $('.note-editor').addClass('is-invalid');
                    $('<span class="invalid-feedback d-block error-message"><strong>The description field is required.</strong></span>')
                        .insertAfter('.note-editor');
                    return false;
                }
            });

            // Apply error styling if validation failed
            if ($(".is-invalid").length > 0) {
                $('.note-editor').addClass('is-invalid');
            }
        });
    </script>
    <script>
        // Color name mapping
        const colorMap = {
            "#000000": "Black",
            "#FFFFFF": "White",
            "#FF0000": "Red",
            "#00FF00": "Lime",
            "#0000FF": "Blue",
            "#FFFF00": "Yellow",
            "#00FFFF": "Cyan",
            "#FF00FF": "Magenta",
            "#C0C0C0": "Silver / Silver Grey",
            "#4F42B5": "Ocean Blue",


            "#808080": "Gray",
            "#696969": "DimGray",
            "#A9A9A9": "DarkGray",
            "#D3D3D3": "LightGray",
            "#DCDCDC": "Gainsboro",
            "#F5F5F5": "WhiteSmoke",
            "#800000": "Maroon",
            "#8B0000": "DarkRed",
            "#A52A2A": "Brown",
            "#B22222": "FireBrick",
            "#CD5C5C": "IndianRed",
            "#DC143C": "Crimson",
            "#F08080": "LightCoral",
            "#FA8072": "Salmon",
            "#E9967A": "DarkSalmon",
            "#FFA07A": "LightSalmon",
            "#FF4500": "OrangeRed",
            "#FF6347": "Tomato",
            "#FF7F50": "Coral",
            "#FF8C00": "DarkOrange",
            "#FFA500": "Orange",
            "#FFD700": "Gold",
            "#FFFFE0": "LightYellow",
            "#FFFACD": "LemonChiffon",
            "#FAFAD2": "LightGoldenrodYellow",
            "#FFEFD5": "PapayaWhip",
            "#FFE4B5": "Moccasin",
            "#FFDAB9": "PeachPuff",
            "#EEE8AA": "PaleGoldenrod",
            "#F0E68C": "Khaki",
            "#BDB76B": "DarkKhaki",
            "#006400": "DarkGreen",
            "#8EE53F": "Kiwi Green",
            "#7BB661": "Dark Kiwi",
            "#008000": "Green",
            "#228B22": "ForestGreen",
            "#32CD32": "LimeGreen",
            "#90EE90": "LightGreen",
            "#98FB98": "PaleGreen",
            "#8FBC8F": "DarkSeaGreen",
            "#00FA9A": "MediumSpringGreen",
            "#00FF7F": "SpringGreen",
            "#2E8B57": "SeaGreen",
            "#3CB371": "MediumSeaGreen",
            "#66CDAA": "MediumAquamarine",
            "#7FFFD4": "Aquamarine",
            "#808000": "Olive",
            "#556B2F": "DarkOliveGreen",
            "#6B8E23": "OliveDrab",
            "#9ACD32": "YellowGreen",
            "#ADFF2F": "GreenYellow",
            "#7CFC00": "LawnGreen",
            "#7FFF00": "Chartreuse",
            "#008080": "Teal",
            "#008B8B": "DarkCyan",
            "#20B2AA": "LightSeaGreen",
            "#40E0D0": "Turquoise",
            "#48D1CC": "MediumTurquoise",
            "#AFEEEE": "PaleTurquoise",
            "#E0FFFF": "LightCyan",
            "#000080": "Navy",
            "#00008B": "DarkBlue",
            "#0000CD": "MediumBlue",
            "#4169E1": "RoyalBlue",
            "#4682B4": "SteelBlue",
            "#5F9EA0": "CadetBlue",
            "#87CEEB": "SkyBlue",
            "#87CEFA": "LightSkyBlue",
            "#ADD8E6": "LightBlue",
            "#B0C4DE": "LightSteelBlue",
            "#B0E0E6": "PowderBlue",
            "#6495ED": "CornflowerBlue",
            "#7B68EE": "MediumSlateBlue",
            "#6A5ACD": "SlateBlue",
            "#483D8B": "DarkSlateBlue",
            "#00BFFF": "DeepSkyBlue",
            "#1E90FF": "DodgerBlue",
            "#800080": "Purple",
            "#8B008B": "DarkMagenta",
            "#EE82EE": "Violet",
            "#DDA0DD": "Plum",
            "#DA70D6": "Orchid",
            "#BA55D3": "MediumOrchid",
            "#9370DB": "MediumPurple",
            "#8A2BE2": "BlueViolet",
            "#9400D3": "DarkViolet",
            "#9932CC": "DarkOrchid",
            "#4B0082": "Indigo",
            "#C71585": "MediumVioletRed",
            "#FF1493": "DeepPink",
            "#FF69B4": "HotPink",
            "#FFB6C1": "LightPink",
            "#FFC0CB": "Pink",
            "#8B4513": "SaddleBrown",
            "#A0522D": "Sienna",
            "#D2691E": "Chocolate",
            "#CD853F": "Peru",
            "#DEB887": "BurlyWood",
            "#F4A460": "SandyBrown",
            "#DAA520": "GoldenRod",
            "#B8860B": "DarkGoldenRod",
            "#F5F5DC": "Beige",
            "#FFFAF0": "FloralWhite",
            "#FFFFF0": "Ivory",
            "#FAEBD7": "AntiqueWhite",
            "#FFF0F5": "LavenderBlush",
            "#FFE4E1": "MistyRose",
            "#E6E6FA": "Lavender",
            "#D8BFD8": "Thistle",
            "#D2B48C": "Tan",
            "#BC8F8F": "RosyBrown",
            "#800020": "Burgundy",
        };

        function updateColor() {
            const colorInput = document.getElementById('color_code');
            const colorPreview = document.getElementById('color_preview');
            const colorNameDisplay = document.getElementById('color_name_display');

            let colorCode = colorInput.value.trim();

            // Add # if missing from hex code
            if (/^[0-9A-Fa-f]{3,6}$/.test(colorCode)) {
                colorCode = '#' + colorCode;
            }

            // Normalize 3-digit hex codes to 6-digit
            if (/^#[0-9A-Fa-f]{3}$/.test(colorCode)) {
                colorCode = '#' + colorCode[1] + colorCode[1] + colorCode[2] + colorCode[2] + colorCode[3] + colorCode[3];
            }

            // Update the preview
            if (isValidColor(colorCode)) {
                colorPreview.style.backgroundColor = colorCode;

                // Find color name
                const upperColorCode = colorCode.toUpperCase();
                const colorName = colorMap[upperColorCode] || findSimilarColor(colorCode);

                if (colorName) {
                    colorNameDisplay.textContent = colorName + " (" + colorCode + ")";
                } else {
                    colorNameDisplay.textContent = "Custom color (" + colorCode + ")";
                }
            } else {
                colorPreview.style.backgroundColor = "";
                colorNameDisplay.textContent = "Enter a valid color code";
            }
        }

        function isValidColor(color) {
            // Check if the color is valid
            const tempElement = document.createElement('div');
            tempElement.style.color = color;
            return tempElement.style.color !== "";
        }

        function findSimilarColor(colorCode) {
            // Find similar color for unknown hex codes
            if (!colorCode.startsWith('#') || colorCode.length !== 7) {
                return null;
            }

            // Convert input color to RGB
            const r1 = parseInt(colorCode.slice(1, 3), 16);
            const g1 = parseInt(colorCode.slice(3, 5), 16);
            const b1 = parseInt(colorCode.slice(5, 7), 16);

            let closestColor = null;
            let closestDistance = Number.MAX_VALUE;

            // Find closest match
            for (const [hex, name] of Object.entries(colorMap)) {
                if (hex.length === 7) {
                    const r2 = parseInt(hex.slice(1, 3), 16);
                    const g2 = parseInt(hex.slice(3, 5), 16);
                    const b2 = parseInt(hex.slice(5, 7), 16);

                    // Calculate color distance
                    const distance = Math.sqrt(
                        Math.pow(r2 - r1, 2) +
                        Math.pow(g2 - g1, 2) +
                        Math.pow(b2 - b1, 2)
                    );

                    if (distance < closestDistance) {
                        closestDistance = distance;
                        closestColor = name;
                    }
                }
            }

            // Only return if it's reasonably close
            if (closestDistance < 30) {
                return "Similar to " + closestColor;
            }

            return null;
        }

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function() {
            updateColor();
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const colorInput = document.getElementById('color_code');
            const colorPreview = document.getElementById('color_preview');
            const colorName = document.getElementById('color_name');

            // Comprehensive color names mapping
            const colorMap = {
                // Basic Colors
                "#000000": "Black",
                "#FFFFFF": "White",
                "#FF0000": "Red",
                "#00FF00": "Lime",
                "#0000FF": "Blue",
                "#FFFF00": "Yellow",
                "#00FFFF": "Cyan",
                "#FF00FF": "Magenta",
                "#4F42B5": "Ocean Blue",
                "#8EE53F": "Kiwi Green",
                "#7BB661": "Dark Kiwi",


                "#C0C0C0": "Silver / Silver Grey,

                // Shades of Gray

                "#808080": "Gray",
                "#696969": "DimGray",
                "#A9A9A9": "DarkGray",
                "#D3D3D3": "LightGray",
                "#DCDCDC": "Gainsboro",
                "#F5F5F5": "WhiteSmoke",

                // Red Colors
                "#800000": "Maroon",
                "#8B0000": "DarkRed",
                "#A52A2A": "Brown",
                "#B22222": "FireBrick",
                "#CD5C5C": "IndianRed",
                "#DC143C": "Crimson",
                "#F08080": "LightCoral",
                "#FA8072": "Salmon",
                "#E9967A": "DarkSalmon",
                "#FFA07A": "LightSalmon",

                // Orange Colors
                "#FF4500": "OrangeRed",
                "#FF6347": "Tomato",
                "#FF7F50": "Coral",
                "#FF8C00": "DarkOrange",
                "#FFA500": "Orange",

                // Yellow Colors
                "#FFD700": "Gold",
                "#FFFFE0": "LightYellow",
                "#FFFACD": "LemonChiffon",
                "#FAFAD2": "LightGoldenrodYellow",
                "#FFEFD5": "PapayaWhip",
                "#FFE4B5": "Moccasin",
                "#FFDAB9": "PeachPuff",
                "#EEE8AA": "PaleGoldenrod",
                "#F0E68C": "Khaki",
                "#BDB76B": "DarkKhaki",

                // Green Colors
                "#006400": "DarkGreen",
                "#008000": "Green",
                "#228B22": "ForestGreen",
                "#00FF00": "Lime",
                "#32CD32": "LimeGreen",
                "#90EE90": "LightGreen",
                "#98FB98": "PaleGreen",
                "#8FBC8F": "DarkSeaGreen",
                "#00FA9A": "MediumSpringGreen",
                "#00FF7F": "SpringGreen",
                "#2E8B57": "SeaGreen",
                "#3CB371": "MediumSeaGreen",
                "#66CDAA": "MediumAquamarine",
                "#7FFFD4": "Aquamarine",
                "#20B2AA": "LightSeaGreen",
                "#808000": "Olive",
                "#556B2F": "DarkOliveGreen",
                "#6B8E23": "OliveDrab",
                "#9ACD32": "YellowGreen",
                "#7CFC00": "LawnGreen",
                "#ADFF2F": "GreenYellow",
                "#7FFF00": "Chartreuse",

                // Cyan Colors
                "#008080": "Teal",
                "#008B8B": "DarkCyan",
                "#00FFFF": "Aqua/Cyan",
                "#00CED1": "DarkTurquoise",
                "#40E0D0": "Turquoise",
                "#48D1CC": "MediumTurquoise",
                "#AFEEEE": "PaleTurquoise",
                "#E0FFFF": "LightCyan",

                // Blue Colors
                "#000080": "Navy",
                "#00008B": "DarkBlue",
                "#0000CD": "MediumBlue",
                "#0000FF": "Blue",
                "#1E90FF": "DodgerBlue",
                "#4169E1": "RoyalBlue",
                "#4682B4": "SteelBlue",
                "#5F9EA0": "CadetBlue",
                "#87CEEB": "SkyBlue",
                "#87CEFA": "LightSkyBlue",
                "#ADD8E6": "LightBlue",
                "#B0C4DE": "LightSteelBlue",
                "#B0E0E6": "PowderBlue",
                "#6495ED": "CornflowerBlue",
                "#7B68EE": "MediumSlateBlue",
                "#6A5ACD": "SlateBlue",
                "#483D8B": "DarkSlateBlue",
                "#00BFFF": "DeepSkyBlue",
                "#1E90FF": "DodgerBlue",

                // Purple/Violet Colors
                "#800080": "Purple",
                "#8B008B": "DarkMagenta",
                "#FF00FF": "Fuchsia/Magenta",
                "#EE82EE": "Violet",
                "#DDA0DD": "Plum",
                "#DA70D6": "Orchid",
                "#BA55D3": "MediumOrchid",
                "#9370DB": "MediumPurple",
                "#8A2BE2": "BlueViolet",
                "#9400D3": "DarkViolet",
                "#9932CC": "DarkOrchid",
                "#4B0082": "Indigo",
                "#8B008B": "DarkMagenta",
                "#C71585": "MediumVioletRed",
                "#FF1493": "DeepPink",
                "#FF69B4": "HotPink",
                "#FFB6C1": "LightPink",
                "#FFC0CB": "Pink",
                "#800020": "burgundy",

                // Brown Colors
                "#A52A2A": "Brown",
                "#8B4513": "SaddleBrown",
                "#A0522D": "Sienna",
                "#D2691E": "Chocolate",
                "#CD853F": "Peru",
                "#DEB887": "BurlyWood",
                "#F4A460": "SandyBrown",
                "#DAA520": "GoldenRod",
                "#B8860B": "DarkGoldenRod",

                // White Colors
                "#FFFAFA": "Snow",
                "#F0FFF0": "Honeydew",
                "#F5FFFA": "MintCream",
                "#F0FFFF": "Azure",
                "#F0F8FF": "AliceBlue",
                "#F8F8FF": "GhostWhite",
                "#F5F5F5": "WhiteSmoke",
                "#FFF5EE": "SeaShell",
                "#F5F5DC": "Beige",
                "#FDF5E6": "OldLace",
                "#FFFAF0": "FloralWhite",
                "#FFFFF0": "Ivory",
                "#FAEBD7": "AntiqueWhite",
                "#FAF0E6": "Linen",
                "#FFF0F5": "LavenderBlush",
                "#FFE4E1": "MistyRose",

                // Special Colors
                "#E6E6FA": "Lavender",
                "#D8BFD8": "Thistle",
                "#FFFACD": "LemonChiffon",
                "#FFE4C4": "Bisque",
                "#FFEBCD": "BlanchedAlmond",
                "#FFDEAD": "NavajoWhite",
                "#F5DEB3": "Wheat",
                "#FFE4B5": "Moccasin",
                "#FFDAB9": "PeachPuff",
                "#D2B48C": "Tan",
                "#BC8F8F": "RosyBrown",
                "#708090": "SlateGray",
                "#778899": "LightSlateGray"
            };

            // Initialize with any existing value
            updateColorDisplay(colorInput.value);

            // Add event listener for input changes
            colorInput.addEventListener('input', function() {
                updateColorDisplay(this.value);
            });

            function updateColorDisplay(colorCode) {
                // Normalize color code format
                const normalizedCode = normalizeColorCode(colorCode);

                // Update preview
                if (isValidColor(normalizedCode)) {
                    colorPreview.style.backgroundColor = normalizedCode;

                    // Display color name if known, otherwise show generic name
                    const knownName = getColorName(normalizedCode);
                    if (knownName) {
                        colorName.textContent = knownName + " (" + normalizedCode + ")";
                    } else {
                        colorName.textContent = "Custom color (" + normalizedCode + ")";
                    }
                } else {
                    colorPreview.style.backgroundColor = "";
                    colorName.textContent = "Enter a valid color code";
                }
            }

            function getColorName(colorCode) {
                // Try exact match first
                const upperCode = colorCode.toUpperCase();
                if (colorMap[upperCode]) {
                    return colorMap[upperCode];
                }

                // If not found, try to find the closest color (only for hex codes)
                if (colorCode.startsWith('#') && colorCode.length === 7) {
                    let closestColor = null;
                    let closestDistance = Number.MAX_VALUE;

                    // Convert input color to RGB
                    const r1 = parseInt(colorCode.slice(1, 3), 16);
                    const g1 = parseInt(colorCode.slice(3, 5), 16);
                    const b1 = parseInt(colorCode.slice(5, 7), 16);

                    // Find closest match
                    for (const [hex, name] of Object.entries(colorMap)) {
                        if (hex.length === 7) {
                            const r2 = parseInt(hex.slice(1, 3), 16);
                            const g2 = parseInt(hex.slice(3, 5), 16);
                            const b2 = parseInt(hex.slice(5, 7), 16);

                            // Calculate color distance (simple Euclidean distance)
                            const distance = Math.sqrt(
                                Math.pow(r2 - r1, 2) +
                                Math.pow(g2 - g1, 2) +
                                Math.pow(b2 - b1, 2)
                            );

                            if (distance < closestDistance) {
                                closestDistance = distance;
                                closestColor = name;
                            }
                        }
                    }

                    // Only return closest match if it's reasonably close
                    if (closestDistance < 30) {
                        return "Similar to " + closestColor;
                    }
                }

                return null;
            }

            function normalizeColorCode(colorCode) {
                if (!colorCode) return "";

                // Handle hex codes
                if (colorCode.startsWith('#')) {
                    return colorCode;
                }

                // Handle color names
                for (const [hex, name] of Object.entries(colorMap)) {
                    if (name.toLowerCase() === colorCode.toLowerCase()) {
                        return hex;
                    }
                }

                // If it seems like a hex code without #, add it
                if (/^[0-9A-Fa-f]{3,6}$/.test(colorCode)) {
                    // Convert 3-digit hex to 6-digit
                    if (colorCode.length === 3) {
                        return '#' + colorCode[0] + colorCode[0] + colorCode[1] + colorCode[1] + colorCode[2] +
                            colorCode[2];
                    }
                    return '#' + colorCode;
                }

                return colorCode;
            }

            function isValidColor(colorStr) {
                // Check if string is a valid CSS color
                const tempElement = document.createElement('div');
                tempElement.style.color = colorStr;
                return tempElement.style.color !== '';
            }
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Map of color codes to color names
            const colorMap = {
                "#000000": "Black",
                "#FFFFFF": "White",
                "#FF0000": "Red",
                "#00FF00": "Lime",
                "#0000FF": "Blue",
                "#FFFF00": "Yellow",
                "#00FFFF": "Cyan",
                "#FF00FF": "Magenta",
                "#4F42B5": "Ocean Blue",
                "#8EE53F": "Kiwi Green",
                "#7BB661": "Dark Kiwi",


                "#C0C0C0": "Silver / Silver Grey",

                // Shades of Gray

                "#808080": "Gray",
                "#696969": "DimGray",
                "#A9A9A9": "DarkGray",
                "#D3D3D3": "LightGray",
                "#DCDCDC": "Gainsboro",
                "#F5F5F5": "WhiteSmoke",

                // Red Colors
                "#800000": "Maroon",
                "#8B0000": "DarkRed",
                "#A52A2A": "Brown",
                "#B22222": "FireBrick",
                "#CD5C5C": "IndianRed",
                "#DC143C": "Crimson",
                "#F08080": "LightCoral",
                "#FA8072": "Salmon",
                "#E9967A": "DarkSalmon",
                "#FFA07A": "LightSalmon",
                "#800020": "burgundy",

                // Orange Colors
                "#FF4500": "OrangeRed",
                "#FF6347": "Tomato",
                "#FF7F50": "Coral",
                "#FF8C00": "DarkOrange",
                "#FFA500": "Orange",

                // Yellow Colors
                "#FFD700": "Gold",
                "#FFFFE0": "LightYellow",
                "#FFFACD": "LemonChiffon",
                "#FAFAD2": "LightGoldenrodYellow",
                "#FFEFD5": "PapayaWhip",
                "#FFE4B5": "Moccasin",
                "#FFDAB9": "PeachPuff",
                "#EEE8AA": "PaleGoldenrod",
                "#F0E68C": "Khaki",
                "#BDB76B": "DarkKhaki",

                // Green Colors
                "#006400": "DarkGreen",
                "#008000": "Green",
                "#228B22": "ForestGreen",
                "#00FF00": "Lime",
                "#32CD32": "LimeGreen",
                "#90EE90": "LightGreen",
                "#98FB98": "PaleGreen",
                "#8FBC8F": "DarkSeaGreen",
                "#00FA9A": "MediumSpringGreen",
                "#00FF7F": "SpringGreen",
                "#2E8B57": "SeaGreen",
                "#3CB371": "MediumSeaGreen",
                "#66CDAA": "MediumAquamarine",
                "#7FFFD4": "Aquamarine",
                "#20B2AA": "LightSeaGreen",
                "#808000": "Olive",
                "#556B2F": "DarkOliveGreen",
                "#6B8E23": "OliveDrab",
                "#9ACD32": "YellowGreen",
                "#7CFC00": "LawnGreen",
                "#ADFF2F": "GreenYellow",
                "#7FFF00": "Chartreuse",

                // Cyan Colors
                "#008080": "Teal",
                "#008B8B": "DarkCyan",
                "#00FFFF": "Aqua/Cyan",
                "#00CED1": "DarkTurquoise",
                "#40E0D0": "Turquoise",
                "#48D1CC": "MediumTurquoise",
                "#AFEEEE": "PaleTurquoise",
                "#E0FFFF": "LightCyan",

                // Blue Colors
                "#000080": "Navy",
                "#00008B": "DarkBlue",
                "#0000CD": "MediumBlue",
                "#0000FF": "Blue",
                "#1E90FF": "DodgerBlue",
                "#4169E1": "RoyalBlue",
                "#4682B4": "SteelBlue",
                "#5F9EA0": "CadetBlue",
                "#87CEEB": "SkyBlue",
                "#87CEFA": "LightSkyBlue",
                "#ADD8E6": "LightBlue",
                "#B0C4DE": "LightSteelBlue",
                "#B0E0E6": "PowderBlue",
                "#6495ED": "CornflowerBlue",
                "#7B68EE": "MediumSlateBlue",
                "#6A5ACD": "SlateBlue",
                "#483D8B": "DarkSlateBlue",
                "#00BFFF": "DeepSkyBlue",
                "#1E90FF": "DodgerBlue",

                // Purple/Violet Colors
                "#800080": "Purple",
                "#8B008B": "DarkMagenta",
                "#FF00FF": "Fuchsia/Magenta",
                "#EE82EE": "Violet",
                "#DDA0DD": "Plum",
                "#DA70D6": "Orchid",
                "#BA55D3": "MediumOrchid",
                "#9370DB": "MediumPurple",
                "#8A2BE2": "BlueViolet",
                "#9400D3": "DarkViolet",
                "#9932CC": "DarkOrchid",
                "#4B0082": "Indigo",
                "#8B008B": "DarkMagenta",
                "#C71585": "MediumVioletRed",
                "#FF1493": "DeepPink",
                "#FF69B4": "HotPink",
                "#FFB6C1": "LightPink",
                "#FFC0CB": "Pink",

                // Brown Colors
                "#A52A2A": "Brown",
                "#8B4513": "SaddleBrown",
                "#A0522D": "Sienna",
                "#D2691E": "Chocolate",
                "#CD853F": "Peru",
                "#DEB887": "BurlyWood",
                "#F4A460": "SandyBrown",
                "#DAA520": "GoldenRod",
                "#B8860B": "DarkGoldenRod",


                // White Colors
                "#FFFAFA": "Snow",
                "#F0FFF0": "Honeydew",
                "#F5FFFA": "MintCream",
                "#F0FFFF": "Azure",
                "#F0F8FF": "AliceBlue",
                "#F8F8FF": "GhostWhite",
                "#F5F5F5": "WhiteSmoke",
                "#FFF5EE": "SeaShell",
                "#F5F5DC": "Beige",
                "#FDF5E6": "OldLace",
                "#FFFAF0": "FloralWhite",
                "#FFFFF0": "Ivory",
                "#FAEBD7": "AntiqueWhite",
                "#FAF0E6": "Linen",
                "#FFF0F5": "LavenderBlush",
                "#FFE4E1": "MistyRose",

                // Special Colors
                "#E6E6FA": "Lavender",
                "#D8BFD8": "Thistle",
                "#FFFACD": "LemonChiffon",
                "#FFE4C4": "Bisque",
                "#FFEBCD": "BlanchedAlmond",
                "#FFDEAD": "NavajoWhite",
                "#F5DEB3": "Wheat",
                "#FFE4B5": "Moccasin",
                "#FFDAB9": "PeachPuff",
                "#D2B48C": "Tan",
                "#BC8F8F": "RosyBrown",
                "#708090": "SlateGray",
                "#778899": "LightSlateGray"
                // Add all the colors from the previous list here
                // (abbreviated for brevity)
            };

            // Get all color name elements
            const colorElements = document.querySelectorAll('.color-name');

            // Update each element with the color name
            colorElements.forEach(function(element) {
                const colorCode = element.getAttribute('data-color').trim().toUpperCase();
                const colorName = colorMap[colorCode] || "Custom";
                element.textContent = colorCode + " (" + colorName + ")";
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#answer').summernote({
                tabsize: 2,
                height: 200
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            // Initialize Summernote
            $('#summernote_cancellationPolicy').summernote({
                tabsize: 2,
                height: 200,
                callbacks: {
                    onChange: function(contents) {
                        // Remove error styling when user starts typing
                        $('.note-editor').removeClass('is-invalid');
                        $('.error-message').remove(); // Remove any existing error message
                    }
                },
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['view', ['fullscreen', 'codeview']]
                ]
            });

            // Add client-side validation
            $('#cancellationPolicyForm').on('submit', function(e) {
                let description = $('#summernote_cancellationPolicy').summernote('code');
                let plainText = $('<div>').html(description).text().trim();

                $('.error-message').remove(); // Remove any existing error message

                if (plainText.length === 0) {
                    e.preventDefault();
                    $('.note-editor').addClass('is-invalid');
                    $('<span class="invalid-feedback d-block error-message"><strong>The description field is required.</strong></span>')
                        .insertAfter('.note-editor');
                    return false;
                }
            });

            // Apply error styling if validation failed
            if ($(".is-invalid").length > 0) {
                $('.note-editor').addClass('is-invalid');
            }
        });
    </script>



    <script>
        $(document).ready(function() {
            $('#remarks').summernote({
                tabsize: 2,
                height: 200
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#product_det').summernote({
                tabsize: 2,
                height: 200
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            $('#summernote_news_offer').summernote({
                tabsize: 2,
                height: 200
            });
        });
    </script>



    <script>
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                    pageLanguage: 'en'
                },
                'google_translate_element'
            );

            // Change the class and text color of the select element
            setTimeout(function() {
                var selectElement = document.querySelector(".goog-te-combo");
                if (selectElement) {
                    selectElement.classList.add("nav-link", "changeLanguage");
                    selectElement.style.color = "#002c8f"; // Set the text color to black
                    selectElement.style.paddingLeft = "0";
                }
            }, 1000); // Adjust the delay as needed
        }
    </script>

    <script></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let saleSelect = document.getElementById("sale");
            let salePercentageGroup = document.getElementById("salePercentageGroup");

            // Function to toggle visibility
            function toggleSalePercentage() {
                if (saleSelect.value === "yes") {
                    salePercentageGroup.style.display = "block";
                } else {
                    salePercentageGroup.style.display = "none";
                }
            }

            // Attach event listener
            saleSelect.addEventListener("change", toggleSalePercentage);

            // Run on page load (in case of old input values)
            toggleSalePercentage();
        });
    </script>
    {{--  <script>
        function updateColor() {
            let colorInput = document.getElementById("color_code");
            let color = colorInput.value.trim().toLowerCase();

            // Check if the input is a valid color
            colorInput.style.backgroundColor = color;
        }
    </script>  --}}






    {{--  <script>
        // Wait for the DOM to be fully loaded
        document.addEventListener('DOMContentLoaded', function() {
            // Get the CSRF token from the <meta> tag
            const csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;

            // Get all toggle switches
            const statusToggles = document.querySelectorAll('.status-toggle');

            // Add event listener to each toggle switch
            statusToggles.forEach(function(toggle) {
                toggle.addEventListener('change', function() {
                    const shopId = this.dataset.shopId;
                    const status = this.checked ? 1 : 0;

                    // Make an AJAX request to update the status in the database
                    fetch(`https://quantumhostings.com/projects/aziem/public/update-shop-status/${shopId}`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': csrfToken // CSRF token
                            },
                            body: JSON.stringify({
                                status: status
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            // Handle the response if needed (Success message)
                            console.log(data.message);
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });
                });
            });
        });
    </script>  --}}


</body>

</html>

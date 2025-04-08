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

    <!-- Add this JavaScript to the bottom of your form -->
    {{--  <script>
        document.getElementById('product_images').addEventListener('change', function(event) {
            const files = event.target.files;
            const container = document.getElementById('imagePreviewContainer');
            container.innerHTML = ''; // Clear previous previews

            // Color options from Blade template
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

            // Size options from Blade template
            const sizeOptions = [
                @foreach ($sizes as $size)
                    {
                        id: "{{ $size->id }}",
                        name: "{{ $size->size_name }}"
                    },
                @endforeach
            ];

            Array.from(files).forEach((file, index) => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const uniqueId = `img_${Date.now()}_${index}`; // Unique ID for tracking

                    const col = document.createElement('div');
                    col.className = 'col-md-4 mb-3';

                    const card = document.createElement('div');
                    card.className = 'card shadow-sm';

                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = 'card-img-top';
                    img.style.height = '150px';
                    img.style.objectFit = 'cover';

                    const cardBody = document.createElement('div');
                    cardBody.className = 'card-body';

                    // Hidden input to track unique image identifier
                    const hiddenInput = document.createElement('input');
                    hiddenInput.type = 'hidden';
                    hiddenInput.name = `image_ids[]`;
                    hiddenInput.value = uniqueId;

                    // Color Selection Dropdown
                    const colorFormGroup = document.createElement('div');
                    colorFormGroup.className = 'form-group';

                    const colorLabel = document.createElement('label');
                    colorLabel.textContent = 'Assign to Color:';

                    const colorSelect = document.createElement('select');
                    colorSelect.className = 'form-control';
                    colorSelect.name = `color_specific_images[${uniqueId}]`;

                    colorOptions.forEach(color => {
                        const option = document.createElement('option');
                        option.value = color.id;
                        option.textContent = color.name;
                        colorSelect.appendChild(option);
                    });

                    colorFormGroup.appendChild(colorLabel);
                    colorFormGroup.appendChild(colorSelect);

                    // Size Selection (Multi-Select Dropdown)
                    const sizeFormGroup = document.createElement('div');
                    sizeFormGroup.className = 'form-group mt-2';

                    const sizeLabel = document.createElement('label');
                    sizeLabel.textContent = 'Select Sizes:';

                    const sizeSelect = document.createElement('select');
                    sizeSelect.className = 'form-control';
                    sizeSelect.name =
                        `size_specific_images[${uniqueId}][]`; // Allows multiple selections
                    sizeSelect.multiple = true;

                    sizeOptions.forEach(size => {
                        const option = document.createElement('option');
                        option.value = size.id;
                        option.textContent = size.name;
                        sizeSelect.appendChild(option);
                    });

                    sizeFormGroup.appendChild(sizeLabel);
                    sizeFormGroup.appendChild(sizeSelect);

                    // Append everything
                    cardBody.appendChild(hiddenInput);
                    cardBody.appendChild(colorFormGroup);
                    cardBody.appendChild(sizeFormGroup);
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
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById('product_images').addEventListener('change', function(event) {
                const files = event.target.files;
                const container = document.getElementById('imagePreviewContainer');
                container.innerHTML = ''; // Clear previous previews

                // Fetch color options from Laravel Blade syntax safely
                const colorOptions = [{
                        id: "",
                        name: "Default (All Colors)"
                    }
                    @foreach ($colors as $color)
                        , {
                            id: "{{ $color->id }}",
                            name: "{{ $color->color_name }} ({{ $color->color_code }})"
                        }
                    @endforeach
                ];

                // Fetch size options safely
                const sizeOptions = [
                    @foreach ($sizes as $size)
                        {
                            id: "{{ $size->id }}",
                            name: "{{ $size->size_name }}"
                        },
                    @endforeach
                ];

                Array.from(files).forEach((file, index) => {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const uniqueId = `img_${Date.now()}_${index}`; // Unique ID for tracking

                        // Create image preview container
                        const col = document.createElement('div');
                        col.className = 'col-md-4 mb-3';

                        const card = document.createElement('div');
                        card.className = 'card shadow-sm';

                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.className = 'card-img-top';
                        img.style.height = '150px';
                        img.style.objectFit = 'cover';

                        const cardBody = document.createElement('div');
                        cardBody.className = 'card-body';

                        // Hidden input to track unique image identifier
                        const hiddenInput = document.createElement('input');
                        hiddenInput.type = 'hidden';
                        hiddenInput.name = `image_ids[]`;
                        hiddenInput.value = uniqueId;

                        // Color Selection Dropdown
                        const colorFormGroup = document.createElement('div');
                        colorFormGroup.className = 'form-group';

                        const colorLabel = document.createElement('label');
                        colorLabel.textContent = 'Assign to Color:';

                        const colorSelect = document.createElement('select');
                        colorSelect.className = 'form-control';
                        colorSelect.name = `color_specific_images[${uniqueId}]`;

                        colorOptions.forEach(color => {
                            const option = document.createElement('option');
                            option.value = color.id;
                            option.textContent = color.name;
                            colorSelect.appendChild(option);
                        });

                        colorFormGroup.appendChild(colorLabel);
                        colorFormGroup.appendChild(colorSelect);

                        // Size Selection with Quantity Input
                        const sizeFormGroup = document.createElement('div');
                        sizeFormGroup.className = 'form-group mt-2';

                        const sizeLabel = document.createElement('label');
                        sizeLabel.textContent = 'Select Sizes & Quantities:';

                        const sizeContainer = document.createElement('div');

                        sizeOptions.forEach(size => {
                            const sizeWrapper = document.createElement('div');
                            sizeWrapper.className = 'd-flex align-items-center mb-2';

                            const sizeCheckbox = document.createElement('input');
                            sizeCheckbox.type = 'checkbox';
                            sizeCheckbox.name =
                                `size_specific_images[${uniqueId}][sizes][]`;
                            sizeCheckbox.value = size.id;
                            sizeCheckbox.className = 'mr-2';

                            const sizeText = document.createElement('span');
                            sizeText.textContent = size.name;
                            sizeText.className = 'mr-2';

                            const quantityInput = document.createElement('input');
                            quantityInput.type = 'number';
                            quantityInput.name =
                                `size_specific_images[${uniqueId}][quantities][${size.id}]`;
                            quantityInput.placeholder = 'Qty';
                            quantityInput.className = 'form-control ml-2';
                            quantityInput.style.width = '80px';
                            quantityInput.min = '0';
                            quantityInput.disabled = true; // Initially disabled

                            // Enable quantity input when checkbox is checked
                            sizeCheckbox.addEventListener('change', function() {
                                quantityInput.disabled = !this.checked;
                                if (!this.checked) {
                                    quantityInput.value =
                                        ''; // Reset if unchecked
                                }
                            });

                            sizeWrapper.appendChild(sizeCheckbox);
                            sizeWrapper.appendChild(sizeText);
                            sizeWrapper.appendChild(quantityInput);

                            sizeContainer.appendChild(sizeWrapper);
                        });

                        sizeFormGroup.appendChild(sizeLabel);
                        sizeFormGroup.appendChild(sizeContainer);

                        // Append everything
                        cardBody.appendChild(hiddenInput);
                        cardBody.appendChild(colorFormGroup);
                        cardBody.appendChild(sizeFormGroup);
                        card.appendChild(img);
                        card.appendChild(cardBody);
                        col.appendChild(card);
                        container.appendChild(col);
                    };

                    reader.readAsDataURL(file);
                });
            });
        });
    </script>


    {{--  <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById('product_images').addEventListener('change', function(event) {
                const files = event.target.files;
                const container = document.getElementById('imagePreviewContainer');
                container.innerHTML = ''; // Clear previous previews

                // Fetch color options safely
                const colorOptions = [{
                        id: "",
                        name: "Default (All Colors)"
                    }
                    @foreach ($colors as $color)
                        , {
                            id: "{{ $color->id }}",
                            name: "{{ $color->color_name }} ({{ $color->color_code }})"
                        }
                    @endforeach
                ];

                // Fetch size options safely
                const sizeOptions = [
                    @foreach ($sizes as $size)
                        {
                            id: "{{ $size->id }}",
                            name: "{{ $size->size_name }}"
                        },
                    @endforeach
                ];

                Array.from(files).forEach((file, index) => {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const uniqueId = `img_${Date.now()}_${index}`; // Ensure unique ID

                        const col = document.createElement('div');
                        col.className = 'col-md-4 mb-3';

                        const card = document.createElement('div');
                        card.className = 'card shadow-sm';

                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.className = 'card-img-top';
                        img.style.height = '150px';
                        img.style.objectFit = 'cover';

                        const cardBody = document.createElement('div');
                        cardBody.className = 'card-body';

                        // Hidden input to track unique image identifier
                        const hiddenInput = document.createElement('input');
                        hiddenInput.type = 'hidden';
                        hiddenInput.name = `image_identifiers[]`;
                        hiddenInput.value = uniqueId;

                        // Color Selection Dropdown
                        const colorFormGroup = document.createElement('div');
                        colorFormGroup.className = 'form-group';

                        const colorLabel = document.createElement('label');
                        colorLabel.textContent = 'Assign to Color:';

                        const colorSelect = document.createElement('select');
                        colorSelect.className = 'form-control';
                        colorSelect.name = `color_specific_images[${uniqueId}]`;

                        colorOptions.forEach(color => {
                            const option = document.createElement('option');
                            option.value = color.id;
                            option.textContent = color.name;
                            colorSelect.appendChild(option);
                        });

                        colorFormGroup.appendChild(colorLabel);
                        colorFormGroup.appendChild(colorSelect);

                        // Size Selection with Quantity Input
                        const sizeFormGroup = document.createElement('div');
                        sizeFormGroup.className = 'form-group mt-2';

                        const sizeLabel = document.createElement('label');
                        sizeLabel.textContent = 'Select Sizes & Quantities:';

                        const sizeContainer = document.createElement('div');

                        sizeOptions.forEach(size => {
                            const sizeWrapper = document.createElement('div');
                            sizeWrapper.className = 'd-flex align-items-center mb-2';

                            const sizeCheckbox = document.createElement('input');
                            sizeCheckbox.type = 'checkbox';
                            sizeCheckbox.name =
                                `size_specific_images[${uniqueId}][sizes][]`;
                            sizeCheckbox.value = size.id;
                            sizeCheckbox.className = 'mr-2';

                            const sizeText = document.createElement('span');
                            sizeText.textContent = size.name;
                            sizeText.className = 'mr-2';

                            const quantityInput = document.createElement('input');
                            quantityInput.type = 'number';
                            quantityInput.name =
                                `size_specific_images[${uniqueId}][quantities][${size.id}]`;
                            quantityInput.placeholder = 'Qty';
                            quantityInput.className = 'form-control ml-2';
                            quantityInput.style.width = '80px';
                            quantityInput.min = '0';
                            quantityInput.disabled = true; // Initially disabled

                            // Enable quantity input when checkbox is checked
                            sizeCheckbox.addEventListener('change', function() {
                                quantityInput.disabled = !this.checked;
                                if (!this.checked) {
                                    quantityInput.value =
                                    ''; // Reset if unchecked
                                }
                            });

                            sizeWrapper.appendChild(sizeCheckbox);
                            sizeWrapper.appendChild(sizeText);
                            sizeWrapper.appendChild(quantityInput);

                            sizeContainer.appendChild(sizeWrapper);
                        });

                        sizeFormGroup.appendChild(sizeLabel);
                        sizeFormGroup.appendChild(sizeContainer);

                        // Append everything
                        cardBody.appendChild(hiddenInput);
                        cardBody.appendChild(colorFormGroup);
                        cardBody.appendChild(sizeFormGroup);
                        card.appendChild(img);
                        card.appendChild(cardBody);
                        col.appendChild(card);
                        container.appendChild(col);
                    };

                    reader.readAsDataURL(file);
                });
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

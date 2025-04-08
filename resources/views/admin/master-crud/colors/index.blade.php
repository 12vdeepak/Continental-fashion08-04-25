@extends('backend.layouts.app')
@section('title', 'Admin - Color')

@section('content')


    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="mb-2 row">
                    <div class="col-sm-6">
                        <h1>Colors</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Color</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        @if (session('success'))
            <div class="card-body">
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5>{{ Session::get('success') }}</h5>
                    <?php Session::forget('success'); ?>
                </div>
            </div>
        @endif



        <section class="content">
            {{-- <div class="container-fluid">
        <div class="row">
          <div class="col-12"> --}}


            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><a href="{{ route('colors.create') }}"><button type="button"
                                class="btn btn-block bg-gradient-primary">Add Color</button></a></h3>

                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 50px;">S.No</th>
                                <th class="text-center" style="width: 150px;">Color</th>
                                <th class="text-center" style="width: 150px;">Action</th>
                                <!-- Set fixed width for action buttons -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($color as $index => $colors)
                                <tr>
                                    <td class="text-center">{{ $index + 1 }}</td>
                                    @php
                                        $colorNames = [
                                            '#000000' => 'Black',
                                            '#FFFFFF' => 'White',
                                            '#FF0000' => 'Red',
                                            '#00FF00' => 'Lime',
                                            '#0000FF' => 'Blue',
                                            '#FFFF00' => 'Yellow',
                                            '#00FFFF' => 'Cyan',
                                            '#FF00FF' => 'Magenta',
                                            '#C0C0C0' => 'Silver',
                                            '#C0C0C0' => 'Silver Grey',
                                            '#800020' => 'Burgundy',

                                            '#808080' => 'Gray',
                                            '#696969' => 'DimGray',
                                            '#A9A9A9' => 'DarkGray',
                                            '#D3D3D3' => 'LightGray',
                                            '#DCDCDC' => 'Gainsboro',
                                            '#F5F5F5' => 'WhiteSmoke',
                                            '#800000' => 'Maroon',
                                            '#8B0000' => 'DarkRed',
                                            '#A52A2A' => 'Brown',
                                            '#B22222' => 'FireBrick',
                                            '#CD5C5C' => 'IndianRed',
                                            '#DC143C' => 'Crimson',
                                            '#F08080' => 'LightCoral',
                                            '#FA8072' => 'Salmon',
                                            '#E9967A' => 'DarkSalmon',
                                            '#FFA07A' => 'LightSalmon',
                                            '#FF4500' => 'OrangeRed',
                                            '#FF6347' => 'Tomato',
                                            '#FF7F50' => 'Coral',
                                            '#FF8C00' => 'DarkOrange',
                                            '#FFA500' => 'Orange',
                                            '#FFD700' => 'Gold',
                                            '#FFFFE0' => 'LightYellow',
                                            '#FFFACD' => 'LemonChiffon',
                                            '#FAFAD2' => 'LightGoldenrodYellow',
                                            '#FFEFD5' => 'PapayaWhip',
                                            '#FFE4B5' => 'Moccasin',
                                            '#FFDAB9' => 'PeachPuff',
                                            '#EEE8AA' => 'PaleGoldenrod',
                                            '#F0E68C' => 'Khaki',
                                            '#BDB76B' => 'DarkKhaki',
                                            '#006400' => 'DarkGreen',
                                            '#008000' => 'Green',
                                            '#228B22' => 'ForestGreen',
                                            '#32CD32' => 'LimeGreen',
                                            '#90EE90' => 'LightGreen',
                                            '#98FB98' => 'PaleGreen',
                                            '#8FBC8F' => 'DarkSeaGreen',
                                            '#00FA9A' => 'MediumSpringGreen',
                                            '#00FF7F' => 'SpringGreen',
                                            '#2E8B57' => 'SeaGreen',
                                            '#3CB371' => 'MediumSeaGreen',
                                            '#66CDAA' => 'MediumAquamarine',
                                            '#7FFFD4' => 'Aquamarine',
                                            '#808000' => 'Olive',
                                            '#556B2F' => 'DarkOliveGreen',
                                            '#6B8E23' => 'OliveDrab',
                                            '#9ACD32' => 'YellowGreen',
                                            '#ADFF2F' => 'GreenYellow',
                                            '#7CFC00' => 'LawnGreen',
                                            '#7FFF00' => 'Chartreuse',
                                            '#008080' => 'Teal',
                                            '#008B8B' => 'DarkCyan',
                                            '#20B2AA' => 'LightSeaGreen',
                                            '#40E0D0' => 'Turquoise',
                                            '#48D1CC' => 'MediumTurquoise',
                                            '#AFEEEE' => 'PaleTurquoise',
                                            '#E0FFFF' => 'LightCyan',
                                            '#000080' => 'Navy',
                                            '#00008B' => 'DarkBlue',
                                            '#0000CD' => 'MediumBlue',
                                            '#4169E1' => 'RoyalBlue',
                                            '#4682B4' => 'SteelBlue',
                                            '#5F9EA0' => 'CadetBlue',
                                            '#87CEEB' => 'SkyBlue',
                                            '#87CEFA' => 'LightSkyBlue',
                                            '#ADD8E6' => 'LightBlue',
                                            '#B0C4DE' => 'LightSteelBlue',
                                            '#B0E0E6' => 'PowderBlue',
                                            '#6495ED' => 'CornflowerBlue',
                                            '#7B68EE' => 'MediumSlateBlue',
                                            '#6A5ACD' => 'SlateBlue',
                                            '#483D8B' => 'DarkSlateBlue',
                                            '#00BFFF' => 'DeepSkyBlue',
                                            '#1E90FF' => 'DodgerBlue',
                                            '#800080' => 'Purple',
                                            '#8B008B' => 'DarkMagenta',
                                            '#EE82EE' => 'Violet',
                                            '#DDA0DD' => 'Plum',
                                            '#4F42B5' => 'Ocean Blue',
                                            '#DA70D6' => 'Orchid',
                                            '#BA55D3' => 'MediumOrchid',
                                            '#9370DB' => 'MediumPurple',
                                            '#8A2BE2' => 'BlueViolet',
                                            '#9400D3' => 'DarkViolet',
                                            '#9932CC' => 'DarkOrchid',
                                            '#4B0082' => 'Indigo',
                                            '#C71585' => 'MediumVioletRed',
                                            '#FF1493' => 'DeepPink',
                                            '#FF69B4' => 'HotPink',
                                            '#FFB6C1' => 'LightPink',
                                            '#FFC0CB' => 'Pink',
                                            '#8B4513' => 'SaddleBrown',
                                            '#A0522D' => 'Sienna',
                                            '#D2691E' => 'Chocolate',
                                            '#CD853F' => 'Peru',
                                            '#DEB887' => 'BurlyWood',
                                            '#F4A460' => 'SandyBrown',
                                            '#DAA520' => 'GoldenRod',
                                            '#B8860B' => 'DarkGoldenRod',
                                            '#F5F5DC' => 'Beige',
                                            '#FFFAF0' => 'FloralWhite',
                                            '#FFFFF0' => 'Ivory',
                                            '#FAEBD7' => 'AntiqueWhite',
                                            '#FFF0F5' => 'LavenderBlush',
                                            '#FFE4E1' => 'MistyRose',
                                            '#E6E6FA' => 'Lavender',
                                            '#D8BFD8' => 'Thistle',
                                            '#D2B48C' => 'Tan',
                                            '#BC8F8F' => 'RosyBrown',

                                            // Add more as needed
                                        ];

                                        $hex = strtoupper(trim($colors->color_code));
                                        $colorName = $colorNames[$hex] ?? 'Unknown';
                                    @endphp

                                    <td class="text-center">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <span
                                                style="display: inline-block; width: 20px; height: 20px; background-color: {{ $hex }};
                                                border: 1px solid #000; border-radius: 3px; margin-right: 5px;"
                                                title="{{ $hex }}"></span>

                                            <span class="me-1">
                                                {{ $colorName }}
                                            </span>

                                            <span class="color-name text-muted" data-color="{{ $hex }}">
                                                ({{ $hex }})
                                            </span>
                                        </div>
                                    </td>











                                    <td class="text-center">
                                        <div class="action-buttons">
                                            <a href="{{ route('colors.edit', $colors->id) }}" class="btn btn-primary btn-sm"
                                                style="margin-right: 5px;">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <form action="{{ route('colors.destroy', $colors->id) }}" method="POST"
                                                style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure you want to delete this Color?')">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>

            {{-- </div>
        </div>
      </div> --}}
        </section>
    </div>

@endsection

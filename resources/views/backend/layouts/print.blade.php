<html>
<head>
    <link href="{{ asset('/assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/css/custom_style.css') }}" rel="stylesheet">
    <title>Print</title>
</head>
<body onload="window.print()">
<div class="row">
    <div class="col-lg-12 text-center">
        <h4>{{ auth()->user()->name }}</h4>
        <p style="line-height: 0px;">{{ auth()->user()->address }}</p>
        <p style="line-height: 5px;">{{ auth()->user()->rl_number }}</p>
        <br>
    </div>
</div>
<br>
@yield('pdf_section')
<footer style="bottom: 20px; position: absolute; width: 100%">
    <div class="row">
        <div class="col-md-12">
            <p style="text-align : center;">Powered by Just Soft Solution</p>
        </div>
    </div>
</footer>
</body>
</html>

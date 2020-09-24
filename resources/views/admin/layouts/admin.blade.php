<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>MuzPlace - AdminPanel</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="/css/all.css?2" rel="stylesheet">
    <link href="/css/main.min.css?2" rel="stylesheet" />
    <script defer src="/js/all.js?2"></script>
</head>

<body class="fixed-navbar fixed-layout">
    <div class="page-wrapper">

        <header class="header">
            @include('admin.blocks.header')
        </header>

        <nav class="page-sidebar" id="sidebar">
            @include('admin.blocks.sidebar')
        </nav>

        <div class="content-wrapper">

            @yield('content')

            <footer class="page-footer">
                @include('admin.blocks.footer')
            </footer>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="/js/datepicker.js?2"></script>
<script src="/js/chung-timepicker.js?2"></script>
<script src="/js/jquery.raty.js?2"></script>
<script src="/js/raty.js?2"></script>
<script src="/js/admin.js?2"></script>
@yield('custom_scripts')
</body>

</html>

<!DOCTYPE html>
<html lang="en">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon" />
    <title>{{$title}}</title>

    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{ url('assets/css/LineIcons.css')}}" />
    <link rel="stylesheet" href="{{ url('assets/css/quill/bubble.css')}}" />
    <link rel="stylesheet" href="{{ url('assets/css/quill/snow.css')}}" />
    <link rel="stylesheet" href="{{ url('assets/css/fullcalendar.css')}}" />
    <link rel="stylesheet" href="{{ url('assets/css/morris.css')}}" />
    <link rel="stylesheet" href="{{ url('assets/css/datatable.css')}}" />
    <link rel="stylesheet" href="{{ url('assets/css/main.css')}}" />
</head>
@include('user.layouts.sidebar') 
@include('user.layouts.header')
@yield('content')
@include('user.layouts.footer')
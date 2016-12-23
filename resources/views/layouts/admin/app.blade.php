<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>PiCKD Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="/css/main.css" rel="stylesheet">
    <link rel='stylesheet prefetch'
          href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->

    <!--[if lt IE 9]>
    <script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<div class="se-pre-con"></div>
@extends('layouts.admin.nav')
@if(Session::has('flash_notification.message'))
@include('partials._flash')
@endif
@yield('content')
        <!-- Bootstrap core JavaScript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/search.js"></script>
<script type="text/javascript">
    $('div.alert').delay(6000).slideUp();
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    function hideAttachment(input) {
        var $el = null;
        if (input.id == "video" || input.id == "facts") {
            $(".fileinput-button").hide();
            $("#files").hide();
            $("#blah").hide();
            $("#videofile").show();
        } else if (input.id == "image") {
            $(".fileinput-button").show();
            $("#files").show();
            $("#blah").show();
            $("#videofile").hide();
        }

    }
    $("#video").click(function () {
        $(".fileinput-button").val("");
        $("#files").val("");
        $("#blah").val("");

    });
    $(function () {
        $('#postModal').on('show.bs.modal', function (e) {
            $("#post-title").val($(e.relatedTarget).data('title'));
            $("#post-content").val($(e.relatedTarget).data('body'));
            $("#source-title").val($(e.relatedTarget).data('sourcetitle'));
            $("#source-url").val($(e.relatedTarget).data('sourceurl'));
            $("#post-state").val($(e.relatedTarget).data('stateid').toString());
            $("#post-category").val($(e.relatedTarget).data('category').toString());
            $("#image-url").attr('src', ($(e.relatedTarget).data('imageurl')));
            $("#image-url-hidden").val($(e.relatedTarget).data('imageurl'));
            $("#postid").val($(e.relatedTarget).data('id'));
            $("#creatorid").val($(e.relatedTarget).data('creatorid'));
            $("#post-reviewer").val($(e.relatedTarget).data('reviewerid').toString());
            $("#posttype").val($(e.relatedTarget).data('posttype'));
            if ($(e.relatedTarget).data('formstate') == "disabled") {
                $("#formstate").attr('disabled', ($(e.relatedTarget).data('formstate')));
                $("#formstate").removeAttr("enabled");
            } else {
                $("#formstate").removeAttr("disabled");
                $("#formstate").attr(($(e.relatedTarget).data('formstate')));
            }
            $("#postModalLabel").text($(e.relatedTarget).data('header'));
            $("#submittedDate").val($(e.relatedTarget).data('submitteddate'));




        })
    });
    $.getJSON("/post/categories/all", function (data) {
        var options = $("#post-category");
        $.each(data, function (key, val) {
            options.append(new Option(val.categoryName, val.id));
        });
    });

    $.getJSON("/post/states/all", function (data) {
        var options = $("#post-state");
        $.each(data, function (key, val) {
            options.append(new Option(val.stateLabel, val.id));
        });
    });

    $.getJSON("/post/reviewer/all", function (data) {
        var options = $("#post-reviewer");
        $.each(data, function (key, val) {
            options.append(new Option(val.userName, val.id));
        });
    });

</script>
</body>
</html>

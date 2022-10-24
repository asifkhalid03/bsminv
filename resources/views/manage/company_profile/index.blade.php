@extends('manage.layouts.app')

@section('title','Company Profile')

@push('head')

    <link rel="stylesheet" href="{{asset('editor/dist/css/jquery.wysiwygEditor.css')}}">

    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            font-weight: 300;
            line-height: 1.6em;
        }
        iframe {
            border: none;
            outline: none;
            position: relative;
        //width: 100%;
            /*background: #fff;*/
        //padding: 15px;

        }
        .mh-sel .chosen-choices{
            padding: 4px 0px;
        }
    </style>

@endpush

@section('body')

    <?php

        $data = json_decode($company_profile->data);

    ?>

    <h2>Company Profile Manage</h2>

    <form action="{{route('manage.updated',$company_profile->id)}}" method="post" >

        @csrf

        <input type="hidden" name="page" value="{{$company_profile->page}}">

        <div class="col-lg-12">

            <div style="float: right">
                <a  href="/home" class="btn btn-primary"> <i class="fa fa-home"> </i> Home</a>
            </div>

        </div>

        <div class="form-group">
            <label for="lang">Language:</label>
            <select class="form-control" name="lang" id="lang" onchange="ChangeLanguage(this.id)">
                <option value="eng"> English</option>
                <option value="chi"> Chinese </option>

            </select>
        </div>


        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title"  name="title" value="{{$data->title}}">
        </div>


        <div class="form-group">
            <label for="content">Content:</label>
            <textarea id="content" name='content' required class="form-control wysiwyg-editor" >{{$data->content}}</textarea>
        </div>


        <div class="form-group">

            <button type="submit" class="btn btn-success"> Update</button>


        </div>




    </form>

@endsection


@push('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/less.js/2.5.1/less.js"></script>
    <script src="https://code.jquery.com/jquery-2.1.4.js"></script>
    <script src="{{asset('editor/dist/js/jquery.wysiwygEditor.js')}}"></script>
    <script type="text/javascript">

        $('.wysiwyg-editor').wysiwygEditor();

        var start = false;



            function ChangeLanguage(id)
            {
                if( start === true) {
                    location.replace("/manage/company-profile/" + $("#lang").val());
                }
            }



        $("#lang").val("{{$company_profile->lang}}").change();

        start = true;

    </script>




@endpush

@extends('manage.layouts.app')

@section('title','Business Overview')

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

        $data = json_decode($contact_us->data);

    ?>

    <h2>Contact Us Manage with Website Logo</h2>

    <form action="{{route('manage.updated',$contact_us->id)}}" method="post" enctype="multipart/form-data">

        @csrf

        <input type="hidden" name="page" value="{{$contact_us->page}}">

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
            <label for="title">Footer Right Below:</label>
            <input type="text" class="form-control" id="title"  name="title[]" value="{{$data->title[0] ?? ""}}">
        </div>


        <div class="form-group">
            <label for="content">Left Side Footer Content:</label>
            <textarea id="content" name='content[]' required class="form-control wysiwyg-editor_1" >{{$data->content[0] ?? ""}}</textarea>
        </div>




        <div class="form-group">
            <label for="content">Right Side Footer Content:</label>
            <textarea id="content" name='content[]' required class="form-control wysiwyg-editor_2" >{{$data->content[1] ?? ""}}</textarea>
        </div>


        <div class="form-group col-lg-6">
            <label for="image">Website Logo:</label>
            <input type="file" class="form-control" name="image" id="image">

        </div>

        <input type="hidden" name="default_image" value="{{$data->image??''}}">

        <div class="form-group col-lg-6">
           <img src="{{asset('storage/images')}}/{{$data->image??''}}" width="400" height="400">

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

        $('.wysiwyg-editor_1').wysiwygEditor();
        $('.wysiwyg-editor_2').wysiwygEditor();


        var start = false;



            function ChangeLanguage(id)
            {
                if( start === true) {
                    location.replace("/manage/contact-us/" + $("#lang").val());
                }
            }



        $("#lang").val("{{$contact_us->lang}}").change();

        start = true;

    </script>




@endpush

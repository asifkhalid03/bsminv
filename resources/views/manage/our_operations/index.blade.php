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

        $data = json_decode($our_operations->data);



    ?>

    <h2>Company Profile Manage</h2>

    <form action="{{route('manage.updated',$our_operations->id)}}" method="post"  enctype="multipart/form-data">

        @csrf

        <input type="hidden" name="page" value="{{$our_operations->page}}">

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
            <label for="title">Title 1:</label>
            <input type="text" class="form-control" id="title"  name="title[]" value="{{$data->title[0] ?? ""}}">
        </div>


        <div class="form-group">
            <label for="content">Content 1:</label>
            <textarea id="content" name='content[]' required class="form-control wysiwyg-editor_1" >{{$data->content[0] ?? ""}}</textarea>
        </div>

        <div class="form-group">
            <label for="title">Title 2:</label>
            <input type="text" class="form-control" id="title"  name="title[]" value="{{$data->title[1] ?? ""}}">
        </div>


        <div class="form-group">
            <label for="content">Content 2:</label>
            <textarea id="content" name='content[]' required class="form-control wysiwyg-editor_2" >{{$data->content[1] ?? ""}}</textarea>
        </div>

        <div class="form-group">
            <label for="title">Title 3:</label>
            <input type="text" class="form-control" id="title"  name="title[]" value="{{$data->title[2] ?? ""}}">
        </div>


        <div class="form-group">
            <label for="content">Content 3:</label>
            <textarea id="content" name='content[]' required class="form-control wysiwyg-editor_3" >{{$data->content[2] ?? ""}}</textarea>
        </div>



        <div class="form-group col-lg-6">
            <label for="image">Section 1 Image:</label>
            <input type="file" class="form-control" name="image_1" id="image">

        </div>

        <input type="hidden" name="default_image_1" value="{{$data->image_1 ?? ""}}">

        <div class="form-group col-lg-6">
            <img src="{{asset('storage/images/')}}/{{$data->image_1 ?? ""}}" width="400" height="400">

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
        $('.wysiwyg-editor_3').wysiwygEditor();


        var start = false;



            function ChangeLanguage(id)
            {
                if( start === true) {
                    location.replace("/manage/our-operations/" + $("#lang").val());
                }
            }



        $("#lang").val("{{$our_operations->lang}}").change();

        start = true;

    </script>




@endpush

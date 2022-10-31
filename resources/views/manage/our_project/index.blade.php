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



    <h2>Our Projects</h2>

    <form id="form-id" action="{{route('manage.updated',$edit_project ? $edit_project->id??0 : 0)}}" method="post" enctype="multipart/form-data">

        @csrf

        <div class="form-group">
            <button type="submit" class="btn btn-success"> {{ $edit_project ? "Update" : "Create Now"  }}</button>
        </div>


        <input type="hidden" name="page" value="{{$page}}">

        <div class="col-lg-12">

            <div style="float: right">
                @if(!empty($edit_project))
                <a  href="/manage/our-project/eng/0" class="btn btn-warning"> <i class="fa fa-home"> </i> Create</a>
                @endif
                <a  href="/home" class="btn btn-primary"> <i class="fa fa-home"> </i> Home</a>

            </div>

        </div>




        <div id="clonedInput1" class="clonedInput col-lg-12" style="border: 1px solid ; margin-top: 5px">

            <div class="form-group" >
                <label for="lang">Language:</label>
                <select class="form-control" name="lang">
                    <option {{ !empty($edit_project->lang) && $edit_project->lang === "eng" ? "selected" : ""}} value="eng"> English</option>
                    <option {{ !empty($edit_project->lang) && $edit_project->lang === "chi" ? "selected" : ""}} value="chi"> Chinese </option>

                </select>
            </div>

                <div class="actions" style="float: right; margin-bottom: 5px">
                    <button type="button" onclick="AppendProjects()" class="add-more btn btn-primary">Add More</button>
                    <button  type="button" onclick="RemoveProject('clonedInput1')" class="remove btn btn-danger">Remove</button>
                </div>

                <div class="form-group">
                    <label for="title">First Title</label>
                    <input type="text" class="form-control" id="title_1"  required name="title" value="{{$edit_project->title??""}}" >
                </div>

            <div class="form-group">
                    <label for="title">2nd Title</label>
                    <input type="text" class="form-control" id="title_1"  required name="title_2" value="{{$edit_project->title_2??""}}" >
                </div>



                <div class="form-group">
                    <label  for="content">Content</label>
                    <textarea name='content' id="content-1" required class="form-control"  >{{$edit_project->data??""}}</textarea>
                </div>



                <div class="form-group col-lg-6">
                    <label for="image">Image :</label>
                    <input type="file" class="form-control" name="image" id="image" >
                </div>

            @if(!empty($edit_project->image))
            <div class="form-group col-lg-6">
                <img src="{{asset('storage/images/projects')}}/{{$edit_project->image??""}}" width="400" height="400">

            </div>
           @endif

        </div>

        <div class="form-group col-lg-12" style="margin-top: 10px">

            <h1>List of exits Projects</h1>
            <table class="table table-striped" style="border-top: 1px solid">



                <tr>

                    <th>#</th>
                    <th>Title</th>
                    <th>Lang</th>
                    <th>Action</th>
                </tr>


                <tbody>

                @php($counter = 1)

                @foreach($our_projects as $list)

                <tr>
                    <td>{{$counter++}}</td>
                    <td>{{$list->title}} / {{$list->title_2}} </td>
                    <td>{{ucwords($list->lang)}} </td>
                    <td>

                        <a href="{{route('manage.our.project',['lang'=>'eng','id'=>$list->id])}}"> <i class="fa fa-edit"></i> </a>

                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;

                        <a href="{{route('manage.our.project.deleted',['id'=>$list->id])}}"> <i class="fa fa-trash"></i> </a>

                    </td>
                </tr>

                @endforeach

                </tbody>

            </table>

        </div>










    </form>

@endsection


@push('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/less.js/2.5.1/less.js"></script>
    <script src="https://code.jquery.com/jquery-2.1.4.js"></script>
    <script src="{{asset('editor/dist/js/jquery.wysiwygEditor.js')}}"></script>
    <script type="text/javascript">


        $('#content-1').wysiwygEditor();

        var start = false;

            function ChangeLanguage(id)
            {
                if( start === true) {
                    location.replace("/manage/our-project/" + $("#lang").val());
                }
            }

        $("#lang").val("{{$lang}}").change();

        start = true;


    </script>




@endpush

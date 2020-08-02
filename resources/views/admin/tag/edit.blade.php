@extends('admin.layouts.app')

@section('main-content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Text Editors
        <small>Advanced form element</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Editors</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tags</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            @if(count($errors)>0)
              @foreach($errors->all() as $error)
                <p class="alert alert-danger">{{ $error }}</p>
              @endforeach
            @endif
            <form role="form" action="{{ route('tag.update',$post->id) }}" method="post">
              @csrf
              @method('PATCH')
              <div class="box-body">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="name">Tag Title</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Tag Title" value="{{ $post->name }}">
                  </div>

              

                  <div class="form-group">
                    <label for="slug">Tag Slug</label>
                    <input type="text" class="form-control" name="slug" id="slug" placeholder="Slug" value="{{ $post->slug }}">
                  </div>

                  <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('tag.index') }}" class=" btn btn-warning">Back</a>

              </div>

                </div>
                
                

                </div>
                
            
              

              
            </form>
          </div>

          
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>

@endsection
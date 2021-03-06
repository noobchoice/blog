@extends('admin/layouts/app')

@section('main-content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Blank page
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Category</h3>

          <a href="{{ route('category.create') }}" class="col-lg-offset-5 btn btn-success">Add New</a>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
           <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S.No</th>
                  <th>Category Name</th>
                  <th>Slug</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($categoryDBData as $data)


                <tr>
                  <td>{{ $loop->index +1 }}</td>
                  <td>{{ $data->name }}
                  </td>
                  <td>{{ $data->slug }}</td>
                  <td>
                    <a href="{{ route('category.edit', $data->id) }}">
                      <span class="glyphicon glyphicon-edit"></span>
                    </a>
                  </td>

                  <td>
                      <form id="form-delete-{{ $data->id }}" action="{{ route('category.destroy', $data->id) }}" method="post" style="display: none;" >
                        @csrf
                        @method('DELETE')
                      </form>


                    <a href="" onclick="if(confirm('Are You Sure'))
                    {
                      event.preventDefault();
                      document.getElementById('form-delete-{{ $data->id }}').submit();
                    }
                    else{
                      event.preventDefault();
                    }

                    ">
                      <span class="glyphicon glyphicon-trash"></span>
                    </a>
                  </td>
                </tr>

                  @endforeach
             
                
                </tbody>
                <tfoot>
                <tr>
                  <th>S.No</th>
                  <th>Tag Name</th>
                  <th>Slug</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>


  @endsection

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script>
      $(document).ready( function () {
        $('#example1').DataTable({
          //'serverSide':true
        });
    } );
</script>
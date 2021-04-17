@extends('layouts.master')

@section('content')

    <div class="row mt-5">
        <div class="col-md-6">
            <!--Adding session-->
            @if($message = Session::get('msg'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif


            <div class="card">
                <div class="card-header">
                     Add Task
                </div>
                <div class="card-body">
                    <form action="{{ route('task.create') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="task">Task</label>
                            <input type="text" name="title" id="task" class="form-control @error('title') is-invalid @enderror" placeholder="Add your task">
                            <div class='invalid-feedback'>
                                @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <input class="btn btn-primary"  type="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    View Tasks
                </div>
                <div class="card-body">
                    <table class='table table-bordered'>
                        <tr>
                            <th>Task</th>
                            <th style="width: 2em">Action</th>
                        </tr>
                        @foreach($tasks as $task)
                            <tr>
                                <td>{{ $task->title }}</td>
                                <td>
                                    <form action="{{ route('task.destroy', $task->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

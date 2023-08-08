@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Статьи</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Главная</a></li>
                        <li class="breadcrumb-item active">Список статей</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Список статей</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Добавить статью</a>
                            @if (count($posts))
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th style="width: 30px">#</th>
                                            <th>Заглавие</th>
                                            <th>Дата обновления</th>
                                            <th>Комментарии</th>
                                            <th>Редактировать/Удалить</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($posts as $post)
                                            <tr>
                                                <td>{{ $post->id }}</td>
                                                <td>{{ $post->title }}</td>
                                                <td>{{ $post->updated_at }}</td>
                                                <td>
                                                    <button data-toggle="collapse" data-target="#com-{{ $post->id }}">Смотреть / удалить</button>
                                                    <p>
                                                        <table id="com-{{ $post->id }}"
                                                               class="table table-bordered table-dark collapse">
                                                            <thead>
                                                            <tr>
                                                                <th>Имя</th>
                                                                <th>Комментарий</th>
                                                                <th>Удалить</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($post->comments as $comment)
                                                                <tr>
                                                                    <td>{{ $comment->user_name }}</td>
                                                                    <td>{{ $comment->content }}</td>
                                                                    <td>
                                                                        <form
                                                                            action="{{ route('admin.comment-delete', ['id' => $comment->id]) }}"
                                                                            method="post">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit"
                                                                                    class="btn btn-danger btn-sm"
                                                                                    onclick="return confirm('Подтвердите удаление')">
                                                                                <i
                                                                                    class="fas fa-trash-alt"></i>
                                                                            </button>
                                                                        </form>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </p>
                                                </td>
                                                <td>
                                                    <a href="{{ route('posts.edit', ['post' => $post->id]) }}"
                                                       class="btn btn-info btn-sm float-left mr-1">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>

                                                    <form
                                                        action="{{ route('posts.destroy', ['post' => $post->id]) }}"
                                                        method="post" class="float-left">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Подтвердите удаление')">
                                                            <i
                                                                class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <p>Статей пока нет...</p>
                            @endif
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            {{ $posts->links('my-pagination') }}
                        </div>
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection


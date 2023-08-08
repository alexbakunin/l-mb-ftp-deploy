@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Добавить статью</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Главная</a></li>
                        <li class="breadcrumb-item active">Новая статья</li>
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
                            <h3 class="card-title">Новая статья</h3>
                        </div>
                        <!-- /.card-header -->

                        <form role="form" method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Заголовок</label>
                                    <input type="text" name="title"
                                           class="form-control @error('title') is-invalid @enderror" id="title"
                                           placeholder="Заголовок"
                                           value="{{ old('title') }}">
                                </div>

                                <div class="form-group">
                                    <label for="description">Цитата</label>
                                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="3" placeholder="Цитата ...">
                                        {{ old('description') }}
                                    </textarea>
                                </div>

                                <div class="form-group">
                                    <label for="content">Контент</label>
                                    <textarea name="content" class="form-control @error('content') is-invalid @enderror" id="content" rows="7"
                                              placeholder="Контент ...">{{ old('content') }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="thumbnail">Изображение</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="thumbnail" id="thumbnail"
                                                   class="custom-file-input">
                                            <label class="custom-file-label" for="thumbnail">Выбрать файл</label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Сохранить</button>
                            </div>
                        </form>

                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <script src="{{ asset('assets/admin/ckeditor5/build/ckeditor.js') }}"></script>
    <script src="{{ asset('assets/admin/ckfinder/ckfinder.js') }}"></script>

    <script>
        ClassicEditor
            .create( document.querySelector( '#content' ), {
                ckfinder: {
                    uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
                },
                image: {
                    toolbar: [
                        'imageTextAlternative',
                        'toggleImageCaption',
                        'imageStyle:inline',
                        'imageStyle:block',
                        'imageStyle:side'
                    ],
                    styles: [
                        // Выравнивание изображений - CKEditor просто добавляет классы для img. Конфигурировать эти классы можно/нужно прямо в CSS-стилях
                        // This option is equal to a situation where no style is applied.
                        'full',

                        // This represents an image aligned to the left.
                        'alignLeft',

                        // This represents an image aligned to the right.
                        'alignRight'
                    ]
                },
                toolbar: {
                    items: [
                        'heading',
                        '|',
                        'bold',
                        'italic',
                        'underline',
                        'link',
                        'bulletedList',
                        'numberedList',
                        '|',
                        'outdent',
                        'indent',
                        'alignment',
                        '|',
                        'blockQuote',
                        'insertTable',
                        'mediaEmbed',
                        'undo',
                        'redo',
                        '|',
                        'CKFinder',
                        'sourceEditing',
                        'htmlEmbed'
                    ]
                },
                language: 'ru',
                table: {
                    contentToolbar: [
                        'tableColumn',
                        'tableRow',
                        'mergeTableCells'
                    ]
                }
            } )
            .catch( function( error ) {
                console.error( error );
            } );

        ClassicEditor
            .create( document.querySelector( '#description' ), {
                toolbar: [ 'heading', '|', 'bold', 'italic', '|', 'undo', 'redo' ]
            } )
            .catch( function( error ) {
                console.error( error );
            } );
    </script>
@endsection

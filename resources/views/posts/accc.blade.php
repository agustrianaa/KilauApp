@extends('layout.main')

@section('content')
<div class="container mt-5 content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div>
                <h3 class="text-center my-4">Data Posts</h3>
                <hr>
            </div>
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">GAMBAR</th>
                            <th scope="col">JUDUL</th>
                            <th scope="col">CONTENT</th>
                            <th scope="col">AKSI</th>
                          </tr>
                        </thead>
                        <tbody>
                          @forelse ($posts as $post)
                            <tr>
                                <td class="text-center">
                                    <img src="{{ asset('/storage/posts/'.$post->image) }}" class="rounded" style="width: 150px">
                                </td>
                                <td>{{ $post->title }}</td>
                                <td>{!! $post->content !!}</td>
                                <td class="text-center">
                                    <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" class="form-control" name="title" value="{{ old('title', $post->title) }}">
                                        <input type="hidden" class="form-control" name="content" value="{{ old('content', $post->content) }}">
                                        <input type="hidden" name="confirmed" id="confirmed" value="1">

                                        <button type="submit" class="btn btn-sm btn-primary">acc</button>
                                    </form>
                                </td>
                            </tr>
                          @empty
                              <div class="alert alert-danger">
                                  tidak ada Data Post yang perlu di Acc.
                              </div>
                          @endforelse
                        </tbody>
                      </table>
                      {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    //message with toastr
    @if(session()->has('success'))

        toastr.success('{{ session('success') }}', 'BERHASIL!');

    @elseif(session()->has('error'))

        toastr.error('{{ session('error') }}', 'GAGAL!');

    @endif
</script>
@endsection

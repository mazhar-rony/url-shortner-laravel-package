<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <title>URL Shortner</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            {{-- <div class="col-lg-10 offset-lg-1"> --}}
            <div class="col-lg-12">

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        URL List
                        <a class="btn btn-sm btn-primary float-right" href="{{ route('url-shortners.create') }}"><i
                                class="fa-solid fa-plus"></i> Add New</a>
                    </div>
                    <div class="card-body table-responsive">
                        @if (session('message'))
                            {{-- <div role="alert" class="alert alert-success">
                                {{ session('message') }}
                            </div> --}}
                            <div class="alert alert-success" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                <strong>Success! </strong> {{ session('message') }}
                            </div>
                        @endif
                        <table class="table table-bordered table-striped table-hover">
                            <thead class="text-center">
                                <tr>
                                    <th>SL#</th>
                                    <th>Original URL</th>
                                    <th>Short URL</th>
                                    <th>IP</th>
                                    <th>Hits</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($urlShortners as $urlShortner)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $urlShortner->original_url }}</td>
                                        <td>{{ $urlShortner->short_url }}</td>
                                        <td>{{ $urlShortner->ip }}</td>
                                        <td>{{ $urlShortner->hits }}</td>
                                        <td style="white-space:nowrap; text-align:center;">
                                            <a class="btn btn-sm btn-success"
                                                href="{{ route('url-shortners.show', $urlShortner->id) }}"><i
                                                    class="fa-solid fa-eye"></i> Show</a>

                                            <a class="btn btn-sm btn-warning"
                                                href="{{ route('url-shortners.edit', $urlShortner->id) }}"><i
                                                    class="fa-solid fa-pen-to-square"></i> Edit</a>

                                            <form method="post"
                                                action="{{ route('url-shortners.destroy', $urlShortner->id) }}"
                                                style="display:inline">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure want to delete?')"><i
                                                        class="fa-solid fa-trash"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $urlShortners->links() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#success-alert").hide();
            $("#success-alert").fadeTo(2000, 1000).slideUp(1000, function() {
                $("#success-alert").slideUp(1000);
            });
        });
    </script>
</body>

</html>

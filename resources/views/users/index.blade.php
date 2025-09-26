<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Launch demo modal
                    </button>
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>NAME</th>
                                    <th>LASTNAME</th>
                                    <th>EMAIL</th>
                                    <th>DOCUMENTS</th>
                                    <th>DOCUMENT TYPE</th>
                                    <th>ACTIONS</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->names }}</td>
                                        <td>{{ $user->lastnames }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->document }}</td>
                                        <td>{{ $user->documentType->name }}</td>
                                        <td>{{ $user->documentType->name }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>

</body>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('users.store') }}" method="post">
                    @csrf
                    <div class="mt-4">
                        <label for="" class="form-label">Nombres</label>
                        <input type="text" class="form-control" name="names">
                    </div>
                    <div class="mt-4">
                        <label for="" class="form-label">Apellidos</label>
                        <input type="text" class="form-control" name="lastnames">
                    </div>
                    <div class="mt-4">
                        <label for="" class="form-label">Correo</label>
                        <input type="text" class="form-control" name="email">
                    </div>
                    <div class="mt-4">
                        <label for="" class="form-label">Documento</label>
                        <input type="text" class="form-control" name="document">
                    </div>
                    <div class="mt-4">
                        <label for="" class="form-label">Tipo de Documento</label>
                        <select name="document_type_id" id="" class="form-select" required>
                            <option value="">seleccionar...</option>
                            @foreach($document_types as $document_type)
                                <option value="{{ $document_type->id }}">{{ $document_type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <br><br>
                    <button type="submit" class="btn btn-primary w-100">Guardar nuevo user</button>
                </form>
            </div>
        </div>
    </div>
</div>
</html>
